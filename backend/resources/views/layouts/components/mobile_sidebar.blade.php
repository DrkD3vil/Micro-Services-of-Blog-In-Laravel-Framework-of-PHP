









<!-- Mobile Sidebar Overlay -->
<div id="sidebar-mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>

<!-- Mobile Sidebar -->
<div id="sidebar-mobile" class="fixed top-0 left-0 h-full w-80 max-w-full bg-bg-secondary border-r border-border-color z-50 transform -translate-x-full transition-transform duration-300 ease-in-out lg:hidden flex flex-col" style="z-index: 1000;">
    <!-- Header -->
    <div class="p-6 pb-4 flex items-center justify-between border-b border-border-color flex-shrink-0">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-r from-purple-500 to-indigo-600 flex items-center justify-center">
                <i data-lucide="layout-dashboard" class="w-5 h-5 text-white"></i>
            </div>
            <span class="logo-full text-xl font-bold bg-gradient-to-r from-purple-400 to-indigo-500 bg-clip-text text-transparent">BlogSphere</span>
        </div>
        <button id="sidebar-close-mobile" class="p-2 rounded-lg hover:bg-bg-tertiary transition-colors duration-200">
            <i data-lucide="x" class="w-5 h-5"></i>
        </button>
    </div>

    <!-- Scrollable Navigation Content -->
    <div class="flex-1 overflow-y-auto custom-scrollbar" style="height: calc(100vh - 140px);">
        <nav class="space-y-1 px-4 py-4">
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

            <!-- Categories Dropdown -->
            <div class="nav-item">
                <button class="nav-link w-full text-left flex items-center mobile-dropdown-toggle" data-dropdown="categories-dropdown">
                    <i data-lucide="folder" class="w-5 h-5"></i>
                    <span class="nav-text ml-3">Categories</span>
                    <i data-lucide="chevron-down" class="ml-auto w-4 h-4 transition-transform mobile-dropdown-chevron"></i>
                </button>
                <div id="categories-dropdown" class="pl-10 mt-2 space-y-2 hidden">
                    <a href="#" class="nav-sublink block py-2">All Categories</a>
                    <a href="#" class="nav-sublink block py-2">Add New</a>
                </div>
            </div>

            <a href="#" class="nav-link">
                <i data-lucide="message-circle" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Comments</span>
                <span class="nav-badge ml-auto bg-red-500/20 text-red-500 text-xs px-2 py-0.5 rounded-full">5</span>
            </a>

            <!-- Authors Management Dropdown -->
            <div class="nav-item">
                <button class="nav-link w-full text-left flex items-center mobile-dropdown-toggle" data-dropdown="authors-dropdown">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    <span class="nav-text ml-3">Authors Management</span>
                    <i data-lucide="chevron-down" class="ml-auto w-4 h-4 transition-transform mobile-dropdown-chevron"></i>
                </button>
                <div id="authors-dropdown" class="mt-2 space-y-2 hidden bg-bg-tertiary/50 rounded-lg p-3 mx-2">
                    <a href="#" class="flex items-center px-3 py-2 text-sm transition-all duration-200 group hover:bg-bg-tertiary rounded-lg">
                        <div class="w-8 h-8 rounded-lg bg-warning/20 flex items-center justify-center mr-3">
                            <i data-lucide="user-plus" class="w-4 h-4 text-warning"></i>
                        </div>
                        <div class="flex-1">
                            <div class="font-medium">Request Author</div>
                        </div>
                    </a>
                    <div class="h-px bg-border-color mx-2"></div>
                    <a href="#" class="flex items-center px-3 py-2 text-sm transition-all duration-200 group hover:bg-bg-tertiary rounded-lg">
                        <div class="w-8 h-8 rounded-lg bg-info/20 flex items-center justify-center mr-3">
                            <i data-lucide="clock" class="w-4 h-4 text-info"></i>
                        </div>
                        <div class="flex-1">
                            <div class="font-medium">Pending Requests</div>
                        </div>
                        <div class="px-2 py-1 bg-warning/20 text-warning text-xs rounded-full">5</div>
                    </a>
                    <div class="h-px bg-border-color mx-2"></div>
                    <a href="#" class="flex items-center px-3 py-2 text-sm transition-all duration-200 group hover:bg-bg-tertiary rounded-lg">
                        <div class="w-8 h-8 rounded-lg bg-success/20 flex items-center justify-center mr-3">
                            <i data-lucide="user-check" class="w-4 h-4 text-success"></i>
                        </div>
                        <div class="flex-1">
                            <div class="font-medium">Approved Authors</div>
                        </div>
                    </a>
                </div>
            </div>

            <a href="#" class="nav-link">
                <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Analytics</span>
            </a>
            <a href="#" class="nav-link">
                <i data-lucide="settings" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Settings</span>
            </a>

            <!-- Additional items to demonstrate scrolling -->
            <a href="#" class="nav-link">
                <i data-lucide="users" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Users</span>
            </a>
            <a href="#" class="nav-link">
                <i data-lucide="tag" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Tags</span>
            </a>
            <a href="#" class="nav-link">
                <i data-lucide="image" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Media</span>
            </a>
            <a href="#" class="nav-link">
                <i data-lucide="mail" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Newsletter</span>
            </a>
            <a href="#" class="nav-link">
                <i data-lucide="shield" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Security</span>
            </a>
            <a href="#" class="nav-link">
                <i data-lucide="database" class="w-5 h-5"></i>
                <span class="nav-text ml-3">Backups</span>
            </a>
        </nav>
    </div>

    <!-- Footer - User Profile -->
    <div class="border-t border-border-color p-4 bg-bg-secondary flex-shrink-0">
        <div class="flex items-center space-x-3 p-3 rounded-xl bg-bg-tertiary">
            <img class="h-10 w-10 rounded-full object-cover border-2 border-accent-color/50"
                 src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                 alt="Admin Profile">
            <div class="user-info flex-1 min-w-0">
                <p class="text-sm font-medium truncate">Alex Johnson</p>
                <p class="text-xs truncate text-text-muted">Admin</p>
            </div>
            <button class="text-slate-400 hover:text-accent-color transition-colors duration-200">
                <i data-lucide="log-out" class="w-4 h-4"></i>
            </button>
        </div>
    </div>
