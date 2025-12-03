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
        <!-- Dashboard -->
        <a href="#" class="nav-link nav-link-active">
            <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
            <span class="nav-text ml-3">Dashboard</span>
            <span class="nav-badge ml-auto bg-green-500/20 text-green-500 text-xs px-2 py-0.5 rounded-full">12</span>
        </a>

        <!-- Posts -->
        <a href="#" class="nav-link">
            <i data-lucide="file-text" class="w-5 h-5"></i>
            <span class="nav-text ml-3">Posts</span>
            <span class="nav-badge ml-auto bg-green-500/20 text-green-500 text-xs px-2 py-0.5 rounded-full">12</span>
        </a>

        <!-- Categories with Children -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="nav-link flex items-center w-full transition-all duration-300" :class="open ? 'nav-link-active' : ''">
                <i data-lucide="folder" class="w-5 h-5 flex-shrink-0"></i>
                <span class="nav-text ml-3 flex-1 text-left">Categories</span>
                <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300 flex-shrink-0" :class="open ? 'rotate-180' : ''"></i>
            </button>

            <!-- Children Links -->
            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2"
                class="mt-2 ml-4 space-y-1 border-l-2 border-border-color pl-4">
                <a href="{{ route('categories.index') }}" class="nav-sublink flex items-center py-2 px-3 rounded-lg transition-all duration-200 hover:bg-bg-tertiary">
                    <i data-lucide="list" class="w-4 h-4 mr-3"></i>
                    <span>All Categories</span>
                </a>
                <a href="{{ route('categories.create') }}" class="nav-sublink flex items-center py-2 px-3 rounded-lg transition-all duration-200 hover:bg-bg-tertiary">
                    <i data-lucide="plus" class="w-4 h-4 mr-3"></i>
                    <span>Add New</span>
                </a>
            </div>
        </div>

        <!-- Comments -->
        <a href="#" class="nav-link">
            <i data-lucide="message-circle" class="w-5 h-5"></i>
            <span class="nav-text ml-3">Comments</span>
            <span class="nav-badge ml-auto bg-red-500/20 text-red-500 text-xs px-2 py-0.5 rounded-full">5</span>
        </a>

        <!-- Media Library with Children -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="nav-link flex items-center w-full transition-all duration-300" :class="open ? 'nav-link-active' : ''">
                <i data-lucide="image" class="w-5 h-5 flex-shrink-0"></i>
                <span class="nav-text ml-3 flex-1 text-left">Media Library</span>
                <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300 flex-shrink-0" :class="open ? 'rotate-180' : ''"></i>
            </button>

            <!-- Children Links -->
            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2"
                class="mt-2 ml-4 space-y-1 border-l-2 border-border-color pl-4">
                <a href="#" class="nav-sublink flex items-center py-2 px-3 rounded-lg transition-all duration-200 hover:bg-bg-tertiary">
                    <i data-lucide="folder-open" class="w-4 h-4 mr-3"></i>
                    <span>All Media</span>
                </a>
                <a href="#" class="nav-sublink flex items-center py-2 px-3 rounded-lg transition-all duration-200 hover:bg-bg-tertiary">
                    <i data-lucide="upload" class="w-4 h-4 mr-3"></i>
                    <span>Upload New</span>
                </a>
                <a href="#" class="nav-sublink flex items-center py-2 px-3 rounded-lg transition-all duration-200 hover:bg-bg-tertiary">
                    <i data-lucide="archive" class="w-4 h-4 mr-3"></i>
                    <span>Archived</span>
                </a>
            </div>
        </div>

        <!-- Authors Management Dropdown -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="nav-link flex items-center w-full transition-all duration-300" :class="open ? 'nav-link-active' : ''">
                <i data-lucide="users" class="w-5 h-5 flex-shrink-0"></i>
                <span class="nav-text ml-3 flex-1 text-left">Authors Management</span>
                <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300 flex-shrink-0" :class="open ? 'rotate-180' : ''"></i>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2" @click.away="open = false"
                class="absolute left-0 right-0 mt-2 glass-card border border-border-color rounded-xl shadow-xl py-3 z-50 overflow-hidden"
                style="backdrop-filter: blur(16px);">
                <!-- Active indicator bar -->
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-gradient-to-b from-accent-color to-info opacity-80"></div>

                <!-- Dropdown items -->
                <a href="{{ url('/request-author') }}"
                    class="flex items-center px-4 py-3 text-sm transition-all duration-200 group relative hover:bg-bg-tertiary/50 mx-2 rounded-lg">
                    <div class="w-8 h-8 rounded-lg bg-warning/20 flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                        <i data-lucide="user-plus" class="w-4 h-4 text-warning"></i>
                    </div>
                    <div class="flex-1">
                        <div class="font-medium text-primary">Request Author</div>
                        <div class="text-xs text-muted mt-0.5">Submit new author request</div>
                    </div>
                    <i data-lucide="arrow-right" class="w-4 h-4 text-muted group-hover:text-accent-color group-hover:translate-x-1 transition-all"></i>
                </a>

                <div class="h-px bg-border-color mx-4 my-2"></div>

                <a href="{{ url('/requested-authors') }}"
                    class="flex items-center px-4 py-3 text-sm transition-all duration-200 group relative hover:bg-bg-tertiary/50 mx-2 rounded-lg">
                    <div class="w-8 h-8 rounded-lg bg-info/20 flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                        <i data-lucide="clock" class="w-4 h-4 text-info"></i>
                    </div>
                    <div class="flex-1">
                        <div class="font-medium text-primary">Pending Requests</div>
                        <div class="text-xs text-muted mt-0.5">{{ $pendingCount ?? '0' }} awaiting approval</div>
                    </div>
                    <div class="px-2 py-1 bg-warning/20 text-warning text-xs rounded-full font-medium">
                        {{ $pendingCount ?? '0' }}
                    </div>
                </a>

                <div class="h-px bg-border-color mx-4 my-2"></div>

                <a href="{{ url('/authors') }}"
                    class="flex items-center px-4 py-3 text-sm transition-all duration-200 group relative hover:bg-bg-tertiary/50 mx-2 rounded-lg">
                    <div class="w-8 h-8 rounded-lg bg-success/20 flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                        <i data-lucide="user-check" class="w-4 h-4 text-success"></i>
                    </div>
                    <div class="flex-1">
                        <div class="font-medium text-primary">Approved Authors</div>
                        <div class="text-xs text-muted mt-0.5">Manage approved authors</div>
                    </div>
                    <i data-lucide="arrow-right" class="w-4 h-4 text-muted group-hover:text-accent-color group-hover:translate-x-1 transition-all"></i>
                </a>

                <!-- Bottom gradient effect -->
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-accent-color via-info to-success opacity-60"></div>
            </div>
        </div>

        <!-- Analytics -->
        <a href="#" class="nav-link">
            <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
            <span class="nav-text ml-3">Analytics</span>
        </a>

        <!-- Settings with Children -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="nav-link flex items-center w-full transition-all duration-300" :class="open ? 'nav-link-active' : ''">
                <i data-lucide="settings" class="w-5 h-5 flex-shrink-0"></i>
                <span class="nav-text ml-3 flex-1 text-left">Settings</span>
                <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300 flex-shrink-0" :class="open ? 'rotate-180' : ''"></i>
            </button>

            <!-- Children Links -->
            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2"
                class="mt-2 ml-4 space-y-1 border-l-2 border-border-color pl-4">
                <a href="#" class="nav-sublink flex items-center py-2 px-3 rounded-lg transition-all duration-200 hover:bg-bg-tertiary">
                    <i data-lucide="user-cog" class="w-4 h-4 mr-3"></i>
                    <span>Profile Settings</span>
                </a>
                <a href="#" class="nav-sublink flex items-center py-2 px-3 rounded-lg transition-all duration-200 hover:bg-bg-tertiary">
                    <i data-lucide="bell" class="w-4 h-4 mr-3"></i>
                    <span>Notifications</span>
                </a>
                <a href="#" class="nav-sublink flex items-center py-2 px-3 rounded-lg transition-all duration-200 hover:bg-bg-tertiary">
                    <i data-lucide="shield" class="w-4 h-4 mr-3"></i>
                    <span>Security</span>
                </a>
                <a href="#" class="nav-sublink flex items-center py-2 px-3 rounded-lg transition-all duration-200 hover:bg-bg-tertiary">
                    <i data-lucide="database" class="w-4 h-4 mr-3"></i>
                    <span>Backup & Restore</span>
                </a>
            </div>
        </div>
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

