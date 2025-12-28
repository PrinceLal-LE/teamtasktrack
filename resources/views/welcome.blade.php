<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Covsm') }}</title>
    <link rel="icon" href="images/favicon.ico">
    <title>Pro-Task | Organize, Track, and Accomplish More. Together.</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <script type="module" crossorigin src="/javascrips.js"></script>
    <link rel="stylesheet" crossorigin href="/resources/css/homePageStyle.css">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css','resources/css/homePageStyle.css', 'resources/js/app.js',
    'resources/js/homePageScript.js'])
    @endif
</head>

<body>

    <div id="app" data-v-app="">
        <div class="bg-white text-slate-800 min-h-screen">
            <header class="sticky top-0 bg-white/90 backdrop-blur-md z-50 border-b border-slate-200/60 shadow-sm">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <div class="flex-shrink-0"><a href="#"
                                class="text-2xl font-bold text-slate-900 flex items-center group"><img
                                    src="images/Only_Logo.png"
                                    class="h-8 w-auto group-hover:scale-105 transition-transform duration-300"
                                    alt="COVSM"><span
                                    class="ml-2 bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent font-vandal">
                                    COVSM </span></a></div>
                        <nav class="hidden md:flex md:items-center md:space-x-8"><a href="#features"
                                class="text-slate-600 hover:text-indigo-600 font-medium transition-colors duration-200 group">
                                Features <span
                                    class="block h-0.5 bg-indigo-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span></a><a
                                href="#project-views"
                                class="text-slate-600 hover:text-indigo-600 font-medium transition-colors duration-200 group">
                                Views <span
                                    class="block h-0.5 bg-indigo-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span></a><a
                                href="#time-tracking"
                                class="text-slate-600 hover:text-indigo-600 font-medium transition-colors duration-200 group">
                                Time Tracking <span
                                    class="block h-0.5 bg-indigo-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span></a><a
                                href="#team-collaboration"
                                class="text-slate-600 hover:text-indigo-600 font-medium transition-colors duration-200 group">
                                Team <span
                                    class="block h-0.5 bg-indigo-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span></a><a
                                href="#testimonials"
                                class="text-slate-600 hover:text-indigo-600 font-medium transition-colors duration-200 group">
                                Reviews <span
                                    class="block h-0.5 bg-indigo-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span></a>
                        </nav>
                        <div class="flex items-center space-x-4"><a href="https://pro-task.w3bd.com/" target="_blank"
                                class="hidden sm:inline-flex items-center px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 font-medium transition-all duration-200 group"><i
                                    class="fa-solid fa-external-link-alt mr-2 group-hover:translate-x-0.5 transition-transform"></i>
                                Live Demo </a><a
                                href="https://codecanyon.net/item/protask-a-teamwork-project-management-tool-including-time-tracking/49556761"
                                target="_blank"
                                class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 group"><i
                                    class="fa-solid fa-shopping-cart mr-2 group-hover:scale-110 transition-transform"></i>
                                Buy Now <i
                                    class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i></a>
                        </div><button
                            class="md:hidden p-2 rounded-lg text-gray-600 hover:text-indigo-600 hover:bg-gray-100 transition-colors duration-200"><i
                                class="fa-solid fa-bars text-xl"></i></button>
                    </div><!---->
                </div>
            </header>
            <main>
                <section data-v-c5f5cdf1=""
                    class="relative bg-gradient-to-br from-slate-50 via-white to-indigo-50 overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden" data-v-c5f5cdf1="">
                        <div class="absolute -top-40 -right-40 w-80 h-80 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"
                            data-v-c5f5cdf1=""></div>
                        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"
                            data-v-c5f5cdf1=""></div>
                        <div class="absolute top-40 left-1/2 w-80 h-80 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"
                            data-v-c5f5cdf1=""></div>
                    </div>
                    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-28 md:pb-36"
                        data-v-c5f5cdf1="">
                        <div class="text-center max-w-5xl mx-auto aos-init aos-animate" data-aos="fade-up"
                            data-v-c5f5cdf1="">
                            <div class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-100 text-indigo-800 text-sm font-semibold mb-6"
                                data-v-c5f5cdf1=""><i class="fa-solid fa-rocket mr-2" data-v-c5f5cdf1=""></i> Work
                                Management Platform for Teams </div>
                            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold tracking-tight text-slate-900 mb-6"
                                data-v-c5f5cdf1=""> Visual Project Management &amp; <span
                                    class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent"
                                    data-v-c5f5cdf1=""> Time Tracking </span><br data-v-c5f5cdf1="">for Teams </h1>
                            <p class="text-lg md:text-xl lg:text-2xl text-slate-600 max-w-3xl mx-auto mb-8 leading-relaxed"
                                data-v-c5f5cdf1=""> Transform your team's productivity with ProTask's comprehensive
                                work management platform. From visual project boards to detailed time tracking,
                                everything you need to succeed in one place. </p>
                            <div class="flex flex-wrap justify-center gap-6 mb-10 text-sm md:text-base"
                                data-v-c5f5cdf1="">
                                <div class="flex items-center text-slate-600" data-v-c5f5cdf1=""><i
                                        class="fa-solid fa-check-circle text-green-500 mr-2"
                                        data-v-c5f5cdf1=""></i><span data-v-c5f5cdf1="">Visual Project
                                        Management</span></div>
                                <div class="flex items-center text-slate-600" data-v-c5f5cdf1=""><i
                                        class="fa-solid fa-check-circle text-green-500 mr-2"
                                        data-v-c5f5cdf1=""></i><span data-v-c5f5cdf1="">Advanced Time
                                        Tracking</span></div>
                                <div class="flex items-center text-slate-600" data-v-c5f5cdf1=""><i
                                        class="fa-solid fa-check-circle text-green-500 mr-2"
                                        data-v-c5f5cdf1=""></i><span data-v-c5f5cdf1="">Team Collaboration</span>
                                </div>
                                <div class="flex items-center text-slate-600" data-v-c5f5cdf1=""><i
                                        class="fa-solid fa-check-circle text-green-500 mr-2"
                                        data-v-c5f5cdf1=""></i><span data-v-c5f5cdf1="">Real-time Analytics</span>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12"
                                data-v-c5f5cdf1=""><a href="https://pro-task.w3bd.com/" target="_blank"
                                    class="group inline-flex items-center px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105"
                                    data-v-c5f5cdf1=""><i class="fa-solid fa-play mr-2" data-v-c5f5cdf1=""></i> Try
                                    Live Demo <i
                                        class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"
                                        data-v-c5f5cdf1=""></i></a><a
                                    href="https://codecanyon.net/item/protask-a-teamwork-project-management-tool-including-time-tracking/49556761"
                                    target="_blank"
                                    class="group inline-flex items-center px-8 py-4 text-lg font-semibold text-indigo-700 bg-white border-2 border-indigo-200 rounded-xl hover:bg-indigo-50 hover:border-indigo-300 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105"
                                    data-v-c5f5cdf1=""><i class="fa-solid fa-shopping-cart mr-2" data-v-c5f5cdf1=""></i>
                                    Buy Now <i
                                        class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"
                                        data-v-c5f5cdf1=""></i></a></div>
                            <div class="text-center" data-v-c5f5cdf1="">
                                <p class="text-sm text-slate-500 mb-4" data-v-c5f5cdf1="">Trusted by teams worldwide
                                </p>
                                <div class="flex justify-center items-center space-x-8 opacity-60" data-v-c5f5cdf1="">
                                    <div class="text-2xl font-bold text-slate-400" data-v-c5f5cdf1="">1000+</div>
                                    <div class="text-2xl font-bold text-slate-400" data-v-c5f5cdf1="">Teams</div>
                                    <div class="text-2xl font-bold text-slate-400" data-v-c5f5cdf1="">50+</div>
                                    <div class="text-2xl font-bold text-slate-400" data-v-c5f5cdf1="">Countries
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-16 max-w-6xl mx-auto aos-init aos-animate" data-aos="fade-up"
                            data-aos-delay="200" data-v-c5f5cdf1="">
                            <div class="relative" data-v-c5f5cdf1="">
                                <div class="rounded-2xl bg-white p-3 shadow-2xl ring-1 ring-gray-900/10 transform hover:scale-[1.02] transition-all duration-500"
                                    data-v-c5f5cdf1=""><img src="/images/hero_image.jpg"
                                        alt="ProTask Dashboard - Visual Project Management Platform"
                                        class="rounded-xl w-full" data-v-c5f5cdf1=""></div>
                                <div class="absolute -top-4 -left-4 bg-white rounded-xl p-4 shadow-lg ring-1 ring-gray-900/10 animate-float"
                                    data-v-c5f5cdf1="">
                                    <div class="flex items-center space-x-3" data-v-c5f5cdf1="">
                                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center"
                                            data-v-c5f5cdf1=""><i class="fa-solid fa-clock text-green-600"
                                                data-v-c5f5cdf1=""></i></div>
                                        <div data-v-c5f5cdf1="">
                                            <div class="text-sm font-semibold text-slate-900" data-v-c5f5cdf1="">
                                                Time Tracking</div>
                                            <div class="text-xs text-slate-500" data-v-c5f5cdf1="">Real-time
                                                monitoring</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="absolute -bottom-4 -right-4 bg-white rounded-xl p-4 shadow-lg ring-1 ring-gray-900/10 animate-float animation-delay-2000"
                                    data-v-c5f5cdf1="">
                                    <div class="flex items-center space-x-3" data-v-c5f5cdf1="">
                                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center"
                                            data-v-c5f5cdf1=""><i class="fa-solid fa-users text-blue-600"
                                                data-v-c5f5cdf1=""></i></div>
                                        <div data-v-c5f5cdf1="">
                                            <div class="text-sm font-semibold text-slate-900" data-v-c5f5cdf1="">
                                                Team Collaboration</div>
                                            <div class="text-xs text-slate-500" data-v-c5f5cdf1="">Seamless teamwork
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="absolute top-1/2 -right-8 bg-white rounded-xl p-4 shadow-lg ring-1 ring-gray-900/10 animate-float animation-delay-4000"
                                    data-v-c5f5cdf1="">
                                    <div class="flex items-center space-x-3" data-v-c5f5cdf1="">
                                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center"
                                            data-v-c5f5cdf1=""><i class="fa-solid fa-chart-line text-purple-600"
                                                data-v-c5f5cdf1=""></i></div>
                                        <div data-v-c5f5cdf1="">
                                            <div class="text-sm font-semibold text-slate-900" data-v-c5f5cdf1="">
                                                Analytics</div>
                                            <div class="text-xs text-slate-500" data-v-c5f5cdf1="">Data insights
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="features" class="bg-white py-20 md:py-24">
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-16 aos-init aos-animate" data-aos="fade-up">
                            <div
                                class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-100 text-indigo-800 text-sm font-semibold mb-4">
                                <i class="fa-solid fa-star mr-2"></i> Core Features
                            </div>
                            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6"> Everything
                                Your Team Needs to <span
                                    class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Succeed</span>
                            </h2>
                            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed"> ProTask
                                combines powerful project management tools with advanced time tracking and team
                                collaboration features. All in one comprehensive platform designed for modern teams.
                            </p>
                        </div>
                        <div class="grid lg:grid-cols-2 gap-16 items-center mb-20">
                            <div data-aos="fade-right" class="aos-init aos-animate">
                                <div class="space-y-8">
                                    <div
                                        class="group flex items-start p-6 rounded-2xl hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 transition-all duration-300">
                                        <div
                                            class="flex-shrink-0 w-14 h-14 flex items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 text-white group-hover:scale-110 transition-transform duration-300">
                                            <i class="fa-solid fa-table-columns text-xl"></i>
                                        </div>
                                        <div class="ml-6">
                                            <h3 class="text-xl font-bold text-gray-900 mb-2">Multiple Project Views
                                            </h3>
                                            <p class="text-gray-600 mb-3">Choose from Board, List, Calendar,
                                                Timeline, and Gantt views to visualize your projects exactly how you
                                                want.</p>
                                            <div class="flex flex-wrap gap-2"><span
                                                    class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm font-medium">Kanban
                                                    Board</span><span
                                                    class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-medium">Timeline</span><span
                                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">Calendar</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="group flex items-start p-6 rounded-2xl hover:bg-gradient-to-r hover:from-green-50 hover:to-blue-50 transition-all duration-300">
                                        <div
                                            class="flex-shrink-0 w-14 h-14 flex items-center justify-center rounded-xl bg-gradient-to-br from-green-500 to-blue-600 text-white group-hover:scale-110 transition-transform duration-300">
                                            <i class="fa-solid fa-clock text-xl"></i>
                                        </div>
                                        <div class="ml-6">
                                            <h3 class="text-xl font-bold text-gray-900 mb-2">Advanced Time Tracking
                                            </h3>
                                            <p class="text-gray-600 mb-3">Built-in timers, manual time entry, and
                                                comprehensive time logs with detailed analytics and reporting.</p>
                                            <div class="flex flex-wrap gap-2"><span
                                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">One-click
                                                    Timer</span><span
                                                    class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">Time
                                                    Logs</span><span
                                                    class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-medium">Analytics</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="group flex items-start p-6 rounded-2xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-300">
                                        <div
                                            class="flex-shrink-0 w-14 h-14 flex items-center justify-center rounded-xl bg-gradient-to-br from-purple-500 to-pink-600 text-white group-hover:scale-110 transition-transform duration-300">
                                            <i class="fa-solid fa-users text-xl"></i>
                                        </div>
                                        <div class="ml-6">
                                            <h3 class="text-xl font-bold text-gray-900 mb-2">Team Collaboration</h3>
                                            <p class="text-gray-600 mb-3">Workspace management, user roles,
                                                real-time notifications, and seamless team communication tools.</p>
                                            <div class="flex flex-wrap gap-2"><span
                                                    class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-medium">Workspaces</span><span
                                                    class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm font-medium">Notifications</span><span
                                                    class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm font-medium">User
                                                    Roles</span></div>
                                        </div>
                                    </div>
                                    <div
                                        class="group flex items-start p-6 rounded-2xl hover:bg-gradient-to-r hover:from-orange-50 hover:to-red-50 transition-all duration-300">
                                        <div
                                            class="flex-shrink-0 w-14 h-14 flex items-center justify-center rounded-xl bg-gradient-to-br from-orange-500 to-red-600 text-white group-hover:scale-110 transition-transform duration-300">
                                            <i class="fa-solid fa-palette text-xl"></i>
                                        </div>
                                        <div class="ml-6">
                                            <h3 class="text-xl font-bold text-gray-900 mb-2">Full Customization</h3>
                                            <p class="text-gray-600 mb-3">Customize backgrounds, themes, and layouts
                                                to match your team's brand and workflow preferences.</p>
                                            <div class="flex flex-wrap gap-2"><span
                                                    class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm font-medium">Backgrounds</span><span
                                                    class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-medium">Themes</span><span
                                                    class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm font-medium">Layouts</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-aos="fade-left" class="aos-init aos-animate">
                                <div class="relative">
                                    <div
                                        class="rounded-2xl bg-white p-4 shadow-2xl ring-1 ring-gray-900/10 transform hover:scale-[1.02] transition-all duration-500">
                                        <img src="/images/board-view-2.jpg"
                                            alt="ProTask Board View - Multiple Project Management Features"
                                            class="rounded-xl w-full">
                                    </div>
                                    <div
                                        class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg p-3 shadow-lg">
                                        <div class="flex items-center space-x-2">
                                            <div
                                                class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                                                <i class="fa-solid fa-table-columns text-indigo-600 text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-900">Board View</div>
                                                <div class="text-xs text-gray-500">Drag &amp; drop tasks</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm rounded-lg p-3 shadow-lg">
                                        <div class="flex items-center space-x-2">
                                            <div
                                                class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                                <i class="fa-solid fa-clock text-green-600 text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-900">Time Tracking</div>
                                                <div class="text-xs text-gray-500">Real-time monitoring</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                            <div class="group text-center p-8 rounded-2xl bg-gradient-to-br from-slate-50 to-gray-100 hover:from-indigo-50 hover:to-purple-50 transition-all duration-300 hover:shadow-lg aos-init aos-animate"
                                data-aos="fade-up">
                                <div
                                    class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300">
                                    <i class="fa-solid fa-chart-line text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-4">Analytics &amp; Reporting</h3>
                                <p class="text-gray-600 mb-4">Comprehensive project analytics, time reports, and
                                    productivity insights to optimize your team's performance.</p>
                                <div class="flex justify-center"><img src="/images/report.jpg" alt="Analytics Dashboard"
                                        class="rounded-lg shadow-md w-full max-w-xs">
                                </div>
                            </div>
                            <div class="group text-center p-8 rounded-2xl bg-gradient-to-br from-slate-50 to-gray-100 hover:from-green-50 hover:to-blue-50 transition-all duration-300 hover:shadow-lg aos-init aos-animate"
                                data-aos="fade-up" data-aos-delay="100">
                                <div
                                    class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-green-500 to-blue-600 rounded-2xl flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300">
                                    <i class="fa-solid fa-mobile-screen text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-4">Mobile Responsive</h3>
                                <p class="text-gray-600 mb-4">Access your projects anywhere with our fully
                                    responsive design that works perfectly on all devices.</p>
                                <div class="flex justify-center"><img src="/images/login-page.jpg"
                                        alt="Mobile Responsive Design" class="rounded-lg shadow-md w-full max-w-xs">
                                </div>
                            </div>
                            <div class="group text-center p-8 rounded-2xl bg-gradient-to-br from-slate-50 to-gray-100 hover:from-purple-50 hover:to-pink-50 transition-all duration-300 hover:shadow-lg aos-init aos-animate"
                                data-aos="fade-up" data-aos-delay="200">
                                <div
                                    class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300">
                                    <i class="fa-solid fa-download text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-4">Export &amp; Integration</h3>
                                <p class="text-gray-600 mb-4">Export data in multiple formats and integrate with
                                    your existing tools for seamless workflow management.</p>
                                <div class="flex justify-center"><img src="/images/time-log.jpg"
                                        alt="Export and Time Logs" class="rounded-lg shadow-md w-full max-w-xs">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="project-views"
                    class="bg-gradient-to-br from-slate-50 via-white to-indigo-50 py-20 md:py-24">
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-16 aos-init aos-animate" data-aos="fade-up">
                            <div
                                class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-100 text-indigo-800 text-sm font-semibold mb-4">
                                <i class="fa-solid fa-eye mr-2"></i> Project Views
                            </div>
                            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6"> Choose Your
                                Perfect <span
                                    class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Project
                                    View</span></h2>
                            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed"> ProTask
                                offers multiple ways to visualize and manage your projects. Switch between views
                                instantly to find the perspective that works best for your team and workflow. </p>
                        </div>
                        <div class="grid lg:grid-cols-2 gap-16 mb-20">
                            <div class="group aos-init aos-animate" data-aos="fade-right">
                                <div
                                    class="relative rounded-2xl bg-white p-6 shadow-xl ring-1 ring-gray-900/10 hover:shadow-2xl transition-all duration-500">
                                    <div class="flex items-center justify-between mb-6">
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center text-white">
                                                <i class="fa-solid fa-table-columns text-xl"></i>
                                            </div>
                                            <div>
                                                <h3 class="text-2xl font-bold text-gray-900">Board View</h3>
                                                <p class="text-gray-600">Kanban-style task management</p>
                                            </div>
                                        </div>
                                        <div
                                            class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm font-medium">
                                            Most Popular </div>
                                    </div>
                                    <p class="text-gray-600 mb-6 leading-relaxed"> Organize tasks in customizable
                                        columns with drag-and-drop functionality. Perfect for agile teams who want
                                        to visualize workflow stages and track progress at a glance. </p>
                                    <div class="rounded-xl overflow-hidden shadow-lg"><img src="/images/board-view.jpg"
                                            alt="ProTask Board View - Kanban Task Management"
                                            class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="mt-6 flex flex-wrap gap-2"><span
                                            class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm">Drag
                                            &amp; Drop</span><span
                                            class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm">Custom
                                            Columns</span><span
                                            class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Visual
                                            Progress</span></div>
                                </div>
                            </div>
                            <div class="group aos-init aos-animate" data-aos="fade-left">
                                <div
                                    class="relative rounded-2xl bg-white p-6 shadow-xl ring-1 ring-gray-900/10 hover:shadow-2xl transition-all duration-500">
                                    <div class="flex items-center justify-between mb-6">
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="w-12 h-12 bg-gradient-to-br from-green-500 to-blue-600 rounded-xl flex items-center justify-center text-white">
                                                <i class="fa-solid fa-list text-xl"></i>
                                            </div>
                                            <div>
                                                <h3 class="text-2xl font-bold text-gray-900">List View</h3>
                                                <p class="text-gray-600">Detailed task listing</p>
                                            </div>
                                        </div>
                                        <div
                                            class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">
                                            Data Rich </div>
                                    </div>
                                    <p class="text-gray-600 mb-6 leading-relaxed"> Get a comprehensive overview of
                                        all tasks with detailed information, filtering options, and sorting
                                        capabilities. Ideal for project managers who need detailed task data. </p>
                                    <div class="rounded-xl overflow-hidden shadow-lg"><img src="/images/list-view.jpg"
                                            alt="ProTask List View - Detailed Task Management"
                                            class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="mt-6 flex flex-wrap gap-2"><span
                                            class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Detailed
                                            Info</span><span
                                            class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">Filtering</span><span
                                            class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm">Sorting</span>
                                    </div>
                                </div>
                            </div>
                            <div class="group aos-init aos-animate" data-aos="fade-right">
                                <div
                                    class="relative rounded-2xl bg-white p-6 shadow-xl ring-1 ring-gray-900/10 hover:shadow-2xl transition-all duration-500">
                                    <div class="flex items-center justify-between mb-6">
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center text-white">
                                                <i class="fa-solid fa-calendar-days text-xl"></i>
                                            </div>
                                            <div>
                                                <h3 class="text-2xl font-bold text-gray-900">Calendar View</h3>
                                                <p class="text-gray-600">Schedule visualization</p>
                                            </div>
                                        </div>
                                        <div
                                            class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-medium">
                                            Time Focused </div>
                                    </div>
                                    <p class="text-gray-600 mb-6 leading-relaxed"> Visualize your project timeline
                                        with month, week, and day views. Perfect for deadline management and
                                        understanding project schedules at a glance. </p>
                                    <div class="rounded-xl overflow-hidden shadow-lg"><img
                                            src="/images/calendar-view.jpg"
                                            alt="ProTask Calendar View - Project Timeline Management"
                                            class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="mt-6 flex flex-wrap gap-2"><span
                                            class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm">Timeline</span><span
                                            class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm">Deadlines</span><span
                                            class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm">Scheduling</span>
                                    </div>
                                </div>
                            </div>
                            <div class="group aos-init aos-animate" data-aos="fade-left">
                                <div
                                    class="relative rounded-2xl bg-white p-6 shadow-xl ring-1 ring-gray-900/10 hover:shadow-2xl transition-all duration-500">
                                    <div class="flex items-center justify-between mb-6">
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center text-white">
                                                <i class="fa-solid fa-timeline text-xl"></i>
                                            </div>
                                            <div>
                                                <h3 class="text-2xl font-bold text-gray-900">Timeline View</h3>
                                                <p class="text-gray-600">Chronological task flow</p>
                                            </div>
                                        </div>
                                        <div
                                            class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm font-medium">
                                            New Feature </div>
                                    </div>
                                    <p class="text-gray-600 mb-6 leading-relaxed"> See your project tasks in
                                        chronological order with a modern timeline interface. Great for
                                        understanding task dependencies and project flow over time. </p>
                                    <div class="rounded-xl overflow-hidden shadow-lg"><img
                                            src="/images/timeline-view.jpg"
                                            alt="ProTask Timeline View - Chronological Task Management"
                                            class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="mt-6 flex flex-wrap gap-2"><span
                                            class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm">Chronological</span><span
                                            class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">Dependencies</span><span
                                            class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm">Flow</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="group aos-init aos-animate" data-aos="fade-up">
                                <div
                                    class="relative rounded-2xl bg-white p-6 shadow-xl ring-1 ring-gray-900/10 hover:shadow-2xl transition-all duration-500">
                                    <div class="flex items-center space-x-4 mb-6">
                                        <div
                                            class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center text-white">
                                            <i class="fa-solid fa-chart-pie text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-bold text-gray-900">Dashboard &amp; Reports
                                            </h3>
                                            <p class="text-gray-600">Analytics and insights</p>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 mb-6 leading-relaxed"> Get comprehensive project
                                        analytics, team performance metrics, and detailed reports to make
                                        data-driven decisions and optimize your workflow. </p>
                                    <div class="rounded-xl overflow-hidden shadow-lg"><img src="/images/report.jpg"
                                            alt="ProTask Dashboard - Project Analytics and Reports"
                                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                </div>
                            </div>
                            <div class="group aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                <div
                                    class="relative rounded-2xl bg-white p-6 shadow-xl ring-1 ring-gray-900/10 hover:shadow-2xl transition-all duration-500">
                                    <div class="flex items-center space-x-4 mb-6">
                                        <div
                                            class="w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center text-white">
                                            <i class="fa-solid fa-project-diagram text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-bold text-gray-900">Gantt Chart</h3>
                                            <p class="text-gray-600">Project timeline visualization</p>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 mb-6 leading-relaxed"> Create detailed project timelines
                                        with Gantt charts showing task dependencies, milestones, and critical path
                                        analysis for complex project management. </p>
                                    <div
                                        class="rounded-xl overflow-hidden shadow-lg bg-gradient-to-br from-teal-50 to-cyan-50 p-8 flex items-center justify-center">
                                        <div class="text-center"><i
                                                class="fa-solid fa-project-diagram text-4xl text-teal-600 mb-4"></i>
                                            <p class="text-teal-700 font-medium">Gantt Chart View</p>
                                            <p class="text-teal-600 text-sm">Coming Soon</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section data-v-cfd309ff="" id="time-tracking" class="bg-white py-20 md:py-24">
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8" data-v-cfd309ff="">
                        <div class="grid lg:grid-cols-2 gap-16 items-center" data-v-cfd309ff="">
                            <div data-aos="fade-right" data-v-cfd309ff="" class="aos-init aos-animate">
                                <div class="inline-flex items-center px-4 py-2 rounded-full bg-green-100 text-green-800 text-sm font-semibold mb-6"
                                    data-v-cfd309ff=""><i class="fa-solid fa-clock mr-2" data-v-cfd309ff=""></i>
                                    Time Management </div>
                                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6"
                                    data-v-cfd309ff=""> Track Time Like a <span
                                        class="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent"
                                        data-v-cfd309ff="">Pro</span></h2>
                                <p class="text-lg md:text-xl text-gray-600 mb-8 leading-relaxed" data-v-cfd309ff="">
                                    Built-in time tracking with automatic timers, manual entries, and comprehensive
                                    reporting. Know exactly where your time goes and optimize productivity with
                                    detailed insights. </p>
                                <div class="space-y-6 mb-8" data-v-cfd309ff="">
                                    <div class="flex items-start space-x-4" data-v-cfd309ff="">
                                        <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center"
                                            data-v-cfd309ff=""><i class="fa-solid fa-play text-green-600 text-sm"
                                                data-v-cfd309ff=""></i></div>
                                        <div data-v-cfd309ff="">
                                            <h3 class="text-lg font-semibold text-gray-900 mb-1" data-v-cfd309ff="">
                                                One-Click Timer</h3>
                                            <p class="text-gray-600" data-v-cfd309ff="">Start and stop timers
                                                instantly with a single click. Perfect for tracking time on specific
                                                tasks without interruption.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4" data-v-cfd309ff="">
                                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center"
                                            data-v-cfd309ff=""><i class="fa-solid fa-edit text-blue-600 text-sm"
                                                data-v-cfd309ff=""></i></div>
                                        <div data-v-cfd309ff="">
                                            <h3 class="text-lg font-semibold text-gray-900 mb-1" data-v-cfd309ff="">
                                                Manual Time Entry</h3>
                                            <p class="text-gray-600" data-v-cfd309ff="">Add time entries manually
                                                for accurate project billing and retrospective time tracking.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4" data-v-cfd309ff="">
                                        <div class="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center"
                                            data-v-cfd309ff=""><i class="fa-solid fa-chart-bar text-purple-600 text-sm"
                                                data-v-cfd309ff=""></i></div>
                                        <div data-v-cfd309ff="">
                                            <h3 class="text-lg font-semibold text-gray-900 mb-1" data-v-cfd309ff="">
                                                Detailed Analytics</h3>
                                            <p class="text-gray-600" data-v-cfd309ff="">Comprehensive time reports
                                                with user and task filtering, productivity insights, and export
                                                capabilities.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4" data-v-cfd309ff="">
                                        <div class="flex-shrink-0 w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center"
                                            data-v-cfd309ff=""><i class="fa-solid fa-download text-orange-600 text-sm"
                                                data-v-cfd309ff=""></i></div>
                                        <div data-v-cfd309ff="">
                                            <h3 class="text-lg font-semibold text-gray-900 mb-1" data-v-cfd309ff="">
                                                Export &amp; Reporting</h3>
                                            <p class="text-gray-600" data-v-cfd309ff="">Export time data in multiple
                                                formats for client billing, team reporting, and project analysis.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-4" data-v-cfd309ff=""><a
                                        href="https://pro-task.w3bd.com/" target="_blank"
                                        class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white font-semibold rounded-xl hover:from-green-700 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105"
                                        data-v-cfd309ff=""><i class="fa-solid fa-play mr-2" data-v-cfd309ff=""></i>
                                        Try Time Tracking </a><a href="#features"
                                        class="inline-flex items-center justify-center px-6 py-3 text-gray-700 bg-gray-100 font-semibold rounded-xl hover:bg-gray-200 transition-all duration-300"
                                        data-v-cfd309ff=""><i class="fa-solid fa-info-circle mr-2"
                                            data-v-cfd309ff=""></i> Learn More </a></div>
                            </div>
                            <div data-aos="fade-left" data-v-cfd309ff="" class="aos-init aos-animate">
                                <div class="relative" data-v-cfd309ff="">
                                    <div class="rounded-2xl bg-white p-4 shadow-2xl ring-1 ring-gray-900/10 transform hover:scale-[1.02] transition-all duration-500"
                                        data-v-cfd309ff=""><img src="/images/time-log.jpg"
                                            alt="ProTask Time Tracking Interface - Advanced Time Management"
                                            class="rounded-xl w-full" data-v-cfd309ff=""></div>
                                    <div class="absolute -top-4 -left-4 bg-white rounded-xl p-4 shadow-lg ring-1 ring-gray-900/10 animate-float"
                                        data-v-cfd309ff="">
                                        <div class="text-center" data-v-cfd309ff="">
                                            <div class="text-2xl font-bold text-green-600" data-v-cfd309ff="">2h 34m
                                            </div>
                                            <div class="text-xs text-gray-500" data-v-cfd309ff="">Today's Time</div>
                                        </div>
                                    </div>
                                    <div class="absolute -bottom-4 -right-4 bg-white rounded-xl p-4 shadow-lg ring-1 ring-gray-900/10 animate-float animation-delay-2000"
                                        data-v-cfd309ff="">
                                        <div class="text-center" data-v-cfd309ff="">
                                            <div class="text-2xl font-bold text-blue-600" data-v-cfd309ff="">12
                                            </div>
                                            <div class="text-xs text-gray-500" data-v-cfd309ff="">Active Timers
                                            </div>
                                        </div>
                                    </div>
                                    <div class="absolute top-1/2 -right-8 bg-white rounded-xl p-4 shadow-lg ring-1 ring-gray-900/10 animate-float animation-delay-4000"
                                        data-v-cfd309ff="">
                                        <div class="text-center" data-v-cfd309ff="">
                                            <div class="text-2xl font-bold text-purple-600" data-v-cfd309ff="">98%
                                            </div>
                                            <div class="text-xs text-gray-500" data-v-cfd309ff="">Accuracy</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-20 grid md:grid-cols-2 lg:grid-cols-4 gap-8" data-v-cfd309ff="">
                            <div class="text-center group aos-init" data-aos="fade-up" data-v-cfd309ff="">
                                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300"
                                    data-v-cfd309ff=""><i class="fa-solid fa-stopwatch text-2xl" data-v-cfd309ff=""></i>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2" data-v-cfd309ff="">Real-time
                                    Tracking</h3>
                                <p class="text-gray-600 text-sm" data-v-cfd309ff="">Live timer updates with precise
                                    second-by-second tracking for accurate time measurement.</p>
                            </div>
                            <div class="text-center group aos-init" data-aos="fade-up" data-aos-delay="100"
                                data-v-cfd309ff="">
                                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300"
                                    data-v-cfd309ff=""><i class="fa-solid fa-users text-2xl" data-v-cfd309ff=""></i>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2" data-v-cfd309ff="">Team
                                    Tracking</h3>
                                <p class="text-gray-600 text-sm" data-v-cfd309ff="">Track time for multiple team
                                    members with individual and team-wide productivity insights.</p>
                            </div>
                            <div class="text-center group aos-init" data-aos="fade-up" data-aos-delay="200"
                                data-v-cfd309ff="">
                                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300"
                                    data-v-cfd309ff=""><i class="fa-solid fa-chart-line text-2xl"
                                        data-v-cfd309ff=""></i></div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2" data-v-cfd309ff="">Productivity
                                    Analytics</h3>
                                <p class="text-gray-600 text-sm" data-v-cfd309ff="">Detailed analytics and reports
                                    to identify productivity patterns and optimization opportunities.</p>
                            </div>
                            <div class="text-center group aos-init" data-aos="fade-up" data-aos-delay="300"
                                data-v-cfd309ff="">
                                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300"
                                    data-v-cfd309ff=""><i class="fa-solid fa-file-export text-2xl"
                                        data-v-cfd309ff=""></i></div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2" data-v-cfd309ff="">Export &amp;
                                    Billing</h3>
                                <p class="text-gray-600 text-sm" data-v-cfd309ff="">Export time data for client
                                    billing, project reporting, and integration with accounting systems.</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section data-v-0db274ed="" id="team-collaboration"
                    class="bg-gradient-to-br from-slate-50 via-white to-purple-50 py-20 md:py-24">
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8" data-v-0db274ed="">
                        <div class="text-center mb-16 aos-init" data-aos="fade-up" data-v-0db274ed="">
                            <div class="inline-flex items-center px-4 py-2 rounded-full bg-purple-100 text-purple-800 text-sm font-semibold mb-4"
                                data-v-0db274ed=""><i class="fa-solid fa-users mr-2" data-v-0db274ed=""></i> Team
                                Collaboration </div>
                            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6"
                                data-v-0db274ed=""> Work Together, <span
                                    class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent"
                                    data-v-0db274ed="">Achieve More</span></h2>
                            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed"
                                data-v-0db274ed=""> ProTask brings your team together with powerful collaboration
                                tools, workspace management, and seamless communication features designed for modern
                                teams. </p>
                        </div>
                        <div class="grid lg:grid-cols-2 gap-16 items-center mb-20" data-v-0db274ed="">
                            <div data-aos="fade-right" data-v-0db274ed="" class="aos-init">
                                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6" data-v-0db274ed="">
                                    Powerful Team Features </h3>
                                <p class="text-lg text-gray-600 mb-8 leading-relaxed" data-v-0db274ed=""> Create
                                    dedicated workspaces, assign roles, and collaborate seamlessly with your team.
                                    ProTask makes team management simple and effective. </p>
                                <div class="space-y-6" data-v-0db274ed="">
                                    <div class="flex items-start space-x-4" data-v-0db274ed="">
                                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center text-white"
                                            data-v-0db274ed=""><i class="fa-solid fa-building text-lg"
                                                data-v-0db274ed=""></i></div>
                                        <div data-v-0db274ed="">
                                            <h4 class="text-lg font-semibold text-gray-900 mb-2" data-v-0db274ed="">
                                                Workspace Management</h4>
                                            <p class="text-gray-600" data-v-0db274ed="">Create separate workspaces
                                                for different teams, clients, or projects. Keep everything organized
                                                and secure.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4" data-v-0db274ed="">
                                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center text-white"
                                            data-v-0db274ed=""><i class="fa-solid fa-user-shield text-lg"
                                                data-v-0db274ed=""></i></div>
                                        <div data-v-0db274ed="">
                                            <h4 class="text-lg font-semibold text-gray-900 mb-2" data-v-0db274ed="">
                                                User Roles &amp; Permissions</h4>
                                            <p class="text-gray-600" data-v-0db274ed="">Assign different roles to
                                                team members with appropriate permissions. Control access and
                                                maintain security.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4" data-v-0db274ed="">
                                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center text-white"
                                            data-v-0db274ed=""><i class="fa-solid fa-bell text-lg"
                                                data-v-0db274ed=""></i></div>
                                        <div data-v-0db274ed="">
                                            <h4 class="text-lg font-semibold text-gray-900 mb-2" data-v-0db274ed="">
                                                Smart Notifications</h4>
                                            <p class="text-gray-600" data-v-0db274ed="">Real-time notifications via
                                                email and Slack integration. Stay updated on project changes and
                                                team activities.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4" data-v-0db274ed="">
                                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center text-white"
                                            data-v-0db274ed=""><i class="fa-solid fa-comments text-lg"
                                                data-v-0db274ed=""></i></div>
                                        <div data-v-0db274ed="">
                                            <h4 class="text-lg font-semibold text-gray-900 mb-2" data-v-0db274ed="">
                                                Task Comments &amp; Discussions</h4>
                                            <p class="text-gray-600" data-v-0db274ed="">Collaborate directly on
                                                tasks with comments, mentions, and threaded discussions for better
                                                communication.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-aos="fade-left" data-v-0db274ed="" class="aos-init">
                                <div class="relative" data-v-0db274ed="">
                                    <div class="rounded-2xl bg-white p-4 shadow-2xl ring-1 ring-gray-900/10 transform hover:scale-[1.02] transition-all duration-500"
                                        data-v-0db274ed=""><img src="/images/right-side-menu.jpg"
                                            alt="ProTask Team Collaboration - Workspace Management"
                                            class="rounded-xl w-full" data-v-0db274ed=""></div>
                                    <div class="absolute -top-4 -left-4 bg-white rounded-xl p-4 shadow-lg ring-1 ring-gray-900/10 animate-float"
                                        data-v-0db274ed="">
                                        <div class="flex items-center space-x-3" data-v-0db274ed="">
                                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center"
                                                data-v-0db274ed=""><i class="fa-solid fa-users text-purple-600 text-sm"
                                                    data-v-0db274ed=""></i></div>
                                            <div data-v-0db274ed="">
                                                <div class="text-sm font-semibold text-gray-900" data-v-0db274ed="">
                                                    Team Members</div>
                                                <div class="text-xs text-gray-500" data-v-0db274ed="">12 active
                                                    users</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="absolute -bottom-4 -right-4 bg-white rounded-xl p-4 shadow-lg ring-1 ring-gray-900/10 animate-float animation-delay-2000"
                                        data-v-0db274ed="">
                                        <div class="flex items-center space-x-3" data-v-0db274ed="">
                                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center"
                                                data-v-0db274ed=""><i class="fa-solid fa-bell text-green-600 text-sm"
                                                    data-v-0db274ed=""></i></div>
                                            <div data-v-0db274ed="">
                                                <div class="text-sm font-semibold text-gray-900" data-v-0db274ed="">
                                                    Notifications</div>
                                                <div class="text-xs text-gray-500" data-v-0db274ed="">Real-time
                                                    updates</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" data-v-0db274ed="">
                            <div class="group text-center p-8 rounded-2xl bg-white shadow-lg ring-1 ring-gray-900/10 hover:shadow-xl transition-all duration-300 aos-init"
                                data-aos="fade-up" data-v-0db274ed="">
                                <div class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300"
                                    data-v-0db274ed=""><i class="fa-solid fa-building text-2xl" data-v-0db274ed=""></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-4" data-v-0db274ed="">Workspace
                                    Management</h3>
                                <p class="text-gray-600 mb-6" data-v-0db274ed="">Create and manage multiple
                                    workspaces for different teams, clients, or projects with complete separation
                                    and security.</p>
                                <div class="rounded-xl overflow-hidden shadow-md" data-v-0db274ed=""><img
                                        src="/images/navigate-workspace.jpg" alt="Workspace Management Interface"
                                        class="w-full h-32 object-cover group-hover:scale-105 transition-transform duration-300"
                                        data-v-0db274ed=""></div>
                            </div>
                            <div class="group text-center p-8 rounded-2xl bg-white shadow-lg ring-1 ring-gray-900/10 hover:shadow-xl transition-all duration-300 aos-init"
                                data-aos="fade-up" data-aos-delay="100" data-v-0db274ed="">
                                <div class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300"
                                    data-v-0db274ed=""><i class="fa-solid fa-folder-open text-2xl"
                                        data-v-0db274ed=""></i></div>
                                <h3 class="text-xl font-bold text-gray-900 mb-4" data-v-0db274ed="">Project
                                    Organization</h3>
                                <p class="text-gray-600 mb-6" data-v-0db274ed="">Organize projects with favorites,
                                    custom backgrounds, and intuitive navigation for easy team access and
                                    management.</p>
                                <div class="rounded-xl overflow-hidden shadow-md" data-v-0db274ed=""><img
                                        src="/images/favorite-projects.jpg" alt="Project Organization Interface"
                                        class="w-full h-32 object-cover group-hover:scale-105 transition-transform duration-300"
                                        data-v-0db274ed=""></div>
                            </div>
                            <div class="group text-center p-8 rounded-2xl bg-white shadow-lg ring-1 ring-gray-900/10 hover:shadow-xl transition-all duration-300 aos-init"
                                data-aos="fade-up" data-aos-delay="200" data-v-0db274ed="">
                                <div class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300"
                                    data-v-0db274ed=""><i class="fa-solid fa-tasks text-2xl" data-v-0db274ed=""></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-4" data-v-0db274ed="">Task Management
                                </h3>
                                <p class="text-gray-600 mb-6" data-v-0db274ed="">Comprehensive task management with
                                    assignees, labels, attachments, due dates, and detailed task information.</p>
                                <div class="rounded-xl overflow-hidden shadow-md" data-v-0db274ed=""><img
                                        src="/images/task-details.jpg" alt="Task Management Interface"
                                        class="w-full h-32 object-cover group-hover:scale-105 transition-transform duration-300"
                                        data-v-0db274ed=""></div>
                            </div>
                        </div>
                        <div class="mt-20 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl p-8 md:p-12 text-center text-white aos-init"
                            data-aos="fade-up" data-v-0db274ed="">
                            <h3 class="text-2xl md:text-3xl font-bold mb-6" data-v-0db274ed="">Built for Teams of
                                All Sizes</h3>
                            <div class="grid md:grid-cols-4 gap-8" data-v-0db274ed="">
                                <div data-v-0db274ed="">
                                    <div class="text-3xl md:text-4xl font-bold mb-2" data-v-0db274ed="">1-1000+
                                    </div>
                                    <div class="text-purple-200" data-v-0db274ed="">Team Members</div>
                                </div>
                                <div data-v-0db274ed="">
                                    <div class="text-3xl md:text-4xl font-bold mb-2" data-v-0db274ed="">Unlimited
                                    </div>
                                    <div class="text-purple-200" data-v-0db274ed="">Workspaces</div>
                                </div>
                                <div data-v-0db274ed="">
                                    <div class="text-3xl md:text-4xl font-bold mb-2" data-v-0db274ed="">Real-time
                                    </div>
                                    <div class="text-purple-200" data-v-0db274ed="">Collaboration</div>
                                </div>
                                <div data-v-0db274ed="">
                                    <div class="text-3xl md:text-4xl font-bold mb-2" data-v-0db274ed="">24/7</div>
                                    <div class="text-purple-200" data-v-0db274ed="">Support</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="testimonials" class="bg-white py-20 md:py-24">
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-16 aos-init" data-aos="fade-up">
                            <div
                                class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-100 text-indigo-800 text-sm font-semibold mb-4">
                                <i class="fa-solid fa-quote-left mr-2"></i> Testimonials
                            </div>
                            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6"> What Teams
                                Are Saying About <span
                                    class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">ProTask</span>
                            </h2>
                            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed"> Join
                                thousands of teams worldwide who have transformed their productivity with ProTask.
                                Here's what our users have to say about their experience. </p>
                        </div>
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                            <div class="group bg-white rounded-2xl p-8 shadow-lg ring-1 ring-gray-900/10 hover:shadow-xl transition-all duration-300 aos-init"
                                data-aos="fade-up">
                                <div class="flex items-center mb-6">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        S </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-semibold text-gray-900">Sarah Johnson</h4>
                                        <p class="text-gray-600">Project Manager, TechCorp</p>
                                    </div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <div class="flex text-yellow-400"><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                                </div>
                                <blockquote class="text-gray-700 leading-relaxed"> "ProTask has completely
                                    transformed how our team manages projects. The visual board view makes it so
                                    easy to track progress, and the time tracking feature has been a game-changer
                                    for our billing accuracy." </blockquote>
                            </div>
                            <div class="group bg-white rounded-2xl p-8 shadow-lg ring-1 ring-gray-900/10 hover:shadow-xl transition-all duration-300 aos-init"
                                data-aos="fade-up" data-aos-delay="100">
                                <div class="flex items-center mb-6">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-green-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        M </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-semibold text-gray-900">Michael Chen</h4>
                                        <p class="text-gray-600">CEO, StartupXYZ</p>
                                    </div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <div class="flex text-yellow-400"><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                                </div>
                                <blockquote class="text-gray-700 leading-relaxed"> "The workspace management feature
                                    is perfect for our growing team. We can separate different client projects while
                                    keeping everything organized. The mobile responsiveness is excellent too."
                                </blockquote>
                            </div>
                            <div class="group bg-white rounded-2xl p-8 shadow-lg ring-1 ring-gray-900/10 hover:shadow-xl transition-all duration-300 aos-init"
                                data-aos="fade-up" data-aos-delay="200">
                                <div class="flex items-center mb-6">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        E </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-semibold text-gray-900">Emily Rodriguez</h4>
                                        <p class="text-gray-600">Design Lead, CreativeStudio</p>
                                    </div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <div class="flex text-yellow-400"><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                                </div>
                                <blockquote class="text-gray-700 leading-relaxed"> "The timeline view and calendar
                                    integration have made project planning so much easier. Our team can see
                                    deadlines at a glance and the custom backgrounds make each project feel unique."
                                </blockquote>
                            </div>
                            <div class="group bg-white rounded-2xl p-8 shadow-lg ring-1 ring-gray-900/10 hover:shadow-xl transition-all duration-300 aos-init"
                                data-aos="fade-up" data-aos-delay="300">
                                <div class="flex items-center mb-6">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        D </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-semibold text-gray-900">David Thompson</h4>
                                        <p class="text-gray-600">CTO, Enterprise Solutions</p>
                                    </div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <div class="flex text-yellow-400"><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                                </div>
                                <blockquote class="text-gray-700 leading-relaxed"> "The analytics and reporting
                                    features give us incredible insights into team productivity. We've been able to
                                    optimize our workflows and improve delivery times significantly." </blockquote>
                            </div>
                            <div class="group bg-white rounded-2xl p-8 shadow-lg ring-1 ring-gray-900/10 hover:shadow-xl transition-all duration-300 aos-init"
                                data-aos="fade-up" data-aos-delay="400">
                                <div class="flex items-center mb-6">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        L </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-semibold text-gray-900">Lisa Wang</h4>
                                        <p class="text-gray-600">Operations Manager, GlobalCorp</p>
                                    </div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <div class="flex text-yellow-400"><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                                </div>
                                <blockquote class="text-gray-700 leading-relaxed"> "The notification system and team
                                    collaboration features have improved our communication dramatically. Everyone
                                    stays in the loop and nothing falls through the cracks anymore." </blockquote>
                            </div>
                            <div class="group bg-white rounded-2xl p-8 shadow-lg ring-1 ring-gray-900/10 hover:shadow-xl transition-all duration-300 aos-init"
                                data-aos="fade-up" data-aos-delay="500">
                                <div class="flex items-center mb-6">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        A </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-semibold text-gray-900">Alex Kumar</h4>
                                        <p class="text-gray-600">Freelance Developer</p>
                                    </div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <div class="flex text-yellow-400"><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                                </div>
                                <blockquote class="text-gray-700 leading-relaxed"> "As a freelancer, the time
                                    tracking and client reporting features are invaluable. I can easily track time
                                    across multiple projects and generate professional reports for my clients."
                                </blockquote>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 md:p-12 text-center text-white aos-init"
                            data-aos="fade-up">
                            <h3 class="text-2xl md:text-3xl font-bold mb-8">Join Thousands of Satisfied Teams</h3>
                            <div class="grid md:grid-cols-4 gap-8">
                                <div>
                                    <div class="text-3xl md:text-4xl font-bold mb-2">10,000+</div>
                                    <div class="text-indigo-200">Active Users</div>
                                </div>
                                <div>
                                    <div class="text-3xl md:text-4xl font-bold mb-2">50+</div>
                                    <div class="text-indigo-200">Countries</div>
                                </div>
                                <div>
                                    <div class="text-3xl md:text-4xl font-bold mb-2">99.9%</div>
                                    <div class="text-indigo-200">Uptime</div>
                                </div>
                                <div>
                                    <div class="text-3xl md:text-4xl font-bold mb-2">4.9/5</div>
                                    <div class="text-indigo-200">User Rating</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute inset-0"
                            style="background-image:url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.1%22%3E%3Ccircle%20cx%3D%2230%22%20cy%3D%2230%22%20r%3D%224%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
                        </div>
                    </div>
                    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-24 text-center">
                        <div class="max-w-4xl mx-auto aos-init" data-aos="fade-up">
                            <div
                                class="inline-flex items-center px-4 py-2 rounded-full bg-white/20 backdrop-blur-sm text-white text-sm font-semibold mb-6">
                                <i class="fa-solid fa-rocket mr-2"></i> Ready to Transform Your Team's Productivity?
                            </div>
                            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6"> Start Your
                                Journey with <span
                                    class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                                    ProTask Today </span></h2>
                            <p class="text-lg md:text-xl text-indigo-100 max-w-2xl mx-auto mb-10 leading-relaxed">
                                Join thousands of teams worldwide who have already transformed their project
                                management and time tracking with ProTask. Experience the difference for yourself.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-12"><a
                                    href="https://pro-task.w3bd.com/" target="_blank"
                                    class="group inline-flex items-center px-8 py-4 text-lg font-semibold text-indigo-600 bg-white rounded-xl hover:bg-gray-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105"><i
                                        class="fa-solid fa-play mr-3"></i> Try Live Demo <i
                                        class="fa-solid fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform"></i></a><a
                                    href="https://codecanyon.net/item/protask-a-teamwork-project-management-tool-including-time-tracking/49556761"
                                    target="_blank"
                                    class="group inline-flex items-center px-8 py-4 text-lg font-semibold text-white bg-white/20 backdrop-blur-sm border-2 border-white/30 rounded-xl hover:bg-white/30 hover:border-white/50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105"><i
                                        class="fa-solid fa-shopping-cart mr-3"></i> Buy Now - $49 <i
                                        class="fa-solid fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform"></i></a>
                            </div>
                            <div class="flex flex-col sm:flex-row justify-center items-center gap-8 text-indigo-200">
                                <div class="flex items-center"><i class="fa-solid fa-shield-check mr-2"></i><span
                                        class="text-sm">30-Day Money Back Guarantee</span></div>
                                <div class="flex items-center"><i class="fa-solid fa-download mr-2"></i><span
                                        class="text-sm">Instant Download</span></div>
                                <div class="flex items-center"><i class="fa-solid fa-headset mr-2"></i><span
                                        class="text-sm">24/7 Support</span></div>
                            </div>
                        </div>
                        <div class="mt-16 grid md:grid-cols-3 gap-8 max-w-4xl mx-auto aos-init" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="text-center">
                                <div
                                    class="w-16 h-16 mx-auto mb-4 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center text-white">
                                    <i class="fa-solid fa-clock text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-white mb-2">Advanced Time Tracking</h3>
                                <p class="text-indigo-200 text-sm">Built-in timers, manual entries, and
                                    comprehensive reporting for accurate time management.</p>
                            </div>
                            <div class="text-center">
                                <div
                                    class="w-16 h-16 mx-auto mb-4 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center text-white">
                                    <i class="fa-solid fa-users text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-white mb-2">Team Collaboration</h3>
                                <p class="text-indigo-200 text-sm">Workspace management, user roles, and real-time
                                    notifications for seamless teamwork.</p>
                            </div>
                            <div class="text-center">
                                <div
                                    class="w-16 h-16 mx-auto mb-4 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center text-white">
                                    <i class="fa-solid fa-chart-line text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-white mb-2">Analytics &amp; Reports</h3>
                                <p class="text-indigo-200 text-sm">Comprehensive project analytics and productivity
                                    insights to optimize your workflow.</p>
                            </div>
                        </div>
                        <div class="mt-16 p-8 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20 aos-init"
                            data-aos="fade-up" data-aos-delay="400">
                            <h3 class="text-2xl font-bold text-white mb-4">Don't Wait - Start Today!</h3>
                            <p class="text-indigo-200 mb-6">Join the thousands of teams who have already transformed
                                their productivity with ProTask.</p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center"><a
                                    href="https://pro-task.w3bd.com/" target="_blank"
                                    class="inline-flex items-center justify-center px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg hover:bg-gray-50 transition-all duration-300"><i
                                        class="fa-solid fa-external-link-alt mr-2"></i> View Live Demo </a><a
                                    href="https://codecanyon.net/item/protask-a-teamwork-project-management-tool-including-time-tracking/49556761"
                                    target="_blank"
                                    class="inline-flex items-center justify-center px-6 py-3 bg-indigo-500 text-white font-semibold rounded-lg hover:bg-indigo-400 transition-all duration-300"><i
                                        class="fa-solid fa-shopping-cart mr-2"></i> Purchase Now </a></div>
                        </div>
                    </div>
                </section>
            </main>
            <footer class="bg-slate-900 text-white">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                        <div class="lg:col-span-2">
                            <div class="flex items-center mb-6"><img src="/images/logo.svg" class="h-8 w-auto"
                                    alt="ProTask"><span
                                    class="ml-2 text-2xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">
                                    ProTask </span></div>
                            <p class="text-slate-300 mb-6 max-w-md leading-relaxed"> The comprehensive work
                                management platform that combines visual project management with advanced time
                                tracking for teams of all sizes. Transform your productivity today. </p>
                            <div class="flex space-x-4"><a href="https://pro-task.w3bd.com/" target="_blank"
                                    class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors duration-200 group"><i
                                        class="fa-solid fa-external-link-alt group-hover:scale-110 transition-transform"></i></a><a
                                    href="https://codecanyon.net/item/protask-a-teamwork-project-management-tool-including-time-tracking/49556761"
                                    target="_blank"
                                    class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors duration-200 group"><i
                                        class="fa-solid fa-shopping-cart group-hover:scale-110 transition-transform"></i></a><a
                                    href="#"
                                    class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors duration-200 group"><i
                                        class="fa-brands fa-twitter group-hover:scale-110 transition-transform"></i></a><a
                                    href="#"
                                    class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors duration-200 group"><i
                                        class="fa-brands fa-linkedin group-hover:scale-110 transition-transform"></i></a>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-6">Product</h3>
                            <ul class="space-y-3">
                                <li><a href="#features"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">Features</a>
                                </li>
                                <li><a href="#project-views"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">Project
                                        Views</a></li>
                                <li><a href="#time-tracking"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">Time
                                        Tracking</a></li>
                                <li><a href="#team-collaboration"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">Team
                                        Collaboration</a></li>
                                <li><a href="#testimonials"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">Testimonials</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-6">Support</h3>
                            <ul class="space-y-3">
                                <li><a href="https://pro-task.w3bd.com/" target="_blank"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">Live
                                        Demo</a></li>
                                <li><a href="#"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">Documentation</a>
                                </li>
                                <li><a href="#"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">Help
                                        Center</a></li>
                                <li><a href="#"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">Contact
                                        Support</a></li>
                                <li><a href="#"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">System
                                        Status</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-slate-800/50 rounded-2xl p-8 mb-12">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold mb-4">Why Choose ProTask?</h3>
                            <p class="text-slate-300 max-w-2xl mx-auto"> Join thousands of teams worldwide who trust
                                ProTask for their project management and time tracking needs. </p>
                        </div>
                        <div class="grid md:grid-cols-3 gap-8">
                            <div class="text-center">
                                <div
                                    class="w-12 h-12 mx-auto mb-4 bg-indigo-600 rounded-xl flex items-center justify-center">
                                    <i class="fa-solid fa-clock text-white text-xl"></i>
                                </div>
                                <h4 class="text-lg font-semibold mb-2">Advanced Time Tracking</h4>
                                <p class="text-slate-300 text-sm">Built-in timers, manual entries, and comprehensive
                                    reporting for accurate time management.</p>
                            </div>
                            <div class="text-center">
                                <div
                                    class="w-12 h-12 mx-auto mb-4 bg-purple-600 rounded-xl flex items-center justify-center">
                                    <i class="fa-solid fa-users text-white text-xl"></i>
                                </div>
                                <h4 class="text-lg font-semibold mb-2">Team Collaboration</h4>
                                <p class="text-slate-300 text-sm">Workspace management, user roles, and real-time
                                    notifications for seamless teamwork.</p>
                            </div>
                            <div class="text-center">
                                <div
                                    class="w-12 h-12 mx-auto mb-4 bg-green-600 rounded-xl flex items-center justify-center">
                                    <i class="fa-solid fa-chart-line text-white text-xl"></i>
                                </div>
                                <h4 class="text-lg font-semibold mb-2">Analytics &amp; Reports</h4>
                                <p class="text-slate-300 text-sm">Comprehensive project analytics and productivity
                                    insights to optimize your workflow.</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-slate-800 pt-8">
                        <div class="flex flex-col md:flex-row justify-between items-center">
                            <div class="text-slate-400 text-sm mb-4 md:mb-0"> © 2024 ProTask. All rights reserved. |
                                <a href="#" class="hover:text-white transition-colors duration-200">Privacy
                                    Policy</a> | <a href="#"
                                    class="hover:text-white transition-colors duration-200">Terms of Service</a>
                            </div>
                            <div class="flex items-center space-x-6">
                                <div class="flex items-center text-slate-400 text-sm"><i
                                        class="fa-solid fa-shield-check mr-2 text-green-400"></i> Secure &amp;
                                    Reliable </div>
                                <div class="flex items-center text-slate-400 text-sm"><i
                                        class="fa-solid fa-headset mr-2 text-blue-400"></i> 24/7 Support </div>
                                <div class="flex items-center text-slate-400 text-sm"><i
                                        class="fa-solid fa-download mr-2 text-purple-400"></i> Instant Download
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>