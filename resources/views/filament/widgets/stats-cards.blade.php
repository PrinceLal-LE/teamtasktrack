@php
    $stats = $this->getViewData();
    $rows = array_chunk($stats, 4);
@endphp

<div class="fi-widget-stats-cards w-full">
    @foreach($rows as $row)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 w-full mb-3 last:mb-0">
            @foreach($row as $stat)
                <div class="stats-card bg-white rounded-[18px] shadow-md p-4 flex items-center justify-between hover:shadow-lg transition-all duration-300 w-full h-full">
                    <div class="flex-1 min-w-0">
                        <div class="text-2xl sm:text-2xl lg:text-3xl bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-1.5 leading-tight">
                            {{ $stat['number'] }}
                        </div>
                        <div class="text-xs sm:text-sm text-gray-600 truncate">
                            {{ $stat['label'] }}
                        </div>
                    </div>
                    <div class="stats-icon-container flex-shrink-0 ml-3">
                        @include('filament.widgets.partials.stat-icon', ['icon' => $stat['icon'], 'color' => $stat['color']])
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
