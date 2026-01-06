<?php

namespace App\Filament\Pages;

use App\Models\Project; // Import Project
use App\Models\Task;
use App\Models\TaskColumn;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Placeholder;

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

    // Property to store the current task being edited
    public $editingTaskId = null;
    public $editingTask = null;

    // 1. The method called by Livewire when you click a card
    public function editTask($recordId)
    {
        try {
            $task = Task::with('comments.user')->find($recordId);
            
            if (!$task) {
                Notification::make()
                    ->title('Task not found')
                    ->danger()
                    ->send();
                return;
            }
            
            $this->editingTaskId = $recordId;
            $this->editingTask = $task;
            
            // Mount the action
            $this->mountAction('edit_task');
            
            // Dispatch browser event to ensure modal opens
            $this->dispatch('open-modal', id: 'edit-task-modal');
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error opening task')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }

    protected function getActions(): array
    {
        return [
            // EditAction::make('edit_task')
            //     ->model(\App\Models\Task::class)
            //     ->form([
            //         TextInput::make('title')->required(),
            //         Textarea::make('description')->rows(4),
            //         Select::make('assigned_to')
            //             ->options(\App\Models\User::pluck('name', 'id'))
            //             ->searchable(),
            //         Select::make('task_column_id')
            //             ->label('Status')
            //             ->options(function () {
            //                 return TaskColumn::where('project_id', $this->currentProjectId)->pluck('title', 'id');
            //             }),
            //     ])
            //     ->slideOver()
            //     ->after(function () {
            //         $this->redirect(request()->header('Referer'));
            //     }),
            Action::make('edit_task')
                ->label('Edit Task')
                ->fillForm(function () {
                    if (!$this->editingTask) {
                        return [];
                    }
                    
                    return [
                        'title' => $this->editingTask->title,
                        'description' => $this->editingTask->description,
                        'assigned_to' => $this->editingTask->assigned_to,
                        'task_column_id' => $this->editingTask->task_column_id,
                    ];
                })
                ->form([
                    // --- EXISTING FIELDS ---
                    TextInput::make('title')->required(),

                    // Organize Layout
                    Select::make('assigned_to')
                        ->options(\App\Models\User::pluck('name', 'id'))
                        ->searchable()
                        ->columnSpan(1),
                    Select::make('task_column_id')
                        ->label('Status')
                        ->options(function () {
                            return \App\Models\TaskColumn::where('project_id', $this->currentProjectId)->pluck('title', 'id');
                        })
                        ->columnSpan(1),

                    Textarea::make('description')->rows(3),

                    // --- COMMENTS SECTION ---
                    Placeholder::make('comments_heading')
                        ->label('Comments')
                        ->content('')
                        ->columnSpanFull(),

                    // 1. List existing comments using our custom view
                    ViewField::make('comments_list')
                        ->view('filament.forms.task-comments')
                        ->hiddenLabel()
                        ->columnSpanFull()
                        ->viewData(fn () => ['record' => $this->editingTask]),

                    // 2. Box to add a new comment
                    RichEditor::make('new_comment')
                        ->label('Add a comment')
                        ->toolbarButtons(['bold', 'italic', 'link', 'bulletList'])
                        ->dehydrated(false) // Don't try to save this to the 'tasks' table
                        ->columnSpanFull(),
                ])
                ->modal()
                ->modalWidth('4xl')
                ->modalHeading(fn () => 'Edit Task: ' . ($this->editingTask?->title ?? ''))
                ->action(function (array $data) {
                    if (!$this->editingTask) {
                        return;
                    }
                    
                    // Update the task
                    $this->editingTask->update([
                        'title' => $data['title'],
                        'description' => $data['description'] ?? null,
                        'assigned_to' => $data['assigned_to'] ?? null,
                        'task_column_id' => $data['task_column_id'],
                    ]);
                    
                    // Save comment if provided
                    if (! empty($data['new_comment'])) {
                        \App\Models\Comment::create([
                            'task_id' => $this->editingTask->id,
                            'user_id' => \Illuminate\Support\Facades\Auth::id(),
                            'body' => $data['new_comment'],
                        ]);
                    }
                    
                    // Reset editing state
                    $this->editingTaskId = null;
                    $this->editingTask = null;
                    
                    Notification::make()
                        ->title('Task updated successfully')
                        ->success()
                        ->send();
                    
                    // Refresh to show the new comment
                    $this->redirect(request()->header('Referer'));
                }),
        ];
    }
}
