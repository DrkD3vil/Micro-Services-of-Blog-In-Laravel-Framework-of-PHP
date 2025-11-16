    <!-- Desktop Sidebar -->
    <div id="sidebar-desktop" class="sidebar sidebar-expanded flex-shrink-0 z-50 overflow-y-auto custom-scrollbar">
        <div class="p-6 pb-4 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div
                    class="w-10 h-10 rounded-xl bg-gradient-to-r from-purple-500 to-indigo-600 flex items-center justify-center">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 text-white"></i>
                </div>
                <span
                    class="logo-full text-xl font-bold bg-gradient-to-r from-purple-400 to-indigo-500 bg-clip-text text-transparent">BlogSphere</span>
                <span
                    class="logo-icon text-xl font-bold bg-gradient-to-r from-purple-400 to-indigo-500 bg-clip-text text-transparent hidden">BS</span>
            </div>
        </div>

        <nav class="space-y-1 px-4 mt-4">
            <a href="#" class="nav-link nav-link-active">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Dashboard</span>
                <span
                    class="nav-badge ml-auto bg-green-500/20 text-green-500 text-xs px-2 py-0.5 rounded-full">12</span>
            </a>
            <a href="#" class="nav-link">
                <i data-lucide="file-text" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Posts</span>
                <span
                    class="nav-badge ml-auto bg-green-500/20 text-green-500 text-xs px-2 py-0.5 rounded-full">12</span>
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
