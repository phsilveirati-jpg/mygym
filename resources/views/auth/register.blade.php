<x-guest-layout>
    <div class="min-h-screen gym-flex-center p-4">
        <!-- Floating Particles -->
        <div class="particles">
            <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
            <div class="particle" style="left: 25%; animation-delay: -1s;"></div>
            <div class="particle" style="left: 40%; animation-delay: -2s;"></div>
            <div class="particle" style="left: 60%; animation-delay: -3s;"></div>
            <div class="particle" style="left: 80%; animation-delay: -4s;"></div>
            <div class="particle" style="left: 90%; animation-delay: -1.5s;"></div>
        </div>

        <div class="gym-form-container w-full">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="gym-form-title">Join MyGym</h2>
                <p class="text-white/70 mt-2">Start your transformation today</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div class="gym-input-group">
                    <label for="name" class="gym-label">{{ __('Full Name') }}</label>
                    <input
                        id="name"
                        class="gym-input @error('name') border-red-500 @enderror"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Enter your full name"
                    />
                    @error('name')
                    <div class="gym-error">{{ $message }}</div>
                    @enderror
                </div>

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
                            autocomplete="new-password"
                            placeholder="Create a strong password"
                        />
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" onclick="togglePassword('password')" class="text-white/50 hover:text-white/80 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @error('password')
                    <div class="gym-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="gym-input-group">
                    <label for="password_confirmation" class="gym-label">{{ __('Confirm Password') }}</label>
                    <div class="relative">
                        <input
                            id="password_confirmation"
                            class="gym-input"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm your password"
                        />
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" onclick="togglePassword('password_confirmation')" class="text-white/50 hover:text-white/80 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @error('password_confirmation')
                    <div class="gym-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-6">
                    <a class="gym-link text-sm" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit" class="gym-btn w-full sm:w-auto gym-glow-hover" style="background: var(--secondary-gradient);">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        {{ __('Create Account') }}
                    </button>
                </div>

                <!-- Terms Notice -->
                <div class="text-center pt-6 border-t border-white/10">
                    <p class="text-white/60 text-xs">
                        By creating an account, you agree to our
                        <a href="#" class="gym-link">Terms of Service</a> and
                        <a href="#" class="gym-link">Privacy Policy</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Password visibility toggle
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
        }

        // Enhanced form interactions
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.gym-input');
            const form = document.querySelector('form');
            const submitBtn = form.querySelector('button[type="submit"]');

            // Input focus effects
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                    this.parentElement.style.transition = 'transform 0.2s ease';
                });

                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });

                // Real-time validation feedback
                input.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        this.style.borderColor = 'rgba(34, 197, 94, 0.5)';
                    } else {
                        this.style.borderColor = 'rgba(255, 255, 255, 0.1)';
                    }
                });
            });

            // Password strength indicator
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');

            passwordInput.addEventListener('input', function() {
                const strength = calculatePasswordStrength(this.value);
                updatePasswordStrengthIndicator(strength);
            });

            confirmPasswordInput.addEventListener('input', function() {
                const passwordsMatch = this.value === passwordInput.value;
                if (this.value.length > 0) {
                    this.style.borderColor = passwordsMatch ? 'rgba(34, 197, 94, 0.5)' : 'rgba(248, 113, 113, 0.5)';
                }
            });

            // Form submission
            form.addEventListener('submit', function() {
                submitBtn.innerHTML = '<div class="gym-loading mr-2"></div>Creating Account...';
                submitBtn.disabled = true;
            });

            // Create floating particles
            function createParticle() {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDuration = (Math.random() * 3 + 4) + 's';
                document.querySelector('.particles').appendChild(particle);

                setTimeout(() => {
                    particle.remove();
                }, 8000);
            }

            setInterval(createParticle, 1200);
        });

        function calculatePasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            return strength;
        }

        function updatePasswordStrengthIndicator(strength) {
            // You can add visual password strength indicator here
            const colors = ['#ef4444', '#f97316', '#eab308', '#22c55e', '#16a34a'];
            const passwordInput = document.getElementById('password');
            if (passwordInput.value.length > 0) {
                passwordInput.style.borderColor = colors[strength - 1] || '#ef4444';
            }
        }
    </script>
</x-guest-layout>
