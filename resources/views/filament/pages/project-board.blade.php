<x-filament-panels::page>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

    <div class="flex flex-col h-full overflow-x-auto" x-data="kanbanBoard($wire)">
        <div class="flex gap-4 p-4 min-w-full">
            
            @forelse($columns as $column)
                <div class="flex flex-col w-80 bg-gray-100 rounded-lg dark:bg-gray-900 h-full border border-gray-200 dark:border-gray-700">
                    
                    <div class="p-3 font-bold text-gray-700 dark:text-gray-200 flex justify-between items-center">
                        <span>{{ $column->title }}</span>
                        <span class="bg-gray-200 dark:bg-gray-700 text-xs px-2 py-1 rounded-full">
                            {{ $column->tasks->count() }}
                        </span>
                    </div>

                    <div 
                        class="flex-1 p-2 space-y-2 overflow-y-auto min-h-[150px]"
                        data-column-id="{{ $column->id }}"
                        x-init="initSortable($el)"
                    >
                        @foreach($column->tasks as $task)
                            <div 
                                wire:key="task-{{ $task->id }}" 
                                data-id="{{ $task->id }}" 
                                class="bg-white dark:bg-gray-800 p-3 rounded shadow cursor-pointer hover:shadow-md border border-gray-200 dark:border-gray-700"
                            >
                                <div class="font-medium text-sm text-gray-900 dark:text-gray-100">{{ $task->title }}</div>
                                
                                <div class="text-xs text-gray-500 mt-2 flex justify-between items-center">
                                    <span>{{ $task->assignee?->name ?? 'Unassigned' }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="p-4 text-gray-500">
                    No columns found. Ensure you have seeded the database!
                </div>
            @endforelse

        </div>
    </div>

    <script>
        function kanbanBoard($wire) {
            return {
                initSortable(element) {
                    new Sortable(element, {
                        group: 'kanban', // Allows moving between columns
                        animation: 150,
                        ghostClass: 'bg-blue-100', // The styling of the empty space while dragging
                        onEnd: (evt) => {
                            const taskId = evt.item.dataset.id;
                            const newColumnId = evt.to.dataset.columnId;
                            const newIndex = evt.newIndex;

                            // Call the PHP method 'updateTaskStatus'
                            $wire.updateTaskStatus(taskId, newColumnId, newIndex);
                        }
                    });
                }
            }
        }
    </script>
</x-filament-panels::page>