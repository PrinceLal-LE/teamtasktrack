<?php

namespace App\Filament\Widgets;

use App\Models\Task;
use App\Models\Project;
use App\Models\Comment;
use Filament\Widgets\Widget;

class RecentTeamActivity extends Widget
{
    protected string $view = 'filament.widgets.recent-team-activity';
    
    protected int | string | array $columnSpan = 'full';
    
    protected static ?int $sort = 10; // Higher number = appears later (bottom)

    public function getViewData(): array
    {
        // Static data as per design
        $recentActivity = [
            [
                'type' => 'design',
                'icon' => 'design',
                'title' => 'Design Review',
                'project' => 'Website Redesign',
                'team' => 'UX Team',
                'team_badge' => 'UX',
                'time' => '3 days ago',
            ],
            [
                'type' => 'testing',
                'icon' => 'testing',
                'title' => 'User Testing',
                'project' => 'Mobile App Launch',
                'team' => 'QA Team',
                'team_badge' => 'QA',
                'time' => '2 days ago',
            ],
            [
                'type' => 'development',
                'icon' => 'development',
                'title' => 'Feature Development',
                'project' => 'E-commerce Platform',
                'team' => 'Dev Team',
                'team_badge' => 'DE',
                'time' => '1 day ago',
            ],
            [
                'type' => 'presentation',
                'icon' => 'presentation',
                'title' => 'Final Presentation',
                'project' => 'Annual Report',
                'team' => 'Marketing Team',
                'team_badge' => 'MK',
                'time' => 'Today',
            ],
        ];
        
        // My Tasks - Static data
        $myTasks = [
            [
                'type' => 'task',
                'icon' => 'task',
                'title' => 'Design Review',
                'project' => 'Website Redesign',
                'team' => 'UX Team',
                'team_badge' => 'UX',
                'time' => '3 days ago',
            ],
            [
                'type' => 'task',
                'icon' => 'task',
                'title' => 'User Testing',
                'project' => 'Mobile App Launch',
                'team' => 'QA Team',
                'team_badge' => 'QA',
                'time' => '2 days ago',
            ],
        ];
        
        // Assigned to Me - Static data
        $assignedToMe = [
            [
                'type' => 'task',
                'icon' => 'assigned',
                'title' => 'Feature Development',
                'project' => 'E-commerce Platform',
                'team' => 'Dev Team',
                'team_badge' => 'DE',
                'time' => '1 day ago',
            ],
            [
                'type' => 'task',
                'icon' => 'assigned',
                'title' => 'Final Presentation',
                'project' => 'Annual Report',
                'team' => 'Marketing Team',
                'team_badge' => 'MK',
                'time' => 'Today',
            ],
        ];
        
        // Starred - Empty for now
        $starred = [];
        
        return [
            'recentActivity' => $recentActivity,
            'myTasks' => $myTasks,
            'assignedToMe' => $assignedToMe,
            'starred' => $starred,
        ];
    }
}
