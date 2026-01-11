<?php

namespace App\Filament\Pages;

use App\Models\Project; // Import Project
use App\Models\Task;
use App\Models\TaskColumn;
use Filament\Actions\Action;
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
    public $currentProjectId = null;

    // 2. Initialize - don't set a default project, show grid first
    public function mount(): void
    {
        // Check if slug is provided in query parameter
        $slug = request()->query('slug');
        if ($slug) {
            $project = Project::where('slug', $slug)->first();
            if ($project) {
                $this->currentProjectId = $project->id;
            }
        }
    }

    public function selectProject($projectId): void
    {
        $this->currentProjectId = $projectId;
        
        // Get the project slug and update URL with query parameter
        $project = Project::find($projectId);
        if ($project && $project->slug) {
            $url = $this->getUrl() . '?slug=' . urlencode($project->slug);
            $this->redirect($url, navigate: true);
        }
    }
    
    public function backToGrid(): void
    {
        $this->currentProjectId = null;
        $this->redirect($this->getUrl(), navigate: true);
    }

    public function getViewData(): array
    {
        $data = [
            'projects' => Project::with('team')->get(),
            'columns' => collect(), // Empty collection by default
        ];
        
        // Only fetch columns if a project is selected
        if ($this->currentProjectId) {
            $data['columns'] = TaskColumn::with(['tasks.assignee'])
                ->where('project_id', $this->currentProjectId)
                ->orderBy('sort_order')
                ->get();
            $data['selectedProject'] = Project::find($this->currentProjectId);
        }
        
        return $data;
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

    public function checkColumnsBeforeAddTask(): void
    {
        if (!$this->currentProjectId) {
            Notification::make()
                ->title('No project selected')
                ->warning()
                ->send();
            return;
        }
        
        $columns = TaskColumn::where('project_id', $this->currentProjectId)->count();
        
        if ($columns === 0) {
            // Dispatch event to show sweet alert
            $this->dispatch('show-sweet-alert', [
                'title' => 'No Columns Found',
                'text' => 'Please add columns first before adding tasks.',
                'icon' => 'warning',
            ]);
            return;
        }
        
        // If columns exist, mount the create task action
        try {
            $this->mountAction('create_task');
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error opening task form')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }
    
    protected function createTaskAction(): Action
    {
        return Action::make('create_task')
            ->label('Add Task')
            ->icon('heroicon-m-plus')
            ->modal()
            ->modalHeading('Add New Task')
            ->form([
                TextInput::make('title')->required(),
                Textarea::make('description'),
                Select::make('assigned_to')
                    ->options(\App\Models\User::pluck('name', 'id'))
                    ->searchable(),
                Select::make('task_column_id')
                    ->label('Status')
                    ->options(function () {
                        return TaskColumn::where('project_id', $this->currentProjectId)->pluck('title', 'id');
                    })
                    ->required()
                    ->default(function () {
                        return TaskColumn::where('project_id', $this->currentProjectId)
                            ->orderBy('sort_order')
                            ->first()?->id;
                    }),
            ])
            ->action(function (array $data) {
                $data['project_id'] = $this->currentProjectId;
                Task::create($data);
                
                Notification::make()
                    ->title('Task created successfully')
                    ->success()
                    ->send();
            });
    }
    
    public $columnIdForTask = null;
    
    protected function createTaskForColumnAction(): Action
    {
        return Action::make('create_task_for_column')
            ->label('Add Task')
            ->icon('heroicon-m-plus')
            ->modal()
            ->modalHeading('Add New Task')
            ->fillForm(function () {
                return [
                    'task_column_id' => $this->columnIdForTask,
                ];
            })
            ->form([
                TextInput::make('title')->required(),
                Textarea::make('description'),
                Select::make('assigned_to')
                    ->options(\App\Models\User::pluck('name', 'id'))
                    ->searchable(),
                Hidden::make('task_column_id')
                    ->required(),
            ])
            ->action(function (array $data) {
                $data['project_id'] = $this->currentProjectId;
                $data['task_column_id'] = $this->columnIdForTask;
                Task::create($data);
                
                $this->columnIdForTask = null;
                
                Notification::make()
                    ->title('Task created successfully')
                    ->success()
                    ->send();
            });
    }
    
    public function addTaskToColumn($columnId): void
    {
        if (!$this->currentProjectId) {
            Notification::make()
                ->title('No project selected')
                ->warning()
                ->send();
            return;
        }
        
        $this->columnIdForTask = $columnId;
        
        // Mount the action - Filament will look for createTaskForColumnAction() method
        // The action must be in getActions() array to be accessible
        try {
            $this->mountAction('create_task_for_column');
        } catch (\Exception $e) {
            // If mountAction fails, show error
            Notification::make()
                ->title('Error')
                ->body('Could not open task form: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }
    
    public function openManageColumns(): void
    {
        $this->mountAction('manageColumns');
    }

    protected function manageColumnsAction(): Action
    {
        return Action::make('manageColumns')
            ->label('Manage Columns')
            ->icon('heroicon-m-cog-6-tooth')
            ->slideOver()
            ->fillForm(function () {
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
                            'project_id' => $project->id,
                            'title' => $columnData['title'],
                            'sort_order' => $index + 1,
                        ]);
                    }
                }

                Notification::make()->title('Board updated')->success()->send();
                $this->redirect(request()->header('Referer'));
            });
    }

    protected function getActions(): array
    {
        $actions = [
            $this->createTaskForColumnAction(),
            $this->manageColumnsAction(),
            $this->editTaskAction(),
        ];
        
        // Always include createTaskAction - it will only work if project is selected
        $actions[] = $this->createTaskAction();
        
        return $actions;
    }

    protected function getHeaderActions(): array
    {
        $actions = [];
        
        // Show back button if viewing a project board
        if ($this->currentProjectId) {
            $actions[] = Action::make('back_to_grid')
                ->label('Back to Projects')
                ->icon('heroicon-m-arrow-left')
                ->color('gray')
                ->action('backToGrid');
            
            $columns = TaskColumn::where('project_id', $this->currentProjectId)->count();
            
            // Always show "Add Task" button - directly use the action if columns exist, otherwise show warning
            if ($columns > 0) {
                // If columns exist, use the create task action directly
                $actions[] = $this->createTaskAction();
            } else {
                // If no columns, show button that triggers warning
                $actions[] = Action::make('add_task_header')
                    ->label('Add Task')
                    ->icon('heroicon-m-plus')
                    ->action(function () {
                        $this->dispatch('show-sweet-alert', [
                            'title' => 'No Columns Found',
                            'text' => 'Please add columns first before adding tasks.',
                            'icon' => 'warning',
                        ]);
                    });
            }
            
            // Show "Manage Columns" in header if columns exist
            if ($columns > 0) {
                $actions[] = $this->manageColumnsAction();
            }
        }
        
        return $actions;
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
