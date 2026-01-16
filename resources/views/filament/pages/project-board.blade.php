<x-filament-panels::page class="h-full">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Flowbite Datepicker -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite-datepicker@1.2.0/dist/js/datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite-datepicker@1.2.0/dist/css/datepicker.min.css">

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
            x-on:open-task-edit.window="openTaskEdit($event.detail.taskId)"
        >
            <div class="flex gap-4 p-4 min-w-full h-full">
                
                @forelse($columns as $column)
                <div class="flex flex-col w-80 shrink-0 bg-gray-100 rounded-lg dark:bg-gray-900 h-full border border-gray-200 dark:border-gray-700 {{ isset($column->is_priority) && $column->is_priority ? 'border-yellow-400 dark:border-yellow-600' : '' }}">
                    
                    <div class="p-3 font-bold text-gray-700 dark:text-gray-200 flex justify-between items-center bg-gray-50 dark:bg-gray-800 rounded-t-lg border-b border-gray-200 dark:border-gray-700 {{ isset($column->is_priority) && $column->is_priority ? 'bg-yellow-50 dark:bg-yellow-900/20' : '' }}">
                        <span>{{ $column->title }}</span>
                        <span class="bg-gray-200 dark:bg-gray-700 text-xs px-2 py-1 rounded-full">
                            {{ $column->tasks->count() }}
                        </span>
                    </div>
                    
                    <div class="p-2 border-b border-gray-200 dark:border-gray-700">
                        <button 
                            type="button"
                            wire:click="addTaskToColumn('{{ $column->id }}')"
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
                                <div class="flex items-start justify-between gap-2">
                                    <div class="flex-1 min-w-0">
                                        <div class="font-medium text-sm text-gray-900 dark:text-gray-100">{{ $task->title }}</div>
                                        <div class="text-xs text-gray-500 mt-2 flex flex-col gap-1">
                                            <span>{{ $task->assignee?->name ?? 'Unassigned' }}</span>
                                            @if($task->due_date)
                                                <span class="text-xs">
                                                    Due: {{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-1 flex-shrink-0">
                                        @if($task->priority === 'high')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-200">
                                                High
                                            </span>
                                        @endif
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
                },
                openTaskEdit(taskId) {
                    if (taskId) {
                        setTimeout(() => {
                            $wire.editTask(taskId);
                        }, 500);
                    }
                }
            }
        }

        // Customize Filament DatePicker (Flatpickr) to use year dropdown
        function customizeDatePickerYearSelector() {
            // Find all Flatpickr calendars
            document.querySelectorAll('.flatpickr-calendar').forEach(calendar => {
                // Skip if already customized
                if (calendar.dataset.yearDropdownCustomized === 'true') return;
                
                // Find the current month container
                const currentMonth = calendar.querySelector('.flatpickr-current-month');
                if (!currentMonth) {
                    // Calendar might not be fully rendered yet
                    return;
                }
                
                // Try multiple selectors to find the year input
                let yearInput = null;
                    const currentYear = new Date().getFullYear();
                    
                // Find all number inputs in the current month header
                const numberInputs = currentMonth.querySelectorAll('input[type="number"]');
                
                // In Flatpickr, the year is typically the only number input or the second one
                // Let's check all of them
                numberInputs.forEach(input => {
                    const value = parseInt(input.value);
                    // Year input should have a value that's a valid year (2000-2099)
                    // or be the only/last number input
                    if ((value >= 2000 && value <= 2099) || 
                        (numberInputs.length === 1) ||
                        (input === numberInputs[numberInputs.length - 1])) {
                        if (!yearInput) {
                            yearInput = input;
                        }
                    }
                });
                
                // If still not found, just use the last number input (year is usually last)
                if (!yearInput && numberInputs.length > 0) {
                    yearInput = numberInputs[numberInputs.length - 1];
                }
                
                if (yearInput && !yearInput.dataset.replaced) {
                    // Check if dropdown already exists
                    const existingDropdown = currentMonth.querySelector('.flatpickr-year-dropdown');
                    if (!existingDropdown) {
                        replaceYearInputWithDropdown(yearInput, calendar);
                        calendar.dataset.yearDropdownCustomized = 'true';
                    }
                }
            });
        }
        
        function replaceYearInputWithDropdown(yearInput, calendar) {
            if (!yearInput || yearInput.dataset.replaced === 'true') return;
            yearInput.dataset.replaced = 'true';
            
            // Get current year and create options from current year to 2099
            const currentYear = new Date().getFullYear();
            const maxYear = 2099;
            let currentValue = parseInt(yearInput.value);
            
            // If value is partial (like "202"), try to get full year
            if (currentValue < 2000) {
                currentValue = currentYear;
            }
            
            // Create dropdown select element
            const select = document.createElement('select');
            select.className = 'flatpickr-year-dropdown';
            select.style.cssText = `
                appearance: auto;
                -webkit-appearance: menulist;
                -moz-appearance: menulist;
                padding: 2px 6px;
                border: 1px solid #ccc;
                border-radius: 4px;
                background: white;
                font-size: inherit;
                font-family: inherit;
                margin: 0 2px;
                width: auto;
                min-width: 70px;
                cursor: pointer;
            `;
            
            // Add year options
            for (let year = currentYear; year <= maxYear; year++) {
                const option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                if (year === currentValue) {
                    option.selected = true;
                }
                select.appendChild(option);
            }
            
            // Replace input with select
            const parent = yearInput.parentElement;
            if (parent) {
                // Check if dropdown already exists next to this input
                const existingDropdown = parent.querySelector('.flatpickr-year-dropdown');
                if (existingDropdown) {
                    existingDropdown.remove();
                }
                
                // Find Flatpickr instance - try multiple methods
                let flatpickrInstance = null;
                
                // Method 1: From calendar
                if (calendar._flatpickr) {
                    flatpickrInstance = calendar._flatpickr;
                }
                
                // Method 2: Find input element that opened this calendar
                if (!flatpickrInstance) {
                    const allInputs = document.querySelectorAll('input');
                    for (let input of allInputs) {
                        if (input._flatpickr && input._flatpickr.calendarContainer === calendar) {
                            flatpickrInstance = input._flatpickr;
                            break;
                        }
                    }
                }
                
                // Hide the original input completely but keep it in DOM for Flatpickr
                yearInput.style.cssText = 'display: none !important; width: 0 !important; height: 0 !important; opacity: 0 !important; position: absolute !important;';
                
                // Insert select right after the input
                if (yearInput.nextSibling) {
                    parent.insertBefore(select, yearInput.nextSibling);
                } else {
                    parent.appendChild(select);
                }
                
                // Listen for changes and update the datepicker
                select.addEventListener('change', function() {
                    const selectedYear = parseInt(this.value);
                    
                    // Update the hidden input
                    yearInput.value = selectedYear;
                    
                    // Trigger input event
                    const inputEvent = new Event('input', { bubbles: true, cancelable: true });
                    yearInput.dispatchEvent(inputEvent);
                    
                    // Trigger change event
                    const changeEvent = new Event('change', { bubbles: true, cancelable: true });
                    yearInput.dispatchEvent(changeEvent);
                    
                    // Update Flatpickr if we have the instance
                    if (flatpickrInstance) {
                        try {
                            const currentDate = flatpickrInstance.selectedDates[0] || flatpickrInstance.config.minDate || new Date();
                            if (currentDate instanceof Date) {
                                currentDate.setFullYear(selectedYear);
                                flatpickrInstance.setDate(currentDate, true);
                            }
                        } catch (e) {
                            console.log('Could not update Flatpickr date:', e);
                        }
                    }
                });
                
                // Sync select when year changes (e.g., via month navigation)
                const syncSelect = () => {
                    const newValue = parseInt(yearInput.value);
                    if (newValue >= currentYear && newValue <= maxYear && select.value != newValue) {
                        select.value = newValue;
                    }
                };
                
                // Watch for value changes
                const observer = new MutationObserver(syncSelect);
                observer.observe(yearInput, { 
                    attributes: true, 
                    attributeFilter: ['value'],
                    childList: false,
                    subtree: false
                });
                
                // Also listen to input events
                yearInput.addEventListener('input', syncSelect);
                yearInput.addEventListener('change', syncSelect);
                
                // Also listen to keyup in case user types
                yearInput.addEventListener('keyup', syncSelect);
            }
        }
        
        // More aggressive initialization
        function initYearDropdown() {
            customizeDatePickerYearSelector();
            
            // Also try after a short delay
            setTimeout(customizeDatePickerYearSelector, 100);
            setTimeout(customizeDatePickerYearSelector, 300);
            setTimeout(customizeDatePickerYearSelector, 500);
        }
        
        // Hook into Flatpickr's open event
        document.addEventListener('click', function(e) {
            // When clicking on date inputs, wait for calendar to open
            if (e.target.matches('input[type="text"]') || e.target.closest('.fi-input')) {
                setTimeout(customizeDatePickerYearSelector, 300);
                setTimeout(customizeDatePickerYearSelector, 600);
                setTimeout(customizeDatePickerYearSelector, 1000);
            }
        }, true);
        
        // Also listen for focus events on date inputs
        document.addEventListener('focus', function(e) {
            if (e.target.matches('input[type="text"]') && e.target.closest('.fi-date-time-picker')) {
                setTimeout(customizeDatePickerYearSelector, 300);
                setTimeout(customizeDatePickerYearSelector, 600);
            }
        }, true);
        
        // Initialize on DOM ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initYearDropdown);
        } else {
            initYearDropdown();
        }
        
        // Watch for new datepickers (modals, etc.)
        const observer = new MutationObserver(() => {
            setTimeout(customizeDatePickerYearSelector, 100);
        });
        
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });

            // Run after Livewire updates
            if (window.Livewire) {
                Livewire.hook('morph.updated', () => {
                setTimeout(customizeDatePickerYearSelector, 200);
                });
            }
            
            document.addEventListener('livewire:load', () => {
            setTimeout(initYearDropdown, 200);
            });
            
            document.addEventListener('livewire:update', () => {
            setTimeout(customizeDatePickerYearSelector, 200);
        });
        
        // Also hook into Alpine.js if available (Filament uses Alpine)
        if (window.Alpine) {
            document.addEventListener('alpine:init', () => {
                setTimeout(initYearDropdown, 300);
            });
        }
        
        // Add CSS to hide number input arrows (for any remaining inputs)
        if (!document.getElementById('flatpickr-year-dropdown-style')) {
            const style = document.createElement('style');
            style.id = 'flatpickr-year-dropdown-style';
            style.textContent = `
                .flatpickr-calendar input[type="number"]::-webkit-inner-spin-button,
                .flatpickr-calendar input[type="number"]::-webkit-outer-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                    display: none;
                }
                .flatpickr-calendar input[type="number"] {
                    -moz-appearance: textfield;
                }
                .flatpickr-year-dropdown {
                    appearance: auto !important;
                    -webkit-appearance: menulist !important;
                    -moz-appearance: menulist !important;
                }
            `;
            document.head.appendChild(style);
        }

    </script>
</x-filament-panels::page>