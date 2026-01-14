<?php

namespace App\Filament\Pages;

use App\Models\Task;
use Filament\Pages\Page;

class DelayedTasks extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-exclamation-triangle';
    
    protected string $view = 'filament.pages.tasks-list';
    
    protected static ?string $title = 'Delayed Tasks';
    
    protected static ?string $navigationLabel = 'Delayed';
    
    protected static string|\UnitEnum|null $navigationGroup = 'Project Board';
    
    protected static ?int $navigationSort = 3;
    
    public $tasks = [];
    
    public function mount(): void
    {
        $this->tasks = $this->getDelayedTasks();
    }
    
    public function getDelayedTasks()
    {
        $today = now()->startOfDay();
        
        return Task::with(['project', 'assignee', 'column'])
            ->whereNotNull('due_date')
            ->whereDate('due_date', '<', $today)
            ->orderBy('due_date', 'asc')
            ->get();
    }
    
    public function editTask($taskId): void
    {
        // Redirect to project board with task edit
        $task = Task::find($taskId);
        if ($task && $task->project) {
            $url = \App\Filament\Pages\ProjectBoard::getUrl() . '?slug=' . urlencode($task->project->slug) . '&editTask=' . $taskId;
            $this->redirect($url, navigate: true);
        }
    }
    
    protected function getViewData(): array
    {
        return [
            'tasks' => $this->tasks,
            'type' => 'delayed',
        ];
    }
}
