        <!-- Header -->
        <header class="sticky top-0 z-30 px-6 py-4 flex items-center justify-between border-b"
            style="border-color: var(--border-color); background-color: color-mix(in srgb, var(--bg-primary) 95%, transparent); backdrop-filter: blur(10px);">

            <div class="flex items-center">
                <button id="sidebar-toggle-desktop"
                    class="text-slate-400 hover:text-accent-color transition-colors duration-200 mr-4 hidden lg:block">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>

                <!-- Mobile toggle button for sidebar -->
                <button id="sidebar-toggle-mobile"
                    class="text-slate-400 hover:text-accent-color transition-colors duration-200 mr-4 lg:hidden">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>

                <div
                    class="text-xl font-bold bg-gradient-to-r from-purple-400 to-indigo-500 bg-clip-text text-transparent lg:hidden">
                    BlogSphere</div>

                <h1 class="text-xl font-semibold hidden lg:block">Dashboard Overview</h1>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative hidden md:block">
                    <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4"
                        style="color: var(--text-muted);"></i>
                    <input type="text" placeholder="Search posts, authors..."
                        class="rounded-full py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-accent-color focus:border-transparent border transition-all duration-200 w-64"
                        style="background-color: var(--bg-secondary); border-color: var(--border-color); color: var(--text-primary);">
                </div>

                <button class="relative p-2 rounded-full hover:bg-slate-700/50 transition-colors duration-200">
                    <i data-lucide="bell" class="w-5 h-5" style="color: var(--text-secondary);"></i>
                    <span class="absolute top-1.5 right-1.5 block h-2 w-2 rounded-full"
                        style="background-color: var(--danger);"></span>
                </button>

                <button id="theme-toggle" class="p-2 rounded-full hover:bg-slate-700/50 transition-colors duration-200">
                    <i data-lucide="sun" id="theme-icon" class="w-5 h-5" style="color: var(--text-secondary);"></i>
                </button>

                {{-- <button class="btn-primary hidden md:flex">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    New Post
                </button> --}}

                <a href=""
                    class="btn-primary hidden md:flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                    New Post
                </a>
            </div>
        </header>
