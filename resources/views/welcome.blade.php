<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/qp-sw.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/qp-sw.svg') }}">

    <title>{{config('app.name')}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="font-sans antialiased">

<!-- Floating Particles -->
<div class="particles">
    <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
    <div class="particle" style="left: 20%; animation-delay: -1s;"></div>
    <div class="particle" style="left: 30%; animation-delay: -2s;"></div>
    <div class="particle" style="left: 40%; animation-delay: -3s;"></div>
    <div class="particle" style="left: 50%; animation-delay: -4s;"></div>
    <div class="particle" style="left: 60%; animation-delay: -5s;"></div>
    <div class="particle" style="left: 70%; animation-delay: -1.5s;"></div>
    <div class="particle" style="left: 80%; animation-delay: -2.5s;"></div>
    <div class="particle" style="left: 90%; animation-delay: -3.5s;"></div>
</div>

<div class="gym-hero">
    <div class="max-w-6xl mx-auto text-center">
        <!-- Logo -->
        <div class="flex justify-center pt-4">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <!-- Main Title with Animation -->
        <h1 class="gym-title">MyGym</h1>

        <!-- Subtitle -->
        <p class="text-xl md:text-2xl text-white/80 mb-12 max-w-2xl mx-auto font-light">
            Transform your fitness journey with cutting-edge technology and personalized training experiences
        </p>

        <!-- Feature Cards -->
        <div class="grid md:grid-cols-3 gap-6 mb-12 max-w-4xl mx-auto">
            <div class="glass-card p-6 gym-scale-hover">
                <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 gym-flex-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Smart Training</h3>
                <p class="text-white/70 text-sm">AI-powered workout recommendations tailored to your goals</p>
            </div>

            <div class="glass-card p-6 gym-scale-hover">
                <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-gradient-to-r from-blue-500 to-cyan-500 gym-flex-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Progress Tracking</h3>
                <p class="text-white/70 text-sm">Advanced analytics to monitor your fitness evolution</p>
            </div>

            <div class="glass-card p-6 gym-scale-hover">
                <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-gradient-to-r from-green-500 to-teal-500 gym-flex-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Community</h3>
                <p class="text-white/70 text-sm">Connect with trainers and fitness enthusiasts worldwide</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('dashboard') }}" class="gym-btn gym-glow-hover">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="gym-btn gym-glow-hover">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Log In
                    </a>
                    <a href="{{ route('register') }}" class="gym-btn gym-glow-hover" style="background: var(--secondary-gradient);">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Start Training
                    </a>
                @endauth
            @endif
        </div>

        <!-- Stats Section -->
        <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-8 max-w-3xl mx-auto">
            <div class="text-center">
                <div class="text-3xl font-bold gym-text-gradient mb-2">500+</div>
                <div class="text-white/60 text-sm uppercase tracking-wide">Active Members</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold gym-text-gradient mb-2">50+</div>
                <div class="text-white/60 text-sm uppercase tracking-wide">Expert Trainers</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold gym-text-gradient mb-2">24/7</div>
                <div class="text-white/60 text-sm uppercase tracking-wide">Gym Access</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold gym-text-gradient mb-2">100%</div>
                <div class="text-white/60 text-sm uppercase tracking-wide">Results Driven</div>
            </div>
        </div>
    </div>
</div>

<script>
    // Add some interactive particles
    document.addEventListener('DOMContentLoaded', function() {
        const particlesContainer = document.querySelector('.particles');

        function createParticle() {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDuration = (Math.random() * 3 + 3) + 's';
            particle.style.animationDelay = Math.random() * 2 + 's';
            particlesContainer.appendChild(particle);

            setTimeout(() => {
                particle.remove();
            }, 8000);
        }

        // Create particles periodically
        setInterval(createParticle, 800);

        // Initial particles
        for (let i = 0; i < 5; i++) {
            setTimeout(createParticle, i * 200);
        }
    });
</script>

</body>
</html>
