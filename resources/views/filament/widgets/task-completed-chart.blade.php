@php
    $data = $this->getViewData();
    $chartId = 'taskCompletedChart_' . uniqid();
@endphp

<div class="fi-widget-task-chart bg-white rounded-lg shadow-sm p-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Section - Chart (2/3 width) -->
        <div class="lg:col-span-2">
            <div class="mb-4">
                <h3 class="text-lg font-semibold">
                    <span class="text-gray-700">Task Completed</span>
                    <span class="text-purple-600"> Over Time</span>
                </h3>
            </div>
            
            <!-- Legend -->
            <div class="flex items-center gap-4 mb-4 flex-wrap">
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-purple-500"></div>
                    <span class="text-sm text-gray-600">Productivity Boost</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-teal-500"></div>
                    <span class="text-sm text-gray-600">Tasks Managed</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-orange-500"></div>
                    <span class="text-sm text-gray-600">Time Saved</span>
                </div>
            </div>
            
            <!-- Chart Container -->
            <div class="relative" style="height: 300px;">
                <canvas id="{{ $chartId }}"></canvas>
            </div>
        </div>
        
        <!-- Right Section - Stats Cards (1/3 width) -->
        <div class="lg:col-span-1 space-y-4">
            @foreach($data['statsCards'] as $card)
                <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow duration-300">
                    <div class="mb-3">
                        <div class="text-3xl font-bold text-purple-600 mb-1">
                            {{ $card['percentage'] }}
                        </div>
                        <div class="text-base font-semibold text-gray-800 mb-2">
                            {{ $card['title'] }}
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 mt-1">
                            @if($card['icon'] === 'delivery')
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                                </svg>
                            @elseif($card['icon'] === 'visibility')
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            @elseif($card['icon'] === 'delays')
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @endif
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed flex-1">
                            {{ $card['description'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
(function() {
    'use strict';
    
    const chartId = '{{ $chartId }}';
    const chartData = @json($data);
    let chartInstance = null;
    let chartJSLoaded = false;
    
    function loadChartJS() {
        return new Promise(function(resolve, reject) {
            // Check if Chart.js is already loaded (Filament might have it)
            if (typeof Chart !== 'undefined') {
                chartJSLoaded = true;
                resolve();
                return;
            }
            
            // Check if script is already being loaded
            if (document.querySelector('script[src*="chart.js"]')) {
                // Wait for it to load
                const checkInterval = setInterval(function() {
                    if (typeof Chart !== 'undefined') {
                        clearInterval(checkInterval);
                        chartJSLoaded = true;
                        resolve();
                    }
                }, 100);
                
                setTimeout(function() {
                    clearInterval(checkInterval);
                    if (typeof Chart === 'undefined') {
                        reject(new Error('Chart.js loading timeout'));
                    }
                }, 5000);
                return;
            }
            
            // Load Chart.js
            const script = document.createElement('script');
            script.src = 'https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js';
            script.async = true;
            script.onload = function() {
                if (typeof Chart !== 'undefined') {
                    chartJSLoaded = true;
                    resolve();
                } else {
                    reject(new Error('Chart.js failed to load'));
                }
            };
            script.onerror = function() {
                reject(new Error('Failed to load Chart.js from CDN'));
            };
            document.head.appendChild(script);
        });
    }
    
    function initChart() {
        const ctx = document.getElementById(chartId);
        if (!ctx) {
            console.error('Chart canvas not found:', chartId);
            return false;
        }
        
        if (typeof Chart === 'undefined') {
            console.error('Chart.js library not available');
            return false;
        }
        
        // Destroy existing chart if any
        if (chartInstance) {
            chartInstance.destroy();
            chartInstance = null;
        }
        
        try {
            chartInstance = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.months,
                    datasets: [
                        {
                            label: 'Productivity Boost',
                            data: chartData.productivityBoost,
                            backgroundColor: 'rgba(168, 85, 247, 0.2)',
                            borderColor: 'rgb(168, 85, 247)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 4,
                            pointBackgroundColor: 'rgb(168, 85, 247)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                        },
                        {
                            label: 'Tasks Managed',
                            data: chartData.tasksManaged,
                            backgroundColor: 'rgba(20, 184, 166, 0.2)',
                            borderColor: 'rgb(20, 184, 166)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 4,
                            pointBackgroundColor: 'rgb(20, 184, 166)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                        },
                        {
                            label: 'Time Saved',
                            data: chartData.timeSaved,
                            backgroundColor: 'rgba(249, 115, 22, 0.2)',
                            borderColor: 'rgb(249, 115, 22)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 4,
                            pointBackgroundColor: 'rgb(249, 115, 22)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            titleFont: {
                                family: 'Blinker, system-ui, -apple-system, sans-serif',
                                size: 14,
                                weight: 'bold',
                            },
                            bodyFont: {
                                family: 'Blinker, system-ui, -apple-system, sans-serif',
                                size: 13,
                            },
                            callbacks: {
                                label: function(context) {
                                    return context.dataset.label + ': ' + context.parsed.y + '%';
                                },
                            },
                        },
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            min: 0,
                            max: 70,
                            ticks: {
                                stepSize: 10,
                                callback: function(value) {
                                    return value + '%';
                                },
                                font: {
                                    family: 'Blinker, system-ui, -apple-system, sans-serif',
                                    size: 11,
                                },
                                color: '#6B7280',
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)',
                                drawBorder: false,
                            },
                        },
                        x: {
                            grid: {
                                display: false,
                            },
                            ticks: {
                                font: {
                                    family: 'Blinker, system-ui, -apple-system, sans-serif',
                                    size: 11,
                                },
                                color: '#6B7280',
                            },
                        },
                    },
                    interaction: {
                        mode: 'nearest',
                        axis: 'x',
                        intersect: false,
                    },
                },
            });
            console.log('Chart initialized successfully:', chartId);
            return true;
        } catch (error) {
            console.error('Error initializing chart:', error);
            return false;
        }
    }
    
    // Initialize chart
    function startInit() {
        loadChartJS()
            .then(function() {
                // Wait for DOM element
                const checkElement = setInterval(function() {
                    const ctx = document.getElementById(chartId);
                    if (ctx && typeof Chart !== 'undefined') {
                        clearInterval(checkElement);
                        initChart();
                    }
                }, 100);
                
                // Timeout after 5 seconds
                setTimeout(function() {
                    clearInterval(checkElement);
                    if (!chartInstance) {
                        initChart();
                    }
                }, 5000);
            })
            .catch(function(error) {
                console.error('Failed to load Chart.js:', error);
            });
    }
    
    // Start when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', startInit);
    } else {
        startInit();
    }
    
    // Also retry after a delay for dynamic content (Filament widgets load dynamically)
    setTimeout(function() {
        if (!chartInstance && typeof Chart !== 'undefined') {
            initChart();
        }
    }, 1500);
})();
</script>
