<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Member Dashboard') }}
            </h2>
            <div class="text-sm text-white/60">
                {{ now()->format('l, F j, Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="gym-dashboard-card gym-member-theme mb-8">
                <div class="gym-dashboard-card-content">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">
                                Hello {{ Auth::user()->name }}! 🔥
                            </h3>
                            <p class="text-white/80">Let's crush your fitness goals today!</p>
                        </div>
                        <div class="hidden md:block">
                            <div class="w-20 h-20 rounded-full bg-gradient-to-r from-blue-500 to-cyan-500 gym-flex-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="gym-stat-card">
                    <div class="gym-stat-number">{{ $weeklyWorkouts ?? 5 }}</div>
                    <div class="gym-stat-label">This Week</div>
                    <svg class="gym-stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>

                <div class="gym-stat-card">
                    <div class="gym-stat-number">{{ $caloriesBurned ?? 1250 }}</div>
                    <div class="gym-stat-label">Calories Burned</div>
                    <svg class="gym-stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path>
                    </svg>
                </div>

                <div class="gym-stat-card">
                    <div class="gym-stat-number">{{ $nextClass ?? '2:00 PM' }}</div>
                    <div class="gym-stat-label">Next Class</div>
                    <svg class="gym-stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <div class="gym-stat-card">
                    <div class="gym-stat-number">{{ $membershipDays ?? 127 }}</div>
                    <div class="gym-stat-label">Days Active</div>
                    <svg class="gym-stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Upcoming Classes -->
                <div class="lg:col-span-2 gym-content-section">
                    <h3 class="gym-section-title">Upcoming Classes</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-lg hover:bg-white/10 transition-colors">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-orange-500 to-red-500 gym-flex-center">
                                    🔥
                                </div>
                                <div>
                                    <h4 class="font-medium text-white">HIIT Cardio Blast</h4>
                                    <p class="text-white/60 text-sm">Today, 2:00 PM - 3:00 PM</p>
                                    <p class="text-white/60 text-sm">Instructor: Sarah Johnson</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="gym-status-active">Booked</span>
                                <button class="gym-action-btn danger text-sm py-1 px-3">Cancel</button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-lg hover:bg-white/10 transition-colors">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-green-500 to-emerald-500 gym-flex-center">
                                    🧘
                                </div>
                                <div>
                                    <h4 class="font-medium text-white">Morning Yoga Flow</h4>
                                    <p class="text-white/60 text-sm">Tomorrow, 9:00 AM - 10:00 AM</p>
                                    <p class="text-white/60 text-sm">Instructor: Mike Chen</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="gym-status-pending">Pending</span>
                                <button class="gym-action-btn secondary text-sm py-1 px-3">Confirm</button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('booking.create') }}" class="gym-action-btn w-full text-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Book New Class
                        </a>
                    </div>
                </div>

                <!-- Progress & Goals -->
                <div class="space-y-6">
                    <div class="gym-content-section">
                        <h3 class="gym-section-title">Weekly Progress</h3>
                        <div class="space-y-4">
                            <!-- Workout Goal -->
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-white/80">Workout Goal</span>
                                    <span class="text-white">5/6 sessions</span>
                                </div>
                                <div class="w-full bg-white/10 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full" style="width: 83%"></div>
                                </div>
                            </div>

                            <!-- Calorie Goal -->
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-white/80">Calorie Goal</span>
                                    <span class="text-white">1250/1500 kcal</span>
                                </div>
                                <div class="w-full bg-white/10 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 h-2 rounded-full" style="width: 83%"></div>
                                </div>
                            </div>

                            <!-- Strength Goal -->
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-white/80">Strength Training</span>
                                    <span class="text-white">3/4 sessions</span>
                                </div>
                                <div class="w-full bg-white/10 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-orange-500 to-red-500 h-2 rounded-full" style="width: 75%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gym-content-section">
                        <h3 class="gym-section-title">Quick Book</h3>
                        <div class="space-y-3">
                            <button class="w-full gym-action-btn text-left">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path>
                                </svg>
                                Cardio Session
                            </button>
                            <button class="w-full gym-action-btn secondary text-left">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                Yoga Class
                            </button>
                            <button class="w-full gym-action-btn" style="background: var(--dark-gradient);">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                                Strength Training
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
