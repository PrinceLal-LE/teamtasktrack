<?php

namespace App\Filament\Pages;

use App\Models\Project; // Import Project
use App\Models\Task;
use App\Models\TaskColumn;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ProjectBoard extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected string $view = 'filament.pages.project-board';

    protected static ?string $title = 'Project Board';

    // 1. Add this property to track the active project
    public $currentProjectId;

    // 2. Initialize it with the first available project
    public function mount()
    {
        $this->currentProjectId = Project::first()?->id;
    }

    public function getViewData(): array
    {
        // 3. Fetch the data based on the SELECTED project, not just "first()"
        return [
            'projects' => Project::all(), // List for the dropdown
            'columns' => TaskColumn::with(['tasks.assignee'])
                ->where('project_id', $this->currentProjectId)
                ->orderBy('sort_order')
                ->get(),
        ];
    }

    public function updateTaskStatus($taskId, $newColumnId, $newIndex)
    {
        $task = Task::find($taskId);

        if ($task) {
            $task->update([
                'task_column_id' => $newColumnId,
                'sort_order' => $newIndex,
            ]);

            Notification::make()
                ->title('Saved')
                ->success()
                ->send();
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            // 1. ADD TASK ACTION
            CreateAction::make('create_task')
                ->label('Add Task')
                ->icon('heroicon-m-plus')
                ->model(Task::class)
                ->form([
                    TextInput::make('title')->required(),
                    Textarea::make('description'),
                    Select::make('assigned_to')
                        ->options(\App\Models\User::pluck('name', 'id'))
                        ->searchable(),
                    Select::make('task_column_id')
                        ->label('Status')
                        // Only show columns for the CURRENT project
                        ->options(function () {
                            return TaskColumn::where('project_id', $this->currentProjectId)->pluck('title', 'id');
                        })
                        ->required()
                        ->default(function () {
                            // Default to the first column (e.g., "To Do")
                            return TaskColumn::where('project_id', $this->currentProjectId)
                                ->orderBy('sort_order')
                                ->first()?->id;
                        }),
                ])
                ->mutateFormDataUsing(function (array $data) {
                    // Force the task to belong to the currently selected project
                    $data['project_id'] = $this->currentProjectId;

                    return $data;
                })
                ->after(function () {
                    // Refresh the board after creating a task
                    $this->redirect(request()->header('Referer'));
                }),
            Action::make('manage_columns')
                ->label('Manage Columns')
                ->icon('heroicon-m-cog-6-tooth')
                ->slideOver()
                ->fillForm(function () {
                    // 4. Load columns for the CURRENTLY selected project
                    $project = Project::find($this->currentProjectId);

                    return [
                        'columns' => $project ? $project->columns->toArray() : [],
                    ];
                })
                ->form([
                    Repeater::make('columns')
                        ->label('Board Columns')
                        ->addActionLabel('Add New Column')
                        ->schema([
                            Hidden::make('id'),
                            TextInput::make('title')->required(),
                        ])
                        ->orderable()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                ])
                ->action(function (array $data) {
                    // 5. Use the selected project ID
                    $project = Project::find($this->currentProjectId);
                    if (! $project) {
                        return;
                    }

                    $submittedColumns = collect($data['columns']);
                    $submittedIds = $submittedColumns->pluck('id')->filter(fn ($id) => is_numeric($id))->toArray();

                    // Delete removed columns
                    TaskColumn::where('project_id', $project->id)
                        ->whereNotIn('id', $submittedIds)
                        ->delete();

                    // Update or Create
                    foreach ($submittedColumns as $index => $columnData) {
                        $id = $columnData['id'] ?? null;

                        if ($id && is_numeric($id)) {
                            TaskColumn::where('id', $id)->update([
                                'title' => $columnData['title'],
                                'sort_order' => $index + 1,
                            ]);
                        } else {
                            TaskColumn::create([
                                'project_id' => $project->id, // Uses the active project ID
                                'title' => $columnData['title'],
                                'sort_order' => $index + 1,
                            ]);
                        }
                    }

                    Notification::make()->title('Board updated')->success()->send();
                    $this->redirect(request()->header('Referer'));
                }),
        ];
    }

    // Property to store the task being edited
    public $editingTaskId = null;

    // 1. The method called by Livewire when you click a card
    public function editTask($recordId): void
    {
        $task = Task::find($recordId);

        if (! $task) {
            Notification::make()
                ->title('Task not found')
                ->danger()
                ->send();

            return;
        }

        $this->editingTaskId = $recordId;

        // Mount the Filament action (this should trigger the modal rendering + open event)
        $this->mountAction('editTask');
    }

   

    protected function editTaskAction(): Action
    {
        // IMPORTANT: The action name MUST match the method prefix for resolution:
        // mountAction('editTask') -> editTaskAction()
        return Action::make('editTask')
            ->label('Edit Task')
            ->modal()
            ->modalWidth('4xl')
            ->modalHeading(fn () => $this->editingTaskId
                    ? 'Edit Task: '.Task::find($this->editingTaskId)?->title
                    : 'Edit Task'
            )
            ->fillForm(function () {
                if (! $this->editingTaskId) {
                    return [];
                }

                $task = Task::with('comments.user')->find($this->editingTaskId);

                return [
                    'title' => $task->title,
                    'description' => $task->description,
                    'assigned_to' => $task->assigned_to,
                    'task_column_id' => $task->task_column_id,
                ];
            })
            ->form([
                TextInput::make('title')->required(),

                Select::make('assigned_to')
                    ->options(\App\Models\User::pluck('name', 'id'))
                    ->searchable(),

                Select::make('task_column_id')
                    ->label('Status')
                    ->options(fn () => TaskColumn::where('project_id', $this->currentProjectId)
                        ->pluck('title', 'id')
                    ),

                Textarea::make('description')->rows(3),

                ViewField::make('comments_list')
                    ->view('filament.forms.task-comments')
                    ->columnSpanFull()
                    ->viewData(fn () => [
                        'record' => Task::with('comments.user')->find($this->editingTaskId),
                    ]),

                RichEditor::make('new_comment')
                    ->label('Add a comment')
                    ->columnSpanFull(),
            ])
            ->action(function (array $data) {
                $task = Task::find($this->editingTaskId);

                $task->update([
                    'title' => $data['title'],
                    'description' => $data['description'] ?? null,
                    'assigned_to' => $data['assigned_to'] ?? null,
                    'task_column_id' => $data['task_column_id'],
                ]);

                if (! empty($data['new_comment'])) {
                    \App\Models\Comment::create([
                        'task_id' => $task->id,
                        'user_id' => \Illuminate\Support\Facades\Auth::id(),
                        'body' => $data['new_comment'],
                    ]);
                }

                $this->editingTaskId = null;

                Notification::make()
                    ->title('Task updated')
                    ->success()
                    ->send();
            });
    }

    public function deleteComment($commentId): void
    {
        $comment = \App\Models\Comment::find($commentId);

        if (! $comment) {
            Notification::make()
                ->title('Comment not found')
                ->danger()
                ->send();
            return;
        }

        // Only allow the comment author to delete their own comment
        if ($comment->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            Notification::make()
                ->title('Unauthorized')
                ->body('You can only delete your own comments.')
                ->danger()
                ->send();
            return;
        }

        $comment->delete();

        Notification::make()
            ->title('Comment deleted')
            ->success()
            ->send();
    }

    public $editingCommentId = null;
    public $editingCommentBody = null;

    public function startEditComment($commentId): void
    {
        $comment = \App\Models\Comment::find($commentId);

        if (! $comment) {
            Notification::make()
                ->title('Comment not found')
                ->danger()
                ->send();
            return;
        }

        // Only allow the comment author to edit their own comment
        if ($comment->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            Notification::make()
                ->title('Unauthorized')
                ->body('You can only edit your own comments.')
                ->danger()
                ->send();
            return;
        }

        $this->editingCommentId = $commentId;
        $this->editingCommentBody = $comment->body;
    }

    public function cancelEditComment(): void
    {
        $this->editingCommentId = null;
        $this->editingCommentBody = null;
    }

    public function updateComment($commentId, $body = null): void
    {
        $comment = \App\Models\Comment::find($commentId);

        if (! $comment) {
            Notification::make()
                ->title('Comment not found')
                ->danger()
                ->send();
            return;
        }

        // Only allow the comment author to edit their own comment
        if ($comment->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            Notification::make()
                ->title('Unauthorized')
                ->body('You can only edit your own comments.')
                ->danger()
                ->send();
            return;
        }

        // Use the body parameter if provided, otherwise use the property
        $newBody = $body ?? $this->editingCommentBody;

        $comment->update([
            'body' => $newBody,
            'edited_at' => now(),
        ]);

        $this->editingCommentId = null;
        $this->editingCommentBody = null;

        Notification::make()
            ->title('Comment updated')
            ->success()
            ->send();
    }
}
