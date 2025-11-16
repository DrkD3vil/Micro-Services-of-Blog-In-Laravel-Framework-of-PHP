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
