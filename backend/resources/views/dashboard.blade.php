<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogSphere Admin - Modern Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* CSS Variables for Dynamic Theme Switching */
        :root {
            /* DARK MODE */
            --bg-primary: #0f172a; /* Slate-900 */
            --bg-secondary: #1e293b; /* Slate-800 */
            --bg-tertiary: #334155; /* Slate-700 */
            --text-primary: #f1f5f9; /* Slate-100 */
            --text-secondary: #94a3b8; /* Slate-400 */
            --text-muted: #64748b; /* Slate-500 */
            --border-color: rgba(100, 116, 139, 0.3);
            --glass-base: rgba(30, 41, 59, 0.7);
            --accent-color: #8b5cf6; /* Violet-500 */
            --accent-hover: #7c3aed; /* Violet-600 */
            --accent-glow: rgba(139, 92, 246, 0.2);
            --success: #10b981; /* Emerald-500 */
            --warning: #f59e0b; /* Amber-500 */
            --danger: #ef4444; /* Red-500 */
            --info: #3b82f6; /* Blue-500 */
        }

        html[data-theme='light'] {
            /* LIGHT MODE */
            --bg-primary: #dddddd; /* Slate-50 */
            --bg-secondary: #ffffff; /* White */
            --bg-tertiary: #cdd592; /* Slate-100 */
            --text-primary: #1e293b; /* Slate-800 */
            --text-secondary: #475569; /* Slate-600 */
            --text-muted: #64748b; /* Slate-500 */
            --border-color: rgba(203, 213, 225, 0.5);
            --glass-base: rgba(255, 255, 255, 0.85);
            --accent-color: #8b5cf6; /* Violet-500 */
            --accent-hover: #7c3aed; /* Violet-600 */
            --accent-glow: rgba(139, 92, 246, 0.1);
            --success: #10b981; /* Emerald-500 */
            --warning: #f59e0b; /* Amber-500 */
            --danger: #ef4444; /* Red-500 */
            --info: #3b82f6; /* Blue-500 */
        }

        /* Base Styles */
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            transition: background-color 0.3s, color 0.3s;
            overflow-x: hidden;
        }

        /* Glassmorphism Effect */
        .glass-card {
            background-color: var(--glass-base);
            backdrop-filter: blur(12px);
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.06);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px var(--accent-glow), 0 10px 10px -5px var(--accent-glow);
        }

        /* Sidebar Styles */
        .sidebar {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background-color: var(--bg-secondary);
            border-right: 1px solid var(--border-color);
        }

        .sidebar-collapsed {
            width: 80px;
        }

        .sidebar-expanded {
            width: 256px;
        }

        /* Sticky Sidebar on Desktop */
        @media (min-width: 1024px) {
            #sidebar-desktop {
                position: sticky;
                top: 0;
                height: 100vh;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes shimmer {
            0% { background-position: -468px 0; }
            100% { background-position: 468px 0; }
        }

        .fade-in-item {
            opacity: 0;
            animation: fadeInUp 0.5s ease-out forwards;
        }

        .slide-in-left {
            opacity: 0;
            animation: slideInLeft 0.5s ease-out forwards;
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        .shimmer {
            background: linear-gradient(to right, var(--bg-secondary) 4%, var(--bg-tertiary) 25%, var(--bg-secondary) 36%);
            background-size: 1000px 100%;
            animation: shimmer 2s infinite linear;
        }

        /* Navigation Styles */
        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            color: var(--text-secondary);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background-color: var(--accent-color);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .nav-link:hover {
            color: var(--text-primary);
            background-color: var(--bg-tertiary);
        }

        .nav-link:hover::before {
            transform: scaleY(1);
        }

        .nav-link-active {
            color: var(--text-primary);
            background-color: var(--accent-color);
        }

        .nav-link-active::before {
            transform: scaleY(1);
        }

        /* Centered icons for collapsed sidebar */
        .sidebar-collapsed .nav-link {
            justify-content: center;
            padding: 0.75rem;
        }

        .sidebar-collapsed .nav-text,
        .sidebar-collapsed .nav-badge {
            display: none;
        }

        .sidebar-collapsed .logo-full {
            display: none;
        }

        .sidebar-collapsed .logo-icon {
            display: block;
        }

        .sidebar-expanded .logo-icon {
            display: none;
        }

        /* Mobile Navigation */
        @media (max-width: 1023px) {
            #sidebar-desktop {
                display: none;
            }

            .main-content {
                padding-bottom: 80px !important;
            }

            #bottom-nav {
                display: flex;
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                height: 70px;
                background-color: var(--bg-secondary);
                border-top: 1px solid var(--border-color);
                z-index: 50;
                justify-content: space-around;
                align-items: center;
                box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(10px);
            }

            .mobile-nav-link {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                font-size: 0.7rem;
                color: var(--text-secondary);
                padding: 0.5rem;
                border-radius: 0.75rem;
                transition: all 0.2s;
                position: relative;
            }

            .mobile-nav-link::after {
                content: '';
                position: absolute;
                bottom: -10px;
                width: 0;
                height: 3px;
                background-color: var(--accent-color);
                border-radius: 3px;
                transition: width 0.3s ease;
            }

            .mobile-nav-link-active {
                color: var(--accent-color);
            }

            .mobile-nav-link-active::after {
                width: 20px;
            }
        }

        @media (min-width: 1024px) {
            #bottom-nav {
                display: none;
            }
        }

        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: var(--accent-color);
            border-radius: 3px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        /* Button Styles */
        .btn-primary {
            background-color: var(--accent-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary:hover {
            background-color: var(--accent-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px var(--accent-glow);
        }

        /* Stats Card Styles */
        .stat-card {
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-color), var(--info));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        /* Table Styles */
        .table-row {
            transition: all 0.2s ease;
        }

        .table-row:hover {
            background-color: var(--bg-tertiary);
            transform: translateX(5px);
        }

        /* Theme Transition */
        * {
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }
    </style>
</head>
<body class="flex h-screen overflow-hidden">

    <!-- Desktop Sidebar -->
    <div id="sidebar-desktop" class="sidebar sidebar-expanded flex-shrink-0 z-50 overflow-y-auto custom-scrollbar">
        <div class="p-6 pb-4 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-r from-purple-500 to-indigo-600 flex items-center justify-center">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 text-white"></i>
                </div>
                <span class="logo-full text-xl font-bold bg-gradient-to-r from-purple-400 to-indigo-500 bg-clip-text text-transparent">BlogSphere</span>
                <span class="logo-icon text-xl font-bold bg-gradient-to-r from-purple-400 to-indigo-500 bg-clip-text text-transparent hidden">BS</span>
            </div>
        </div>

        <nav class="space-y-1 px-4 mt-4">
            <a href="#" class="nav-link nav-link-active">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Dashboard</span>
                <span class="nav-badge ml-auto bg-green-500/20 text-green-500 text-xs px-2 py-0.5 rounded-full">12</span>
            </a>
            <a href="#" class="nav-link">
                <i data-lucide="file-text" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Posts</span>
                <span class="nav-badge ml-auto bg-green-500/20 text-green-500 text-xs px-2 py-0.5 rounded-full">12</span>
            </a>
            <a href="#" class="nav-link">
                <i data-lucide="message-circle" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Comments</span>
                <span class="nav-badge ml-auto bg-red-500/20 text-red-500 text-xs px-2 py-0.5 rounded-full">5</span>
            </a>
            <a href="#" class="nav-link">
                <i data-lucide="folder-tree" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Categories</span>
            </a>
            <a href="#" class="nav-link">
                <i data-lucide="users" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Authors</span>
            </a>
            <a href="#" class="nav-link">
                <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Analytics</span>
            </a>
            <a href="#" class="nav-link">
                <i data-lucide="settings" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Settings</span>
            </a>
        </nav>

        <div class="absolute bottom-0 left-0 right-0 p-4 border-t" style="border-color: var(--border-color);">
            <div class="flex items-center space-x-3 p-3 rounded-xl" style="background-color: var(--bg-tertiary);">
                <img class="h-10 w-10 rounded-full object-cover border-2 border-accent-color/50"
                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                     alt="Admin Profile">
                <div class="user-info flex-1 min-w-0">
                    <p class="text-sm font-medium truncate">Alex Johnson</p>
                    <p class="text-xs truncate" style="color: var(--text-muted);">Admin</p>
                </div>
                <button class="text-slate-400 hover:text-accent-color transition-colors duration-200">
                    <i data-lucide="log-out" class="w-4 h-4"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="flex flex-col flex-1 overflow-y-auto overflow-x-hidden custom-scrollbar">

        <!-- Header -->
        <header class="sticky top-0 z-30 px-6 py-4 flex items-center justify-between border-b" style="border-color: var(--border-color); background-color: color-mix(in srgb, var(--bg-primary) 95%, transparent); backdrop-filter: blur(10px);">

            <div class="flex items-center">
                <button id="sidebar-toggle-desktop" class="text-slate-400 hover:text-accent-color transition-colors duration-200 mr-4 hidden lg:block">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>

                <div class="text-xl font-bold bg-gradient-to-r from-purple-400 to-indigo-500 bg-clip-text text-transparent lg:hidden">BlogSphere</div>

                <h1 class="text-xl font-semibold hidden lg:block">Dashboard Overview</h1>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative hidden md:block">
                    <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4" style="color: var(--text-muted);"></i>
                    <input type="text" placeholder="Search posts, authors..." class="rounded-full py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-accent-color focus:border-transparent border transition-all duration-200 w-64" style="background-color: var(--bg-secondary); border-color: var(--border-color); color: var(--text-primary);">
                </div>

                <button class="relative p-2 rounded-full hover:bg-slate-700/50 transition-colors duration-200">
                    <i data-lucide="bell" class="w-5 h-5" style="color: var(--text-secondary);"></i>
                    <span class="absolute top-1.5 right-1.5 block h-2 w-2 rounded-full" style="background-color: var(--danger);"></span>
                </button>

                <button id="theme-toggle" class="p-2 rounded-full hover:bg-slate-700/50 transition-colors duration-200">
                    <i data-lucide="sun" id="theme-icon" class="w-5 h-5" style="color: var(--text-secondary);"></i>
                </button>

                {{-- <button class="btn-primary hidden md:flex">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    New Post
                </button> --}}

                <a href="" class="btn-primary hidden md:flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
    <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
    New Post
</a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="p-6 md:p-8 main-content">

            <!-- Welcome Section -->
            <div class="mb-8 fade-in-item" style="animation-delay: 0s;">
                <h2 class="text-2xl font-bold mb-2">Welcome back, Alex!</h2>
                <p class="text-slate-400">Here's what's happening with your blog today.</p>
            </div>

            <!-- Stats Grid -->
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="glass-card stat-card p-6 rounded-2xl fade-in-item" style="animation-delay: 0.1s;">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-purple-500/10">
                            <i data-lucide="eye" class="w-6 h-6 text-purple-500"></i>
                        </div>
                        <span class="text-xs font-semibold text-green-400 bg-green-400/10 px-2 py-1 rounded-full flex items-center">
                            <i data-lucide="trending-up" class="w-3 h-3 mr-1"></i>
                            +18.5%
                        </span>
                    </div>
                    <p class="text-sm text-slate-400">Monthly Views</p>
                    <h3 class="text-2xl font-bold mt-1">45,901</h3>
                    <div class="w-full bg-slate-700 rounded-full h-2 mt-3">
                        <div class="bg-purple-500 h-2 rounded-full" style="width: 75%"></div>
                    </div>
                </div>

                <div class="glass-card stat-card p-6 rounded-2xl fade-in-item" style="animation-delay: 0.2s;">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-green-500/10">
                            <i data-lucide="file-text" class="w-6 h-6 text-green-500"></i>
                        </div>
                        <span class="text-xs font-semibold text-green-400 bg-green-400/10 px-2 py-1 rounded-full flex items-center">
                            <i data-lucide="plus" class="w-3 h-3 mr-1"></i>
                            +4
                        </span>
                    </div>
                    <p class="text-sm text-slate-400">Total Posts</p>
                    <h3 class="text-2xl font-bold mt-1">875</h3>
                    <div class="w-full bg-slate-700 rounded-full h-2 mt-3">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 62%"></div>
                    </div>
                </div>

                <div class="glass-card stat-card p-6 rounded-2xl fade-in-item" style="animation-delay: 0.3s;">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-blue-500/10">
                            <i data-lucide="clock" class="w-6 h-6 text-blue-500"></i>
                        </div>
                        <span class="text-xs font-semibold text-red-400 bg-red-400/10 px-2 py-1 rounded-full flex items-center">
                            <i data-lucide="trending-down" class="w-3 h-3 mr-1"></i>
                            -0.3 min
                        </span>
                    </div>
                    <p class="text-sm text-slate-400">Avg. Read Time</p>
                    <h3 class="text-2xl font-bold mt-1">4.2 min</h3>
                    <div class="w-full bg-slate-700 rounded-full h-2 mt-3">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 84%"></div>
                    </div>
                </div>

                <div class="glass-card stat-card p-6 rounded-2xl fade-in-item" style="animation-delay: 0.4s;">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-yellow-500/10">
                            <i data-lucide="users" class="w-6 h-6 text-yellow-500"></i>
                        </div>
                        <span class="text-xs font-semibold text-green-400 bg-green-400/10 px-2 py-1 rounded-full flex items-center">
                            <i data-lucide="trending-up" class="w-3 h-3 mr-1"></i>
                            +3.1%
                        </span>
                    </div>
                    <p class="text-sm text-slate-400">Subscribers</p>
                    <h3 class="text-2xl font-bold mt-1">18,456</h3>
                    <div class="w-full bg-slate-700 rounded-full h-2 mt-3">
                        <div class="bg-yellow-500 h-2 rounded-full" style="width: 68%"></div>
                    </div>
                </div>
            </section>

            <!-- Charts Section -->
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
                <div class="glass-card p-6 rounded-2xl fade-in-item" style="animation-delay: 0.5s;">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold">Traffic Overview</h3>
                        <div class="flex space-x-2">
                            <button class="text-xs px-3 py-1 rounded-full bg-accent-color text-white">Week</button>
                            <button class="text-xs px-3 py-1 rounded-full bg-slate-700 text-slate-300">Month</button>
                            <button class="text-xs px-3 py-1 rounded-full bg-slate-700 text-slate-300">Year</button>
                        </div>
                    </div>
                    <div class="h-80 flex items-center justify-center rounded-xl border-2 border-dashed" style="border-color: var(--border-color);">
                        <div class="text-center">
                            <i data-lucide="bar-chart-3" class="w-12 h-12 mx-auto mb-3" style="color: var(--text-muted);"></i>
                            <p class="text-sm" style="color: var(--text-secondary);">
                                Traffic visualization chart
                            </p>
                            <p class="text-xs mt-1" style="color: var(--text-muted);">
                                Shows visits, page views, and bounce rate
                            </p>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-2xl fade-in-item" style="animation-delay: 0.6s;">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold">Audience Demographics</h3>
                        <button class="text-xs px-3 py-1 rounded-full bg-slate-700 text-slate-300 flex items-center">
                            <i data-lucide="download" class="w-3 h-3 mr-1"></i>
                            Export
                        </button>
                    </div>
                    <div class="h-80 flex items-center justify-center rounded-xl border-2 border-dashed" style="border-color: var(--border-color);">
                        <div class="text-center">
                            <i data-lucide="pie-chart" class="w-12 h-12 mx-auto mb-3" style="color: var(--text-muted);"></i>
                            <p class="text-sm" style="color: var(--text-secondary);">
                                Audience demographics chart
                            </p>
                            <p class="text-xs mt-1" style="color: var(--text-muted);">
                                Shows age, location, and interests
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Recent Posts Table -->
            <section class="fade-in-item" style="animation-delay: 0.7s;">
                <div class="glass-card p-6 rounded-2xl">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold">Recent Posts</h3>
                        <button class="text-sm text-accent-color hover:underline flex items-center">
                            View All
                            <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="text-xs uppercase text-slate-400 border-b" style="border-color: var(--border-color);">
                                <tr>
                                    <th scope="col" class="py-3 px-4">Title</th>
                                    <th scope="col" class="py-3 px-4 hidden sm:table-cell">Status</th>
                                    <th scope="col" class="py-3 px-4">Views</th>
                                    <th scope="col" class="py-3 px-4 hidden md:table-cell">Date</th>
                                    <th scope="col" class="py-3 px-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-row border-b" style="border-color: var(--border-color);">
                                    <th scope="row" class="py-4 px-4 font-medium">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-md bg-purple-500/10 flex items-center justify-center mr-3">
                                                <i data-lucide="file-text" class="w-4 h-4 text-purple-500"></i>
                                            </div>
                                            <div>
                                                <div>The Future of AI in Web Development</div>
                                                <div class="text-xs text-slate-400 mt-1">Tech • 8 min read</div>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="py-4 px-4 hidden sm:table-cell">
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-500">Published</span>
                                    </td>
                                    <td class="py-4 px-4 font-semibold text-purple-500">12,500</td>
                                    <td class="py-4 px-4 hidden md:table-cell text-slate-400">May 15, 2023</td>
                                    <td class="py-4 px-4">
                                        <button class="text-accent-color hover:underline text-sm flex items-center">
                                            Edit
                                            <i data-lucide="edit" class="w-3 h-3 ml-1"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="table-row border-b" style="border-color: var(--border-color);">
                                    <th scope="row" class="py-4 px-4 font-medium">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-md bg-blue-500/10 flex items-center justify-center mr-3">
                                                <i data-lucide="file-text" class="w-4 h-4 text-blue-500"></i>
                                            </div>
                                            <div>
                                                <div>Mastering Tailwind CSS Grid</div>
                                                <div class="text-xs text-slate-400 mt-1">Design • 6 min read</div>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="py-4 px-4 hidden sm:table-cell">
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-500">Published</span>
                                    </td>
                                    <td class="py-4 px-4 font-semibold text-blue-500">8,900</td>
                                    <td class="py-4 px-4 hidden md:table-cell text-slate-400">May 10, 2023</td>
                                    <td class="py-4 px-4">
                                        <button class="text-accent-color hover:underline text-sm flex items-center">
                                            Edit
                                            <i data-lucide="edit" class="w-3 h-3 ml-1"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="table-row border-b" style="border-color: var(--border-color);">
                                    <th scope="row" class="py-4 px-4 font-medium">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-md bg-yellow-500/10 flex items-center justify-center mr-3">
                                                <i data-lucide="file-text" class="w-4 h-4 text-yellow-500"></i>
                                            </div>
                                            <div>
                                                <div>Best Practices for React Hooks</div>
                                                <div class="text-xs text-slate-400 mt-1">Development • 10 min read</div>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="py-4 px-4 hidden sm:table-cell">
                                        <span class="px-2 py-1 text-xs rounded-full bg-yellow-500/20 text-yellow-500">Draft</span>
                                    </td>
                                    <td class="py-4 px-4 font-semibold text-yellow-500">-</td>
                                    <td class="py-4 px-4 hidden md:table-cell text-slate-400">May 5, 2023</td>
                                    <td class="py-4 px-4">
                                        <button class="text-accent-color hover:underline text-sm flex items-center">
                                            Edit
                                            <i data-lucide="edit" class="w-3 h-3 ml-1"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="table-row">
                                    <th scope="row" class="py-4 px-4 font-medium">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-md bg-green-500/10 flex items-center justify-center mr-3">
                                                <i data-lucide="file-text" class="w-4 h-4 text-green-500"></i>
                                            </div>
                                            <div>
                                                <div>CSS Variables vs Preprocessor Variables</div>
                                                <div class="text-xs text-slate-400 mt-1">CSS • 7 min read</div>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="py-4 px-4 hidden sm:table-cell">
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-500">Published</span>
                                    </td>
                                    <td class="py-4 px-4 font-semibold text-green-500">5,600</td>
                                    <td class="py-4 px-4 hidden md:table-cell text-slate-400">Apr 28, 2023</td>
                                    <td class="py-4 px-4">
                                        <button class="text-accent-color hover:underline text-sm flex items-center">
                                            Edit
                                            <i data-lucide="edit" class="w-3 h-3 ml-1"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Mobile Bottom Navigation -->
    <nav id="bottom-nav">
        <a href="#" class="mobile-nav-link mobile-nav-link-active">
            <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
            <span>Dashboard</span>
        </a>
        <a href="#" class="mobile-nav-link">
            <i data-lucide="file-text" class="w-5 h-5"></i>
            <span>Posts</span>
        </a>
        <a href="#" class="mobile-nav-link">
            <i data-lucide="message-circle" class="w-5 h-5"></i>
            <span>Comments</span>
        </a>
        <a href="#" class="mobile-nav-link">
            <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
            <span>Analytics</span>
        </a>
        <a href="#" class="mobile-nav-link">
            <i data-lucide="more-horizontal" class="w-5 h-5"></i>
            <span>More</span>
        </a>
    </nav>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        const html = document.documentElement;
        const sidebar = document.getElementById('sidebar-desktop');
        const desktopToggle = document.getElementById('sidebar-toggle-desktop');
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');

        let isSidebarOpen = true;

        // --- Theme Management ---
        const THEME_KEY = 'blog_dashboard_theme';

        function applyTheme(theme) {
            html.setAttribute('data-theme', theme);
            localStorage.setItem(THEME_KEY, theme);
            if (theme === 'dark') {
                themeIcon.setAttribute('data-lucide', 'sun');
            } else {
                themeIcon.setAttribute('data-lucide', 'moon');
            }
            lucide.createIcons();
        }

        function toggleTheme() {
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            applyTheme(newTheme);
        }

        function initializeTheme() {
            const savedTheme = localStorage.getItem(THEME_KEY);
            let preferredTheme = 'dark';

            if (savedTheme) {
                preferredTheme = savedTheme;
            } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches) {
                preferredTheme = 'light';
            }
            applyTheme(preferredTheme);
        }

        // --- Sidebar Management (Desktop Only) ---

        function toggleDesktopSidebar() {
            if (isSidebarOpen) {
                // Collapse sidebar
                sidebar.classList.remove('sidebar-expanded');
                sidebar.classList.add('sidebar-collapsed');
            } else {
                // Expand sidebar
                sidebar.classList.remove('sidebar-collapsed');
                sidebar.classList.add('sidebar-expanded');
            }
            isSidebarOpen = !isSidebarOpen;
        }

        // --- Initial Load and Event Listeners ---

        document.addEventListener('DOMContentLoaded', () => {
            initializeTheme();

            // Event listeners
            desktopToggle.addEventListener('click', toggleDesktopSidebar);
            themeToggle.addEventListener('click', toggleTheme);

            // Animation cleanup
            const animatedItems = document.querySelectorAll('.fade-in-item');
            animatedItems.forEach(item => {
                item.addEventListener('animationend', () => {
                    item.style.opacity = '1';
                    item.style.transform = 'none';
                    item.style.animation = 'none';
                });
            });
        });

        // Initial setup for desktop view
        if (window.innerWidth < 1024) {
            isSidebarOpen = false;
            if (sidebar) {
                 sidebar.style.display = 'none';
            }
        }
    </script>
</body>
</html>
