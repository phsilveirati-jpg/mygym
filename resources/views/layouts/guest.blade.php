<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MyGym') }}</title>

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/qp-sw.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/qp-sw.svg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
<!-- Navigation Bar -->
<nav class="fixed top-0 left-0 right-0 z-50 glass-card mx-4 mt-4 rounded-2xl">
    <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="" class="flex items-center space-x-3">
                <div class="w-10 h-10  gym-flex-center">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </div>
                <span class="text-xl font-bold gym-text-gradient">MyGym</span>
            </a>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="#features" class="text-white/80 hover:text-white transition-colors">Features</a>
                <a href="#pricing" class="text-white/80 hover:text-white transition-colors">Pricing</a>
                <a href="#contact" class="text-white/80 hover:text-white transition-colors">Contact</a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="gym-btn text-sm py-2 px-4">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="gym-link">Login</a>
                        <a href="{{ route('register') }}" class="gym-btn text-sm py-2 px-4">Join Now</a>
                    @endauth
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-white" onclick="toggleMobileMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden mt-4 pt-4 border-t border-white/10">
            <div class="flex flex-col space-y-4">
                <a href="#features" class="text-white/80 hover:text-white transition-colors">Features</a>
                <a href="#pricing" class="text-white/80 hover:text-white transition-colors">Pricing</a>
                <a href="#contact" class="text-white/80 hover:text-white transition-colors">Contact</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="gym-btn text-sm py-2 px-4 text-center">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white/80 hover:text-white transition-colors">Login</a>
                        <a href="{{ route('register') }}" class="gym-btn text-sm py-2 px-4 text-center">Join Now</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="pt-20">
    {{ $slot }}
</main>

<!-- Footer -->
<footer class="mt-20 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid md:grid-cols-4 gap-8">
            <!-- Brand -->
            <div class="md:col-span-2">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 gym-flex-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold gym-text-gradient">MyGym</span>
                </div>
                <p class="text-white/70 max-w-md">
                    Empowering fitness enthusiasts with cutting-edge technology and personalized training experiences.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                <div class="space-y-2">
                    <a href="#" class="block text-white/70 hover:text-white transition-colors">About Us</a>
                    <a href="#" class="block text-white/70 hover:text-white transition-colors">Classes</a>
                    <a href="#" class="block text-white/70 hover:text-white transition-colors">Trainers</a>
                    <a href="#" class="block text-white/70 hover:text-white transition-colors">Membership</a>
                </div>
            </div>

            <!-- Support -->
            <div>
                <h3 class="text-white font-semibold mb-4">Support</h3>
                <div class="space-y-2">
                    <a href="#" class="block text-white/70 hover:text-white transition-colors">Help Center</a>
                    <a href="#" class="block text-white/70 hover:text-white transition-colors">Contact Us</a>
                    <a href="#" class="block text-white/70 hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="block text-white/70 hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-12 pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center">
            <p class="text-white/60 text-sm">
                © {{ date('Y') }} MyGym. All rights reserved.
            </p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <!-- Social Links -->
                <a href="#" class="text-white/60 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                    </svg>
                </a>
                <a href="#" class="text-white/60 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                    </svg>
                </a>
                <a href="#" class="text-white/60 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.083.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24c6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001 12.017.001z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>

<script>
    // Mobile menu toggle
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.toggle('hidden');
    }

    // Smooth scrolling for anchor links
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('a[href^="#"]');

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar scroll effect
        let lastScrollY = window.scrollY;
        const navbar = document.querySelector('nav');

        window.addEventListener('scroll', () => {
            if (window.scrollY > lastScrollY) {
                navbar.style.transform = 'translateY(-100%)';
            } else {
                navbar.style.transform = 'translateY(0)';
            }
            lastScrollY = window.scrollY;
        });
    });
</script>
</body>
</html>
