@php
    $data = $this->getViewData();
    $widgetId = 'recentActivity_' . uniqid();
@endphp

<div class="fi-widget-recent-activity bg-white rounded-xl shadow-sm border border-gray-100 p-6" x-data="{ activeTab: 'recent' }">
    <!-- Card Title -->
    <div class="mb-6">
        <h3 class="text-lg font-bold text-gray-900">Recent Team Activity</h3>
    </div>
    
    <!-- Tabs -->
    <div class="mb-6 border-b border-gray-200">
        <div class="flex space-x-6 -mb-px">
            <button 
                @click="activeTab = 'recent'"
                :class="activeTab === 'recent' ? 'text-purple-600 border-purple-600 font-semibold' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300'"
                class="pb-3 px-1 border-b-2 text-sm font-medium transition-colors duration-200 uppercase tracking-wide"
            >
                Recent Activity
            </button>
            <button 
                @click="activeTab = 'mytasks'"
                :class="activeTab === 'mytasks' ? 'text-purple-600 border-purple-600 font-semibold' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300'"
                class="pb-3 px-1 border-b-2 text-sm font-medium transition-colors duration-200 uppercase tracking-wide"
            >
                My Tasks
            </button>
            <button 
                @click="activeTab = 'assigned'"
                :class="activeTab === 'assigned' ? 'text-purple-600 border-purple-600 font-semibold' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300'"
                class="pb-3 px-1 border-b-2 text-sm font-medium transition-colors duration-200 uppercase tracking-wide"
            >
                Assigned to Me
            </button>
            <button 
                @click="activeTab = 'starred'"
                :class="activeTab === 'starred' ? 'text-purple-600 border-purple-600 font-semibold' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300'"
                class="pb-3 px-1 border-b-2 text-sm font-medium transition-colors duration-200 uppercase tracking-wide"
            >
                Starred
            </button>
        </div>
    </div>
    
    <!-- Tab Content -->
    <div class="space-y-0">
        <!-- Recent Activity Tab -->
        <div x-show="activeTab === 'recent'" x-transition>
            @if(count($data['recentActivity']) > 0)
                @foreach($data['recentActivity'] as $index => $activity)
                    <div class="flex items-start py-4 {{ $index < count($data['recentActivity']) - 1 ? 'border-b border-gray-100' : '' }}">
                        <!-- Purple Icon -->
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-10 h-10 rounded-lg bg-purple-50 flex items-center justify-center p-2">
                                @if($activity['icon'] === 'design')
                                    <img src="{{ asset('assets/images/icons/design-review.png') }}" alt="Design Review" class="w-full h-full object-contain">
                                @elseif($activity['icon'] === 'testing')
                                    <img src="{{ asset('assets/images/icons/user-testing.png') }}" alt="User Testing" class="w-full h-full object-contain">
                                @elseif($activity['icon'] === 'development')
                                    <img src="{{ asset('assets/images/icons/feature-development.png') }}" alt="Feature Development" class="w-full h-full object-contain">
                                @elseif($activity['icon'] === 'presentation')
                                    <img src="{{ asset('assets/images/icons/final-presentation.png') }}" alt="Final Presentation" class="w-full h-full object-contain">
                                @elseif($activity['icon'] === 'task')
                                    <img src="{{ asset('assets/images/icons/design-review.png') }}" alt="Task" class="w-full h-full object-contain">
                                @elseif($activity['icon'] === 'comment')
                                    <img src="{{ asset('assets/images/icons/user-testing.png') }}" alt="Comment" class="w-full h-full object-contain">
                                @elseif($activity['icon'] === 'assigned')
                                    <img src="{{ asset('assets/images/icons/feature-development.png') }}" alt="Assigned" class="w-full h-full object-contain">
                                @else
                                    <img src="{{ asset('assets/images/icons/design-review.png') }}" alt="Activity" class="w-full h-full object-contain">
                                @endif
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-semibold text-gray-900 mb-1">{{ $activity['title'] }}</h4>
                            <p class="text-xs text-gray-500">Project: {{ $activity['project'] }}</p>
                        </div>
                        
                        <!-- Team Badge & Time -->
                        <div class="flex-shrink-0 ml-4 text-right">
                            <div class="flex items-center justify-end gap-2 mb-1">
                                <div class="w-6 h-6 rounded-full bg-purple-100 flex items-center justify-center">
                                    <span class="text-xs font-semibold text-purple-600">{{ strtoupper($activity['team_badge']) }}</span>
                                </div>
                                <span class="text-xs font-medium text-gray-700">{{ $activity['team'] }}</span>
                            </div>
                            <p class="text-xs text-gray-400">{{ $activity['time'] }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="py-8 text-center text-gray-500">
                    <p class="text-sm">No recent activity</p>
                </div>
            @endif
        </div>
        
        <!-- My Tasks Tab -->
        <div x-show="activeTab === 'mytasks'" x-transition>
            @if(count($data['myTasks']) > 0)
                @foreach($data['myTasks'] as $index => $task)
                    <div class="flex items-start py-4 {{ $index < count($data['myTasks']) - 1 ? 'border-b border-gray-100' : '' }}">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-10 h-10 rounded-lg bg-purple-50 flex items-center justify-center p-2">
                                <img src="{{ asset('assets/images/icons/design-review.png') }}" alt="Task" class="w-full h-full object-contain">
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-semibold text-gray-900 mb-1">{{ $task['title'] }}</h4>
                            <p class="text-xs text-gray-500">Project: {{ $task['project'] }}</p>
                        </div>
                        <div class="flex-shrink-0 ml-4 text-right">
                            <div class="flex items-center justify-end gap-2 mb-1">
                                <div class="w-6 h-6 rounded-full bg-purple-100 flex items-center justify-center">
                                    <span class="text-xs font-semibold text-purple-600">{{ strtoupper($task['team_badge']) }}</span>
                                </div>
                                <span class="text-xs font-medium text-gray-700">{{ $task['team'] }}</span>
                            </div>
                            <p class="text-xs text-gray-400">{{ $task['time'] }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="py-8 text-center text-gray-500">
                    <p class="text-sm">No tasks found</p>
                </div>
            @endif
        </div>
        
        <!-- Assigned to Me Tab -->
        <div x-show="activeTab === 'assigned'" x-transition>
            @if(count($data['assignedToMe']) > 0)
                @foreach($data['assignedToMe'] as $index => $task)
                    <div class="flex items-start py-4 {{ $index < count($data['assignedToMe']) - 1 ? 'border-b border-gray-100' : '' }}">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-10 h-10 rounded-lg bg-purple-50 flex items-center justify-center p-2">
                                <img src="{{ asset('assets/images/icons/feature-development.png') }}" alt="Assigned" class="w-full h-full object-contain">
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-semibold text-gray-900 mb-1">{{ $task['title'] }}</h4>
                            <p class="text-xs text-gray-500">Project: {{ $task['project'] }}</p>
                        </div>
                        <div class="flex-shrink-0 ml-4 text-right">
                            <div class="flex items-center justify-end gap-2 mb-1">
                                <div class="w-6 h-6 rounded-full bg-purple-100 flex items-center justify-center">
                                    <span class="text-xs font-semibold text-purple-600">{{ strtoupper($task['team_badge']) }}</span>
                                </div>
                                <span class="text-xs font-medium text-gray-700">{{ $task['team'] }}</span>
                            </div>
                            <p class="text-xs text-gray-400">{{ $task['time'] }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="py-8 text-center text-gray-500">
                    <p class="text-sm">No assigned tasks</p>
                </div>
            @endif
        </div>
        
        <!-- Starred Tab -->
        <div x-show="activeTab === 'starred'" x-transition>
            <div class="py-8 text-center text-gray-500">
                <p class="text-sm">No starred items</p>
            </div>
        </div>
    </div>
</div>
