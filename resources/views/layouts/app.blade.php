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
<body class="font-sans antialiased gym-app-layout">
<!-- Background Particles -->
<div class="particles">
    <div class="particle" style="left: 5%; animation-delay: 0s;"></div>
    <div class="particle" style="left: 15%; animation-delay: -2s;"></div>
    <div class="particle" style="left: 35%; animation-delay: -4s;"></div>
    <div class="particle" style="left: 55%; animation-delay: -1s;"></div>
    <div class="particle" style="left: 75%; animation-delay: -3s;"></div>
    <div class="particle" style="left: 95%; animation-delay: -5s;"></div>
</div>

<div class="min-h-screen">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="gym-page-header">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="gym-page-title">
                    {{ $header }}
                </div>
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main class="relative z-10">
        {{ $slot }}
    </main>
</div>

<!-- Floating Action Button (Optional) -->
<div class="fixed bottom-6 right-6 z-50">
    <button onclick="scrollToTop()" class="gym-action-btn rounded-full p-3 shadow-lg" title="Back to top">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>
</div>

<script>
    // Smooth scroll to top functionality
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Enhanced app interactions
    document.addEventListener('DOMContentLoaded', function() {
        // Add floating particles periodically
        function createAppParticle() {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDuration = (Math.random() * 4 + 4) + 's';
            particle.style.animationDelay = Math.random() * 2 + 's';
            document.querySelector('.particles').appendChild(particle);

            setTimeout(() => {
                particle.remove();
            }, 10000);
        }

        setInterval(createAppParticle, 2000);

        // Show/hide back to top button
        const backToTopBtn = document.querySelector('.fixed button');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTopBtn.style.opacity = '1';
                backToTopBtn.style.transform = 'scale(1)';
            } else {
                backToTopBtn.style.opacity = '0';
                backToTopBtn.style.transform = 'scale(0.8)';
            }
        });

        // Initial state
        backToTopBtn.style.opacity = '0';
        backToTopBtn.style.transform = 'scale(0.8)';
        backToTopBtn.style.transition = 'all 0.3s ease';
    });
</script>
</body>
</html>
