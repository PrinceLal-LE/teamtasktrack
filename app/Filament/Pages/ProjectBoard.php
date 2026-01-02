<?php

namespace App\Filament\Pages;

use App\Models\Task;
use App\Models\TaskColumn;
use Filament\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ProjectBoard extends Page
{
    // protected static $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected string $view = 'filament.pages.project-board';

    protected static ?string $title = 'Project Board';

    public function getViewData(): array
    {
        // HARDCODED: We are grabbing the first project found in the DB for now.
        // (Later we will add a dropdown to switch projects)
        $project = \App\Models\Project::first();

        if (! $project) {
            return ['columns' => []];
        }

        return [
            // Load columns and their tasks for this specific project
            'columns' => TaskColumn::with(['tasks.assignee'])
                ->where('project_id', $project->id)
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

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Action::make('manage_columns')
    //             ->label('Manage Columns')
    //             ->icon('heroicon-m-cog-6-tooth')
    //             ->slideOver() // Opens a side panel instead of a small modal
    //             ->fillForm(function () {
    //                 // Load existing columns for the current project
    //                 $project = \App\Models\Project::first(); // Hardcoded for now

    //                 return [
    //                     'columns' => $project ? $project->columns->toArray() : [],
    //                 ];
    //             })
    //             ->form([
    //                 Repeater::make('columns')
    //                     ->label('Board Columns')
    //                     ->addActionLabel('Add New Column')
    //                     ->schema([
    //                         // Hidden ID keeps track of existing columns so we don't recreate them
    //                         Hidden::make('id'),
    //                         TextInput::make('title')
    //                             ->required()
    //                             ->placeholder('e.g. In Review'),
    //                     ])
    //                     ->orderable() // Allows dragging to reorder!
    //                     ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
    //             ])
    //             ->action(function (array $data) {
    //                 $project = \App\Models\Project::first();
    //                 if (! $project) {
    //                     return;
    //                 }

    //                 $submittedColumns = collect($data['columns']);

    //                 // 1. Loop through submitted columns
    //                 foreach ($submittedColumns as $index => $columnData) {
    //                     // Check if we have an ID from the hidden field
    //                     $id = $columnData['id'] ?? null;

    //                     if ($id) {
    //                         // UPDATE: If ID exists, update the title and order
    //                         $project->columns()->where('id', $id)->update([
    //                             'title' => $columnData['title'],
    //                             'sort_order' => $index + 1,
    //                         ]);
    //                     } else {
    //                         // CREATE: If no ID, creates a new row
    //                         $project->columns()->create([
    //                             'title' => $columnData['title'],
    //                             'sort_order' => $index + 1,
    //                         ]);
    //                     }
    //                 }

    //                 // 2. Delete columns that were removed from the list
    //                 $idsToKeep = $submittedColumns->pluck('id')->filter()->toArray();
    //                 $project->columns()->whereNotIn('id', $idsToKeep)->delete();

    //                 Notification::make()->title('Board updated successfully')->success()->send();
    //             }),
    //     ];
    // }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('manage_columns')
                ->label('Manage Columns')
                ->icon('heroicon-m-cog-6-tooth')
                ->slideOver()
                ->fillForm(function () {
                    $project = \App\Models\Project::first();
                    return [
                        'columns' => $project ? $project->columns->toArray() : [],
                    ];
                })
                ->form([
                    Repeater::make('columns')
                        ->label('Board Columns')
                        ->addActionLabel('Add New Column')
                        ->schema([
                            Hidden::make('id'), // Keeps track of existing IDs
                            TextInput::make('title')
                                ->required(),
                        ])
                        ->orderable() // Drag to reorder
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                ])
                ->action(function (array $data) {
                    $project = \App\Models\Project::first();
                    if (! $project) return;

                    $submittedColumns = collect($data['columns']);

                    // 1. Loop through submitted columns
                    foreach ($submittedColumns as $index => $columnData) {
                        $id = $columnData['id'] ?? null;

                        // Only update if ID exists AND is a real number (not a repeater temp ID)
                        if ($id && is_numeric($id)) {
                            TaskColumn::where('id', $id)->update([
                                'title' => $columnData['title'],
                                'sort_order' => $index + 1,
                            ]);
                        } else {
                            // Create new column
                            TaskColumn::create([
                                'project_id' => $project->id,
                                'title' => $columnData['title'],
                                'sort_order' => $index + 1,
                            ]);
                        }
                    }

                    // 2. Delete removed columns
                    $idsToKeep = $submittedColumns->pluck('id')->filter(fn($id) => is_numeric($id))->toArray();
                    TaskColumn::where('project_id', $project->id)
                        ->whereNotIn('id', $idsToKeep)
                        ->delete();

                    Notification::make()->title('Board updated')->success()->send();
                    
                    // 3. FORCE REFRESH THE PAGE
                    $this->redirect(request()->header('Referer'));
                }),
        ];
    }
}
