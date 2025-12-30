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
    <link rel="stylesheet" crossorigin href="/resources/css/dashboardPageStyle.css">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css','resources/css/dashboardPageStyle.css', 'resources/js/app.js',
    'resources/js/dashboardPageScript.js'])
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
                                    class="ml-2 bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent font-vandal transform scale-x-110 tracking-wider text-3xl">
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
                                    class="block h-0.5 bg-indigo-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span></a>
                        </nav>
                        <button
                            class="md:hidden p-2 rounded-lg text-gray-600 hover:text-indigo-600 hover:bg-gray-100 transition-colors duration-200"><i
                                class="fa-solid fa-bars text-xl"></i></button>
                    </div><!---->
                </div>
            </header>
            <main>
                <section class="relative bg-gradient-to-br from-slate-50 via-white to-indigo-50 overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden">
                        <div
                            class="absolute -top-40 -right-40 w-80 h-80 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                        </div>
                        <div
                            class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
                        </div>
                        <div
                            class="absolute top-40 left-1/2 w-80 h-80 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000">
                        </div>
                    </div>
                    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-28 md:pb-36">
                        <div class="text-center max-w-5xl mx-auto aos-init aos-animate" data-aos="fade-up">
                            <div
                                class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-100 text-indigo-800 text-sm font-semibold mb-6">
                                <i class="fa-solid fa-medal mr-2"></i> Master Every Project. Empower Every Team
                            </div>
                            <h1
                                class="text-4xl md:text-6xl lg:text-7xl font-extrabold tracking-tight text-slate-900 mb-6">
                                Agile Service Management &amp; <span
                                    class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                                    Workflow Automation </span><br> </h1>
                            <p
                                class="text-lg md:text-xl lg:text-2xl text-slate-600 max-w-3xl mx-auto mb-8 leading-relaxed">
                                Streamline your service delivery with COVSM. Manage tickets, track sprint velocity, and
                                automate repetitive tasks in one unified workspace.</p>
                            <div class="flex flex-wrap justify-center gap-6 mb-10 text-sm md:text-base">
                                <div class="flex items-center text-slate-600"><i
                                        class="fa-solid fa-chart-diagram"></i><i
                                        class="fa-solid fa-check-square text-green-500 mr-2"></i><span>Crystal-Clear
                                        Workflows</span></div>
                                <div class="flex items-center text-slate-600"><i
                                        class="fa-solid fa-check-square text-green-500 mr-2"></i><span>Precision Time
                                        Logs</span></div>
                                <div class="flex items-center text-slate-600"><i
                                        class="fa-solid fa-check-square text-green-500 mr-2"></i><span>Unified Team
                                        Chat</span>
                                </div>
                                <div class="flex items-center text-slate-600"><i
                                        class="fa-solid fa-check-square text-green-500 mr-2"></i><span>Data-Driven
                                        Decisions</span>
                                </div>
                            </div>

                            <div class="text-center">
                                <p class="text-sm text-slate-500 mb-4">The preferred choice for 398+ agile teams
                                    worldwide
                                </p>
                                <div class="flex justify-center items-center space-x-8 opacity-60">
                                    <div class="text-2xl font-bold text-slate-400">1</div>
                                    <div class="text-2xl font-bold text-slate-400">Platform</div>
                                    <div class="text-2xl font-bold text-slate-400">398+</div>
                                    <div class="text-2xl font-bold text-slate-400">Teams</div>
                                    <div class="text-2xl font-bold text-slate-400">5+</div>
                                    <div class="text-2xl font-bold text-slate-400">Nations</div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-16 max-w-6xl mx-auto aos-init aos-animate" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="relative">
                                <div
                                    class="rounded-2xl bg-white p-3 shadow-2xl ring-1 ring-gray-900/10 transform hover:scale-[1.02] transition-all duration-500">
                                    <img src="/images/Bannner.png"
                                        alt="Covsm Dashboard - Visual Project Management Platform"
                                        class="rounded-xl w-full">
                                </div>
                                <div
                                    class="absolute -top-4 -left-4 bg-white rounded-xl p-4 shadow-lg ring-1 ring-gray-900/10 animate-float">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                            <i class="fa-solid fa-clock text-green-600"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-slate-900">
                                                Time Tracking</div>
                                            <div class="text-xs text-slate-500">Real-time
                                                monitoring</div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="absolute -bottom-4 -right-4 bg-white rounded-xl p-4 shadow-lg ring-1 ring-gray-900/10 animate-float animation-delay-2000">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <i class="fa-solid fa-users text-blue-600"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-slate-900">
                                                Team Collaboration</div>
                                            <div class="text-xs text-slate-500">Seamless teamwork
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="absolute top-1/2 -right-8 bg-white rounded-xl p-4 shadow-lg ring-1 ring-gray-900/10 animate-float animation-delay-4000">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <i class="fa-solid fa-chart-line text-purple-600"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-slate-900">
                                                Analytics</div>
                                            <div class="text-xs text-slate-500">Data insights
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
                                <i class="fa-solid fa-star mr-2"></i> Core Services
                            </div>
                            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6"> All the Tools
                                Your Team Needs to <span
                                    class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Plan,
                                    Track, and Deliver</span>
                            </h2>
                            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed"> Covsm
                                combines flexible project workflows, precise time tracking, and real-time collaboration
                                in one powerful platform designed to help teams stay aligned and perform at their best.
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
                                            <h3 class="text-xl font-bold text-gray-900 mb-2">Dynamic Boards
                                            </h3>
                                            <p class="text-gray-600 mb-3">Go beyond static Kanban boards. Our dynamic
                                                boards adapt in real time based on workflow rules, priorities, and
                                                service conditions, giving teams a clear, always-up-to-date view of work
                                                across projects, services, and departments.</p>
                                            <div class="flex flex-wrap gap-2"><span
                                                    class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm font-medium">Flow
                                                    Board</span><span
                                                    class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-medium">Delivery
                                                    Map</span><span
                                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">Schedule
                                                    View</span>
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
                                            <h3 class="text-xl font-bold text-gray-900 mb-2">SLA & Service-Level
                                                Management
                                            </h3>
                                            <p class="text-gray-600 mb-3">Never miss a deadline again. Built-in SLA
                                                tracking monitors response and resolution times, predicts breaches, and
                                                triggers automatic escalations—helping you deliver consistent, reliable
                                                service at scale.</p>
                                            <div class="flex flex-wrap gap-2">
                                                <span
                                                    class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">Effort
                                                    Records</span>
                                                <span
                                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">Instant
                                                    Tracker</span>
                                                <span
                                                    class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-medium">Service
                                                    Insights</span>
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
                                            <h3 class="text-xl font-bold text-gray-900 mb-2">Role-Based Collaboration
                                            </h3>
                                            <p class="text-gray-600 mb-3">Collaborate securely across teams and
                                                stakeholders. Granular role-based access, approvals, and audit trails
                                                ensure the right level of visibility and control—whether you’re working
                                                with internal teams, clients, or partners.</p>
                                            <div class="flex flex-wrap gap-2"><span
                                                    class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-medium">Team
                                                    Spaces</span><span
                                                    class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm font-medium">Smart
                                                    Alerts</span><span
                                                    class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm font-medium">Access
                                                    Profiles</span></div>
                                        </div>
                                    </div>
                                    <div
                                        class="group flex items-start p-6 rounded-2xl hover:bg-gradient-to-r hover:from-orange-50 hover:to-red-50 transition-all duration-300">
                                        <div
                                            class="flex-shrink-0 w-14 h-14 flex items-center justify-center rounded-xl bg-gradient-to-br from-orange-500 to-red-600 text-white group-hover:scale-110 transition-transform duration-300">
                                            <i class="fa-solid fa-palette text-xl"></i>
                                        </div>
                                        <div class="ml-6">
                                            <h3 class="text-xl font-bold text-gray-900 mb-2">Fully Customizable
                                                Workflows</h3>
                                            <p class="text-gray-600 mb-3">Every organization works differently.
                                                Customize workflows to match your exact processes—define stages, rules,
                                                approvals, and automation logic without writing code, and evolve them as
                                                your business grows.</p>
                                            <div class="flex flex-wrap gap-2"><span
                                                    class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm font-medium">Process
                                                    Stages</span><span
                                                    class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-medium">Validation
                                                    Paths</span><span
                                                    class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm font-medium">Action
                                                    Rules</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-aos="fade-left" class="aos-init aos-animate">
                                <div class="relative">
                                    <div
                                        class="rounded-2xl bg-white p-4 shadow-2xl ring-1 ring-gray-900/10 transform hover:scale-[1.02] transition-all duration-500">
                                        <img src="/images/board_cut_out.png"
                                            alt="Covsm Board View - Multiple Project Management Features"
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
                                <h3 class="text-xl font-bold text-gray-900 mb-4">Custom Rules & Naming</h3>
                                <p class="text-gray-600 mb-4">Align the system with your internal language. Rename
                                    statuses, define custom rules, and adapt terminology so teams work in a familiar
                                    environment that reflects your real processes.</p>
                                <div class="flex justify-center"><img src="/images/role_assigning.gif"
                                        alt="Analytics Dashboard" class="rounded-lg shadow-md w-full max-w-xs">
                                </div>
                            </div>
                            <div class="group text-center p-8 rounded-2xl bg-gradient-to-br from-slate-50 to-gray-100 hover:from-green-50 hover:to-blue-50 transition-all duration-300 hover:shadow-lg aos-init aos-animate"
                                data-aos="fade-up" data-aos-delay="100">
                                <div
                                    class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-green-500 to-blue-600 rounded-2xl flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300">
                                    <i class="fa-solid fa-mobile-screen text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-4">Work Anywhere, Without Compromise</h3>
                                <p class="text-gray-600 mb-4">Whether you’re at your desk or on the move, Covsm delivers
                                    a fully optimized experience across all screen sizes-so productivity never depends
                                    on the device you use.</p>
                                <div class="flex justify-center"><img src="/images/responsive_desing.png"
                                        alt="Mobile Responsive Design" class="rounded-lg shadow-md w-full max-w-xs">
                                </div>
                            </div>
                            <div class="group text-center p-8 rounded-2xl bg-gradient-to-br from-slate-50 to-gray-100 hover:from-purple-50 hover:to-pink-50 transition-all duration-300 hover:shadow-lg aos-init aos-animate"
                                data-aos="fade-up" data-aos-delay="200">
                                <div
                                    class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300">
                                    <i class="fa-solid fa-download text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-4">Connect, Share, and Extend Your Data
                                </h3>
                                <p class="text-gray-600 mb-4">Easily move your data where it’s needed. Covsm lets you
                                    export records in flexible formats and connect with external tools, ensuring smooth
                                    data flow across your existing systems and workflows.</p>
                                <div class="flex justify-center"><img src="/images/export_data.png"
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
                                <i class="fa-solid fa-eye mr-2"></i> Select Your View
                            </div>
                            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6"> Your Work,
                                Shown<span
                                    class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Your
                                    Way</span></h2>
                            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">Covsm gives
                                you flexible ways to view and manage your projects. Instantly switch between layouts to
                                match your team’s workflow, preferences, and level of detail—without losing context.
                            </p>
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
                                                <h3 class="text-2xl font-bold text-gray-900">Workflow Board</h3>
                                                <p class="text-gray-600">Visual task flow management</p>
                                            </div>
                                        </div>
                                        <div
                                            class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm font-medium">
                                            Popular Choice </div>
                                    </div>
                                    <p class="text-gray-600 mb-6 leading-relaxed"> Structure work into flexible stages
                                        and move tasks effortlessly using drag-and-drop. Ideal for agile teams that want
                                        a clear, visual understanding of progress and workflow movement.</p>
                                    <div class="rounded-xl overflow-hidden shadow-lg"><img src="/images/board-view.jpg"
                                            alt="Covsm Board View - Kanban Task Management"
                                            class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="mt-6 flex flex-wrap gap-2"><span
                                            class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm">Drag
                                            &amp; Interaction</span><span
                                            class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm">Flexible
                                            Stages
                                        </span><span
                                            class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Progress
                                            Visibility</span></div>
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
                                                <h3 class="text-2xl font-bold text-gray-900">Task Ledger</h3>
                                                <p class="text-gray-600">Structured task overview</p>
                                            </div>
                                        </div>
                                        <div
                                            class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">
                                            Information-Rich </div>
                                    </div>
                                    <p class="text-gray-600 mb-6 leading-relaxed"> View all tasks in a detailed,
                                        organized list with advanced controls. Perfect for managers and teams who rely
                                        on precise task data, filters, and sortable views for decision-making. </p>
                                    <div class="rounded-xl overflow-hidden shadow-lg"><img src="/images/list-view.jpg"
                                            alt="Covsm List View - Detailed Task Management"
                                            class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="mt-6 flex flex-wrap gap-2"><span
                                            class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Expanded
                                            Details</span><span
                                            class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">Advanced
                                            Filters</span><span
                                            class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm">Smart
                                            Sorting</span>
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
                                                <p class="text-gray-600">Planning & scheduling view</p>
                                            </div>
                                        </div>
                                        <div
                                            class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-medium">
                                            Time-Centric</div>
                                    </div>
                                    <p class="text-gray-600 mb-6 leading-relaxed"> Plan and manage work visually across
                                        daily, weekly, and monthly layouts. This view helps teams stay aligned on
                                        deadlines, meetings, and key milestones while keeping schedules easy to
                                        understand at a glance. </p>
                                    <div class="rounded-xl overflow-hidden shadow-lg"><img
                                            src="/images/calendar-view.jpg"
                                            alt="Covsm Calendar View - Project Timeline Management"
                                            class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="mt-6 flex flex-wrap gap-2"><span
                                            class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm">Time
                                            Mapping</span><span
                                            class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm">Due Date
                                            Tracking</span><span
                                            class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm">Schedule
                                            Planning</span>
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
                                                <p class="text-gray-600">Sequential work overview</p>
                                            </div>
                                        </div>
                                        <div
                                            class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm font-medium">
                                            Recently Added </div>
                                    </div>
                                    <p class="text-gray-600 mb-6 leading-relaxed"> SFollow tasks in a clear,
                                        time-ordered sequence to understand how work progresses. Ideal for identifying
                                        task dependencies, tracking execution flow, and visualizing how projects evolve
                                        over time. </p>
                                    <div class="rounded-xl overflow-hidden shadow-lg"><img
                                            src="/images/timeline-view.jpg"
                                            alt="Covsm Timeline View - Chronological Task Management"
                                            class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="mt-6 flex flex-wrap gap-2"><span
                                            class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm">Sequential
                                            View</span><span
                                            class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">Task
                                            Dependencies</span><span
                                            class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm">Workflow
                                            Continuity</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <section id="time-tracking" class="bg-white py-20 md:py-24">
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="grid lg:grid-cols-2 gap-16 items-center">
                            <div data-aos="fade-right" class="aos-init aos-animate">
                                <div
                                    class="inline-flex items-center px-4 py-2 rounded-full bg-green-100 text-green-800 text-sm font-semibold mb-6">
                                    <i class="fa-solid fa-clock mr-2"></i>
                                    Master Time, Not Just Tasks </div>
                                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6"> Track Time
                                    with <span
                                        class="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">Precision</span>
                                </h2>
                                <p class="text-lg md:text-xl text-gray-600 mb-8 leading-relaxed">
                                    Track work with clarity and confidence. COVSM’s built-in time management tools help
                                    teams capture time effortlessly, understand productivity patterns, and make
                                    data-driven decisions—without disrupting daily workflows. </p>
                                <div class="space-y-6 mb-8">
                                    <div class="flex items-start space-x-4">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <i class="fa-solid fa-clock text-red-600 text-sm"></i></div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 mb-1">
                                                Instant Timer</h3>
                                            <p class="text-gray-600">Start, pause, or switch timers in one click.
                                                Capture time as work happens, ensuring accurate tracking without
                                                breaking focus.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <i class="fa-solid fa-pen text-blue-600 text-sm"></i></div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 mb-1">
                                                Flexible Time Entries</h3>
                                            <p class="text-gray-600">Log time manually when needed—perfect for offline
                                                work, quick updates, or adjusting past entries while maintaining
                                                complete accuracy.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <i class="fa-solid fa-shuffle text-purple-600 text-sm"></i></div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 mb-1">
                                                Detailed Analytics</h3>
                                            <p class="text-gray-600">Turn time data into meaningful insights. Analyze
                                                trends by user, project, or task to identify bottlenecks, improve
                                                efficiency, and plan smarter.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                                            <i class="fa-solid fa-file-export text-orange-600 text-sm"></i></div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 mb-1">
                                                Export &amp; Report</h3>
                                            <p class="text-gray-600">Generate detailed time reports and export data in
                                                multiple formats for billing, audits, or internal reviews—ready when you
                                                need them.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-4"><a href="#" target="_blank"
                                        class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white font-semibold rounded-xl hover:from-green-700 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105"><i
                                            class="fa-solid fa-play mr-2"></i>
                                        Contact Us </a></div>
                            </div>
                            <div data-aos="fade-left" class="aos-init aos-animate">
                                <div class="relative">
                                    <div
                                        class="rounded-2xl bg-white p-4 shadow-2xl ring-1 ring-gray-900/10 transform hover:scale-[1.02] transition-all duration-500">
                                        <img src="/images/time_management.png"
                                            alt="Covsm Time Tracking Interface - Advanced Time Management"
                                            class="rounded-xl w-full"></div>
                                    <div
                                        class="absolute -top-4 -left-4 bg-white rounded-xl p-4 shadow-lg ring-1 ring-gray-900/10 animate-float">
                                        <div class="text-center">
                                            <div class="text-2xl font-bold text-green-600">2h 34m
                                            </div>
                                            <div class="text-xs text-gray-500">Today's Time</div>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute -bottom-4 -right-4 bg-white rounded-xl p-4 shadow-lg ring-1 ring-gray-900/10 animate-float animation-delay-2000">
                                        <div class="text-center">
                                            <div class="text-2xl font-bold text-blue-600">12
                                            </div>
                                            <div class="text-xs text-gray-500">Active Timers
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute top-1/2 -right-8 bg-white rounded-xl p-4 shadow-lg ring-1 ring-gray-900/10 animate-float animation-delay-4000">
                                        <div class="text-center">
                                            <div class="text-2xl font-bold text-purple-600">98%
                                            </div>
                                            <div class="text-xs text-gray-500">Accuracy</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>


            </main>
            <footer class="bg-slate-900 text-white">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                        <div class="lg:col-span-2">
                            <div class="flex items-center mb-6"><img src="/images/covsm_logo_2.png" class="h-32 w-auto"
                                    alt="Covsm"></div>
                            <p class="text-slate-300 mb-6 max-w-md leading-relaxed"> COVSM empowers agile teams to
                                streamline service delivery. Manage tickets, track velocity, and automate repetitive
                                tasks in one unified workspace to master every project. </p>
                            <div class="flex space-x-4"><a href="{{ config('app.url') }}" target="_blank"
                                    class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors duration-200 group"><i
                                        class="fa-solid fa-external-link-alt group-hover:scale-110 transition-transform"></i></a><a
                                    href="#"
                                    class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors duration-200 group"><i
                                        class="fa-brands fa-x group-hover:scale-110 transition-transform"></i></a><a
                                    href="#"
                                    class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors duration-200 group"><i
                                        class="fa-brands fa-linkedin group-hover:scale-110 transition-transform"></i></a>
                                <a href="#"
                                    class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors duration-200 group"><i
                                        class="fa-brands fa-facebook group-hover:scale-110 transition-transform"></i></a>
                                <a href="#"
                                    class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors duration-200 group"><i
                                        class="fa-brands fa-google group-hover:scale-110 transition-transform"></i></a>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-6">Services</h3>
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
                                <!-- <li><a href="#team-collaboration"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">Team
                                        Collaboration</a></li> -->
                                <!-- <li><a href="#testimonials"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">Testimonials</a>
                                </li> -->
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-6">Support</h3>
                            <ul class="space-y-3">
                                <li><a href="#"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">Manual</a>
                                </li>
                                <li><a href="#"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">FAQ</a>
                                </li>
                                <li><a href="#"
                                        class="text-slate-300 hover:text-white transition-colors duration-200">Contact
                                        Us</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="border-t border-slate-800 pt-8">
                        <div class="flex flex-col md:flex-row justify-between items-center">
                            <div class="text-slate-400 text-sm mb-4 md:mb-0"> © 2025 Covsm. All rights reserved. |
                                <a href="#" class="hover:text-white transition-colors duration-200">Terms of Conditions
                                </a> | <a href="#" class="hover:text-white transition-colors duration-200">Our Privacy
                                    Policy</a>
                            </div>
                            <div class="flex items-center space-x-6">
                                <div class="flex items-center text-slate-400 text-sm"><i
                                        class="fa-solid fa-shield-check mr-2 text-green-400"></i> Advance Security
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