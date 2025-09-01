<x-guest-layout>
    <div class="min-h-screen gym-flex-center p-4">
        <!-- Floating Particles -->
        <div class="particles">
            <div class="particle" style="left: 15%; animation-delay: 0s;"></div>
            <div class="particle" style="left: 35%; animation-delay: -1.5s;"></div>
            <div class="particle" style="left: 55%; animation-delay: -3s;"></div>
            <div class="particle" style="left: 75%; animation-delay: -4.5s;"></div>
            <div class="particle" style="left: 85%; animation-delay: -2s;"></div>
        </div>

        <div class="gym-form-container w-full">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="gym-form-title">Welcome Back</h2>
                <p class="text-white/70 mt-2">Sign in to continue your fitness journey</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="gym-status">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div class="gym-input-group">
                    <label for="email" class="gym-label">{{ __('Email Address') }}</label>
                    <input
                        id="email"
                        class="gym-input @error('email') border-red-500 @enderror"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Enter your email"
                    />
                    @error('email')
                    <div class="gym-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="gym-input-group">
                    <label for="password" class="gym-label">{{ __('Password') }}</label>
                    <div class="relative">
                        <input
                            id="password"
                            class="gym-input @error('password') border-red-500 @enderror"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter your password"
                        />
                    </div>
                    @error('password')
                    <div class="gym-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="gym-checkbox">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">{{ __('Remember me') }}</label>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col items-center justify-center gap-4 pt-4">
                    {{--                    @if (Route::has('password.request'))--}}
                    {{--                        <a class="gym-link text-sm" href="{{ route('password.request') }}">--}}
                    {{--                            {{ __('Forgot your password?') }}--}}
                    {{--                        </a>--}}
                    {{--                    @endif--}}
                    <button type="submit" class="gym-btn w-full sm:w-auto gym-glow-hover">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        {{ __('Log in') }}
                    </button>
                </div>

                <!-- Register Link -->
                <div class="text-center pt-6 border-t border-white/10">
                    <p class="text-white/70 text-sm">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="gym-link font-medium">
                            Create one now
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Enhanced form interactions
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.gym-input');

            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                });

                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });

            // Form submission loading state
            const form = document.querySelector('form');
            const submitBtn = form.querySelector('button[type="submit"]');

            form.addEventListener('submit', function() {
                submitBtn.innerHTML = '<div class="gym-loading mr-2"></div>Signing In...';
                submitBtn.disabled = true;
            });
        });
    </script>
</x-guest-layout>
