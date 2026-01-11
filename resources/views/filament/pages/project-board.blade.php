<x-filament-panels::page class="h-full">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(!$currentProjectId)
        {{-- Projects Grid View --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 p-6">
            @forelse($projects as $project)
                <div 
                    wire:click="selectProject({{ $project->id }})"
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer border border-gray-200 dark:border-gray-700 p-6 group"
                >
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                            {{ $project->name }}
                        </h3>
                        <span class="px-2 py-1 text-xs font-medium rounded-full 
                            {{ $project->status === 'active' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                            {{ ucfirst($project->status) }}
                        </span>
                    </div>
                    
                    @if($project->description)
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 line-clamp-2">
                            {{ $project->description }}
                        </p>
                    @endif
                    
                    <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>{{ $project->team->name ?? 'No Team' }}</span>
                        </div>
                        <div class="flex items-center gap-1 text-primary-600 dark:text-primary-400">
                            <span>View Board</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-12 text-center">
                    <svg class="w-16 h-16 text-gray-400 dark:text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">No projects found</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Create a project to get started.</p>
                </div>
            @endforelse
        </div>
    @else
        {{-- Project Board View --}}
        @if(isset($selectedProject))
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $selectedProject->name }}</h2>
                @if($selectedProject->description)
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $selectedProject->description }}</p>
                @endif
            </div>
        @endif

        <div 
            class="flex flex-col h-[calc(100vh-14rem)] overflow-x-auto overflow-y-hidden" 
            x-data="kanbanBoard($wire)"
            x-on:show-sweet-alert.window="showSweetAlert($event.detail)"
        >
            <div class="flex gap-4 p-4 min-w-full h-full">
                
                @forelse($columns as $column)
                <div class="flex flex-col w-80 shrink-0 bg-gray-100 rounded-lg dark:bg-gray-900 h-full border border-gray-200 dark:border-gray-700">
                    
                    <div class="p-3 font-bold text-gray-700 dark:text-gray-200 flex justify-between items-center bg-gray-50 dark:bg-gray-800 rounded-t-lg border-b border-gray-200 dark:border-gray-700">
                        <span>{{ $column->title }}</span>
                        <span class="bg-gray-200 dark:bg-gray-700 text-xs px-2 py-1 rounded-full">
                            {{ $column->tasks->count() }}
                        </span>
                    </div>
                    
                    <div class="p-2 border-b border-gray-200 dark:border-gray-700">
                        <button 
                            type="button"
                            wire:click="addTaskToColumn({{ $column->id }})"
                            class="w-full flex items-center justify-center gap-2 px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add Task
                        </button>
                    </div>

                    <div 
                        class="flex-1 p-2 space-y-2 overflow-y-auto"
                        data-column-id="{{ $column->id }}"
                        x-init="initSortable($el)"
                    >
                        @foreach($column->tasks as $task)
                            <div 
                                wire:key="task-{{ $task->id }}" 
                                data-id="{{ $task->id }}" 
                                wire:click="editTask({{ $task->id }})"
                                wire:dblclick="editTask({{ $task->id }})"
                                class="bg-white dark:bg-gray-800 p-3 rounded shadow cursor-pointer hover:shadow-md border border-gray-200 dark:border-gray-700 group relative"
                                style="touch-action: pan-y; user-select: none;"
                            >
                                <div class="font-medium text-sm text-gray-900 dark:text-gray-100">{{ $task->title }}</div>
                                <div class="text-xs text-gray-500 mt-2 flex justify-between items-center">
                                    <span>{{ $task->assignee?->name ?? 'Unassigned' }}</span>
                                    <button 
                                        type="button"
                                        wire:click.stop="editTask({{ $task->id }})"
                                        x-on:click.stop="$wire.editTask({{ $task->id }})"
                                        class="opacity-0 group-hover:opacity-100 text-gray-400 hover:text-gray-600 text-xs p-1"
                                        title="Edit task"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @empty
                    <div class="flex flex-col items-center justify-center w-full h-full text-center text-gray-500 dark:text-gray-400">
                        <p class="mb-4 text-lg font-medium">No columns found for this project.</p>
                        <p class="mb-6 text-sm">Click "Manage Columns" below to set up the board.</p>
                        <button 
                            type="button"
                            wire:click="openManageColumns"
                            class="inline-flex items-center gap-2 px-6 py-3 text-base font-medium text-white bg-primary-600 rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors shadow-md"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Manage Columns
                        </button>
                    </div>
                @endforelse

            </div>
        </div>
    @endif

    {{-- Required for Filament Actions (modals / slide-overs) to render when using mountAction() --}}
    <x-filament-actions::modals />

    <script>
        function kanbanBoard($wire) {
            return {
                initSortable(element) {
                    new Sortable(element, {
                        group: 'kanban',
                        animation: 150,
                        ghostClass: 'bg-blue-100',
                        filter: '[data-no-sort]',
                        preventOnFilter: false,
                        onEnd: (evt) => {
                            $wire.updateTaskStatus(
                                evt.item.dataset.id, 
                                evt.to.dataset.columnId, 
                                evt.newIndex
                            );
                        }
                    });
                },
                showSweetAlert(detail) {
                    Swal.fire({
                        title: detail.title || 'Warning',
                        text: detail.text || 'Please add columns first before adding tasks.',
                        icon: detail.icon || 'warning',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#3b82f6',
                    });
                }
            }
        }

    </script>
</x-filament-panels::page>