<style>
    /* Enhanced Dropdown Styles */
    .rotate-180 {
        transform: rotate(180deg);
    }

    /* Custom scrollbar for dropdown */
    .dropdown-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .dropdown-scrollbar::-webkit-scrollbar-thumb {
        background: var(--accent-color);
        border-radius: 2px;
    }

    .dropdown-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    /* Hover effects for dropdown items */
    .dropdown-item {
        position: relative;
        overflow: hidden;
    }

    .dropdown-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 3px;
        background: var(--accent-color);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
    }

    .dropdown-item:hover::before {
        transform: scaleX(1);
    }

    /* Pulse animation for notification badge */
    @keyframes gentle-pulse {
        0%, 100% {
            opacity: 1;
            transform: scale(1);
        }
        50% {
            opacity: 0.8;
            transform: scale(1.05);
        }
    }

    .pulse-notification {
        animation: gentle-pulse 2s infinite;
    }

    /* Glass morphism enhancement */
    .glass-card {
        background: var(--glass-base);
        backdrop-filter: blur(16px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
    }

    /* Children link styles */
    .nav-sublink {
        color: var(--text-secondary);
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }

    .nav-sublink:hover {
        color: var(--text-primary);
        transform: translateX(4px);
    }
</style>

<script src="//unpkg.com/alpinejs" defer></script>
