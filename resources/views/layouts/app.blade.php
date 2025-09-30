<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'สาขาวิศวกรรมซอฟต์แวร์')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=noto-sans-thai:400,500,600,700" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        'thai': ['Noto Sans Thai', 'sans-serif'],
                    },
                    colors: {
                        'primary': {
                            50: '#fef2f2',
                            100: '#fee2e2', 
                            200: '#fecaca',
                            300: '#fca5a5',
                            400: '#f87171',
                            500: '#dc2626',
                            600: '#b91c1c',
                            700: '#991b1b',
                            800: '#7f1d1d',
                            900: '#450a0a',
                        },
                        'secondary': {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            200: '#fecaca', 
                            300: '#fca5a5',
                            400: '#f87171',
                            500: '#dc2626',
                            600: '#b91c1c',
                            700: '#991b1b',
                            800: '#7f1d1d',
                            900: '#450a0a',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Additional CSS -->
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #991b1b 0%, #7f1d1d 100%);
        }
        
        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        /* Dark mode transitions */
        .dark-transition {
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        
        /* Dark mode toggle button */
        .theme-toggle {
            transition: all 0.3s ease;
        }
        
        .theme-toggle:hover {
            transform: scale(1.05);
        }
        
        /* Smooth navigation transitions */
        nav {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        nav a {
            transition: all 0.2s ease;
            position: relative;
        }
        
        nav a:hover {
            transform: translateY(-1px);
        }
        
        /* Smooth section reveal animation */
        section {
            scroll-margin-top: 80px;
        }
        
        /* Add gentle bounce effect on section focus */
        .section-focus {
            animation: sectionBounce 0.6s ease-out;
        }
        
        @keyframes sectionBounce {
            0% { transform: translateY(-10px); opacity: 0.8; }
            50% { transform: translateY(-5px); opacity: 0.9; }
            100% { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body class="font-thai dark-transition dark:bg-gray-900 dark:text-white">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm border border-gray-200 dark:border-gray-700 fixed w-full top-0 z-50 dark-transition">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-xl font-bold text-gray-800 dark:text-white">SE</h1>
                        <!-- Subtle Admin Login -->
                        <a href="{{ route('admin.login') }}" class="ml-3 inline-block w-2 h-2 bg-gray-400 hover:bg-gray-600 dark:bg-gray-500 dark:hover:bg-gray-400 rounded-full transition-colors duration-300" title="Admin"></a>
                    </div>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}#home" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">หน้าแรก</a>
                    <a href="{{ route('home') }}#about" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">อาจารย์ประจำสาขา</a>
                    <a href="{{ route('home') }}#curriculum" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">หลักสูตร</a>
                    
                    <!-- Works Dropdown -->
                    <div class="relative" id="works-dropdown">
                        <button id="works-menu-button" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center">
                            ผลงาน
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="works-menu" class="absolute top-full left-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 hidden z-10">
                            <a href="{{ route('home') }}#faculty-research" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">ผลงานอาจารย์</a>
                            <a href="{{ route('home') }}#student-projects" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">ผลงานนักศึกษา</a>
                        </div>
                    </div>
                    
                    <a href="{{ route('home') }}#news" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">ข่าวสารและกิจกรรม</a>
                    
                    <!-- Dark Mode Toggle -->
                    <button id="theme-toggle" class="theme-toggle p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 transition-all">
                        <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2L13.09 8.26L20 9L14 14.74L15.18 21.02L10 17.77L4.82 21.02L6 14.74L0 9L6.91 8.26L10 2Z"></path>
                        </svg>
                    </button>
                    
                    <a href="{{ route('home') }}#contact" class="bg-primary-600 dark:bg-primary-700 text-white px-4 py-2 rounded-lg hover:bg-primary-700 dark:hover:bg-primary-800 transition-colors">ติดต่อเรา</a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center space-x-2">
                    <!-- Mobile Dark Mode Toggle -->
                    <button id="mobile-theme-toggle" class="theme-toggle p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 transition-all">
                        <svg class="mobile-theme-toggle-dark-icon w-4 h-4 hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg class="mobile-theme-toggle-light-icon w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2L13.09 8.26L20 9L14 14.74L15.18 21.02L10 17.77L4.82 21.02L6 14.74L0 9L6.91 8.26L10 2Z"></path>
                        </svg>
                    </button>
                    
                    <button type="button" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400" id="mobile-menu-button">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white dark:bg-gray-800 border-t dark:border-gray-700 dark-transition">
                <a href="{{ route('home') }}#home" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">หน้าแรก</a>
                <a href="{{ route('home') }}#about" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">อาจารย์ประจำสาขา</a>
                <a href="{{ route('home') }}#curriculum" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">หลักสูตร</a>
                <a href="{{ route('home') }}#faculty-research" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">ผลงานอาจารย์</a>
                <a href="{{ route('home') }}#student-projects" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">ผลงานนักศึกษา</a>
                <a href="{{ route('home') }}#news" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">ข่าวสารและกิจกรรม</a>
                <a href="{{ route('home') }}#contact" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">ติดต่อเรา</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 dark:bg-gray-950 text-white dark-transition">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-xl font-bold mb-4">สาขาวิศวกรรมซอฟต์แวร์</h3>
                    <p class="text-gray-300 dark:text-gray-400 mb-4">
                        สร้างอนาคตด้วยเทคโนโลยี พัฒนาโลกด้วยซอฟต์แวร์ 
                        เรียนรู้กับเราเพื่อเป็นวิศวกรซอฟต์แวร์มืออาชีพ
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.098.119.112.222.085.343-.09.389-.293 1.168-.334 1.334-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.748-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">ลิงก์ด่วน</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">สมัครเรียน</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">หลักสูตร</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">ทุนการศึกษา</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">ฝึกงาน</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">ติดต่อเรา</h4>
                    <ul class="space-y-2 text-gray-300 dark:text-gray-400">
                        <li>📧 se@university.ac.th</li>
                        <li>📞 02-123-4567</li>
                        <li>📍 กรุงเทพมหานคร 10400</li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 dark:border-gray-600 mt-8 pt-8 text-center text-gray-300 dark:text-gray-400">
                <p>&copy; 2024 สาขาวิศวกรรมซอฟต์แวร์. สงวนลิขสิทธิ์.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Dark Mode Toggle Functionality
        const themeToggleBtn = document.getElementById('theme-toggle');
        const mobileThemeToggleBtn = document.getElementById('mobile-theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');
        const mobileDarkIcons = document.querySelectorAll('.mobile-theme-toggle-dark-icon');
        const mobileLightIcons = document.querySelectorAll('.mobile-theme-toggle-light-icon');
        
        // Check for saved user preference, default to light mode
        const currentTheme = localStorage.getItem('theme') || 'light';
        
        // Apply initial theme
        if (currentTheme === 'dark') {
            document.documentElement.classList.add('dark');
            toggleThemeIcons(true);
        } else {
            document.documentElement.classList.remove('dark');
            toggleThemeIcons(false);
        }
        
        function toggleThemeIcons(isDark) {
            if (isDark) {
                // Show light icons (to switch to light mode)
                darkIcon.classList.add('hidden');
                lightIcon.classList.remove('hidden');
                mobileDarkIcons.forEach(icon => icon.classList.add('hidden'));
                mobileLightIcons.forEach(icon => icon.classList.remove('hidden'));
            } else {
                // Show dark icons (to switch to dark mode)  
                darkIcon.classList.remove('hidden');
                lightIcon.classList.add('hidden');
                mobileDarkIcons.forEach(icon => icon.classList.remove('hidden'));
                mobileLightIcons.forEach(icon => icon.classList.add('hidden'));
            }
        }
        
        function toggleTheme() {
            const isDark = document.documentElement.classList.contains('dark');
            
            if (isDark) {
                // Switch to light mode
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                toggleThemeIcons(false);
            } else {
                // Switch to dark mode
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                toggleThemeIcons(true);
            }
        }
        
        // Add event listeners
        themeToggleBtn.addEventListener('click', toggleTheme);
        mobileThemeToggleBtn.addEventListener('click', toggleTheme);
        
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        
        // Works dropdown functionality
        const worksButton = document.getElementById('works-menu-button');
        const worksMenu = document.getElementById('works-menu');
        
        if (worksButton && worksMenu) {
            worksButton.addEventListener('click', function(e) {
                e.preventDefault();
                worksMenu.classList.toggle('hidden');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!document.getElementById('works-dropdown').contains(e.target)) {
                    worksMenu.classList.add('hidden');
                }
            });
        }
        
        // Enhanced smooth scrolling for navigation links
        document.querySelectorAll('a[href*="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                const hashIndex = href.indexOf('#');
                
                if (hashIndex !== -1) {
                    const hash = href.substring(hashIndex);
                    const target = document.querySelector(hash);
                    
                    if (target) {
                        e.preventDefault();
                        
                        // If we're on a different page, navigate first then scroll
                        if (href.includes('{{ route("home") }}') && window.location.pathname !== '/') {
                            window.location.href = href;
                            return;
                        }
                        
                        // Smooth scroll with custom behavior
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                        
                        // Add smooth animation effect
                        target.style.transition = 'all 0.3s ease';
                        target.style.transform = 'translateY(-10px)';
                        setTimeout(() => {
                            target.style.transform = 'translateY(0)';
                        }, 150);
                    }
                }
            });
        });
        
        // Navbar background change on scroll with smooth transition
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('shadow-lg');
                nav.style.transition = 'all 0.3s ease';
            } else {
                nav.classList.remove('shadow-lg');
            }
        });
        
        // Add smooth scroll behavior to CSS
        document.documentElement.style.scrollBehavior = 'smooth';
    </script>
</body>
</html>