
    <style>
        /* CSS Variables for Dynamic Theme Switching */
        :root {
            /* DARK MODE */
            --bg-primary: #0f172a;
            /* Slate-900 */
            --bg-secondary: #1e293b;
            /* Slate-800 */
            --bg-tertiary: #334155;
            /* Slate-700 */
            --text-primary: #f1f5f9;
            /* Slate-100 */
            --text-secondary: #94a3b8;
            /* Slate-400 */
            --text-muted: #64748b;
            /* Slate-500 */
            --border-color: rgba(100, 116, 139, 0.3);
            --glass-base: rgba(30, 41, 59, 0.7);
            --accent-color: #8b5cf6;
            /* Violet-500 */
            --accent-hover: #7c3aed;
            /* Violet-600 */
            --accent-glow: rgba(139, 92, 246, 0.2);
            --success: #10b981;
            /* Emerald-500 */
            --warning: #f59e0b;
            /* Amber-500 */
            --danger: #ef4444;
            /* Red-500 */
            --info: #3b82f6;
            /* Blue-500 */
        }

        html[data-theme='light'] {
            /* LIGHT MODE */
            --bg-primary: #dddddd;
            /* Slate-50 */
            --bg-secondary: #ffffff;
            /* White */
            --bg-tertiary: #cdd592;
            /* Slate-100 */
            --text-primary: #1e293b;
            /* Slate-800 */
            --text-secondary: #475569;
            /* Slate-600 */
            --text-muted: #64748b;
            /* Slate-500 */
            --border-color: rgba(203, 213, 225, 0.5);
            --glass-base: rgba(255, 255, 255, 0.85);
            --accent-color: #8b5cf6;
            /* Violet-500 */
            --accent-hover: #7c3aed;
            /* Violet-600 */
            --accent-glow: rgba(139, 92, 246, 0.1);
            --success: #10b981;
            /* Emerald-500 */
            --warning: #f59e0b;
            /* Amber-500 */
            --danger: #ef4444;
            /* Red-500 */
            --info: #3b82f6;
            /* Blue-500 */
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
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -468px 0;
            }

            100% {
                background-position: 468px 0;
            }
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

