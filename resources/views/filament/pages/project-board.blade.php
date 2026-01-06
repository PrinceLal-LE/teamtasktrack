<x-filament-panels::page class="h-full">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="mb-2">
        <label for="project-select" class="sr-only">Select Project</label>
        <select 
            id="project-select"
            wire:model.live="currentProjectId" 
            class="bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-64"
        >
            <option value="" disabled>Select a Project</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    </div>

    <div 
        class="flex flex-col h-[calc(100vh-14rem)] overflow-x-auto overflow-y-hidden" 
        x-data="kanbanBoard($wire)"
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
                <div class="flex flex-col items-center justify-center w-full h-full text-gray-500">
                    <p class="mb-2 text-lg">No columns found for this project.</p>
                    <p class="text-sm">Click "Manage Columns" top-right to set up the board.</p>
                </div>
            @endforelse

        </div>
    </div>

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
                }
            }
        }

    </script>
</x-filament-panels::page>