</div>

<script>
// Mobile Sidebar Functionality
document.addEventListener('DOMContentLoaded', function() {
    const mobileSidebar = document.getElementById('sidebar-mobile');
    const mobileOverlay = document.getElementById('sidebar-mobile-overlay');
    const mobileToggle = document.getElementById('sidebar-toggle-mobile');
    const mobileClose = document.getElementById('sidebar-close-mobile');

    // Open mobile sidebar
    function openMobileSidebar() {
        if (mobileSidebar && mobileOverlay) {
            mobileSidebar.classList.remove('-translate-x-full');
            mobileOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    // Close mobile sidebar
    function closeMobileSidebar() {
        if (mobileSidebar && mobileOverlay) {
            mobileSidebar.classList.add('-translate-x-full');
            mobileOverlay.classList.add('hidden');
            document.body.style.overflow = '';
            closeAllMobileDropdowns();
        }
    }

    // Mobile dropdown functionality
    function toggleMobileDropdown(dropdownId) {
        const dropdown = document.getElementById(dropdownId);
        const button = document.querySelector(`[data-dropdown="${dropdownId}"]`);
        const chevron = button.querySelector('.mobile-dropdown-chevron');

        if (dropdown.classList.contains('hidden')) {
            // Close all other dropdowns first
            closeAllMobileDropdowns();
            // Open this dropdown
            dropdown.classList.remove('hidden');
            chevron.classList.add('rotate-180');
        } else {
            dropdown.classList.add('hidden');
            chevron.classList.remove('rotate-180');
        }
    }

    function closeAllMobileDropdowns() {
        const dropdowns = document.querySelectorAll('#sidebar-mobile [id$="-dropdown"]');
        const chevrons = document.querySelectorAll('#sidebar-mobile .mobile-dropdown-chevron');

        dropdowns.forEach(dropdown => {
            dropdown.classList.add('hidden');
        });

        chevrons.forEach(chevron => {
            chevron.classList.remove('rotate-180');
        });
    }

    // Event listeners
    if (mobileToggle) {
        mobileToggle.addEventListener('click', openMobileSidebar);
    }

    if (mobileClose) {
        mobileClose.addEventListener('click', closeMobileSidebar);
    }

    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', closeMobileSidebar);
    }

    // Dropdown toggle event listeners
    document.querySelectorAll('.mobile-dropdown-toggle').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const dropdownId = this.getAttribute('data-dropdown');
            toggleMobileDropdown(dropdownId);
        });
    });

    // Close mobile sidebar when clicking on main nav links (not dropdown toggles)
    document.querySelectorAll('#sidebar-mobile .nav-link:not(.mobile-dropdown-toggle)').forEach(link => {
        link.addEventListener('click', closeMobileSidebar);
    });

    // Close on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && mobileSidebar && !mobileSidebar.classList.contains('-translate-x-full')) {
            closeMobileSidebar();
        }
    });

    // Reinitialize Lucide icons when sidebar opens
    if (mobileToggle) {
        mobileToggle.addEventListener('click', () => {
            setTimeout(() => {
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            }, 100);
        });
    }
});
</script>

<style>
    /* Mobile Sidebar Specific Styles */
    #sidebar-mobile {
        background-color: var(--bg-secondary);
        box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    #sidebar-mobile-overlay {
        backdrop-filter: blur(4px);
        z-index: 999;
    }

    /* Ensure proper scrolling */
    #sidebar-mobile .custom-scrollbar {
        flex: 1;
        overflow-y: auto;
        height: calc(100vh - 140px);
    }

    /* Custom scrollbar styling */
    #sidebar-mobile .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    #sidebar-mobile .custom-scrollbar::-webkit-scrollbar-thumb {
        background: var(--accent-color);
        border-radius: 3px;
    }

    #sidebar-mobile .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    /* Dropdown styles for mobile */
    #sidebar-mobile .nav-sublink {
        color: var(--text-secondary);
        transition: color 0.3s ease;
        font-size: 0.875rem;
    }

    #sidebar-mobile .nav-sublink:hover {
        color: var(--text-primary);
    }

    /* Rotate animation for chevrons */
    .rotate-180 {
        transform: rotate(180deg);
    }

    /* Responsive behavior */
    @media (min-width: 1024px) {
        #sidebar-mobile,
        #sidebar-mobile-overlay {
            display: none !important;
        }
    }

    /* Smooth transitions */
    #sidebar-mobile,
    #sidebar-mobile-overlay {
        transition: all 0.3s ease-in-out;
    }

    /* Mobile dropdown transitions */
    #sidebar-mobile [id$="-dropdown"] {
        transition: all 0.3s ease-in-out;
    }

    /* Ensure proper height calculation */
    #sidebar-mobile {
        height: 100vh;
    }
</style>
