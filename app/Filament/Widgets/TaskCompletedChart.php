<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class TaskCompletedChart extends Widget
{
    protected string $view = 'filament.widgets.task-completed-chart';
    
    protected int | string | array $columnSpan = 'full';
    
    protected static ?int $sort = 2;

    public function getViewData(): array
    {
        // Chart data - months from Feb to Oct
        $months = ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'];
        
        // Productivity Boost data (purple line)
        $productivityBoost = [25, 35, 45, 65, 55, 50, 58, 60, 62];
        
        // Tasks Managed data (teal line)
        $tasksManaged = [20, 30, 40, 55, 50, 48, 60, 58, 60];
        
        // Time Saved data (orange line)
        $timeSaved = [15, 18, 25, 22, 20, 22, 25, 28, 45];
        
        // Right side stats cards
        $statsCards = [
            [
                'percentage' => '85%',
                'title' => 'Faster Delivery',
                'description' => 'Productivity boost helps teams deliver 35% more work monthly',
                'icon' => 'delivery',
            ],
            [
                'percentage' => '3X',
                'title' => 'Better Visibility',
                'description' => 'Unified project platform offers effortless tracking, updated project.',
                'icon' => 'visibility',
            ],
            [
                'percentage' => '50%',
                'title' => 'Fewer Delays',
                'description' => 'Reduce 50% of your processes cracking in progresses',
                'icon' => 'delays',
            ],
        ];
        
        return [
            'months' => $months,
            'productivityBoost' => $productivityBoost,
            'tasksManaged' => $tasksManaged,
            'timeSaved' => $timeSaved,
            'statsCards' => $statsCards,
        ];
    }
}
