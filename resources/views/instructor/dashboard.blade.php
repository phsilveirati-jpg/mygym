<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Instructor Dashboard') }}
            </h2>
            <div class="text-sm text-white/60">
                {{ now()->format('l, F j, Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="gym-dashboard-card gym-instructor-theme mb-8">
                <div class="gym-dashboard-card-content">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">
                                Welcome back, {{ Auth::user()->name }}! 💪
                            </h3>
                            <p class="text-white/80">Ready to inspire and train your members today?</p>
                        </div>
                        <div class="hidden md:block">
                            <div class="w-20 h-20 rounded-full bg-gradient-to-r from-pink-500 to-purple-500 gym-flex-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="gym-stat-card">
                    <div class="gym-stat-number">{{ $todayClasses ?? 3 }}</div>
                    <div class="gym-stat-label">Today's Classes</div>
                    <svg class="gym-stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>

                <div class="gym-stat-card">
                    <div class="gym-stat-number">{{ $totalStudents ?? 42 }}</div>
                    <div class="gym-stat-label">Active Students</div>
                    <svg class="gym-stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>

                <div class="gym-stat-card">
                    <div class="gym-stat-number">{{ $weeklyHours ?? 18 }}</div>
                    <div class="gym-stat-label">Weekly Hours</div>
                    <svg class="gym-stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <div class="gym-stat-card">
                    <div class="gym-stat-number">4.9</div>
                    <div class="gym-stat-label">Avg Rating</div>
                    <svg class="gym-stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="gym-content-section">
                    <h3 class="gym-section-title">Quick Actions</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <a href="{{ route('schedule.create') }}" class="gym-action-btn text-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Schedule Class
                        </a>
                        <a href="{{ route('schedule.index') }}" class="gym-action-btn secondary text-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            View Classes
                        </a>
                    </div>
                </div>

                <div class="gym-content-section">
                    <h3 class="gym-section-title">Today's Schedule</h3>
                    <div class="space-y-3">
                        <!-- Example schedule items -->
                        <div class="flex items-center justify-between p-3 bg-white/5 rounded-lg">
                            <div>
                                <div class="font-medium text-white">Strength Training</div>
                                <div class="text-sm text-white/60">6:00 PM - 7:00 PM</div>
                            </div>
                            <span class="gym-status-pending">Upcoming</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & Performance -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="gym-content-section">
                    <h3 class="gym-section-title">Recent Activity</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3 p-3 bg-white/5 rounded-lg">
                            <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="text-white font-medium">New member joined your Yoga class</p>
                                <p class="text-white/60 text-sm">2 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 p-3 bg-white/5 rounded-lg">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="text-white font-medium">Class feedback received (5 stars)</p>
                                <p class="text-white/60 text-sm">4 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 p-3 bg-white/5 rounded-lg">
                            <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="text-white font-medium">Updated class schedule approved</p>
                                <p class="text-white/60 text-sm">1 day ago</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gym-content-section">
                    <h3 class="gym-section-title">Performance Insights</h3>
                    <div class="space-y-4">
                        <div class="p-4 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg border border-green-500/30">
                            <div class="flex items-center justify-between">
                                <span class="text-white/90">Class Attendance</span>
                                <span class="text-green-400 font-bold">+15%</span>
                            </div>
                            <div class="text-sm text-white/60 mt-1">Compared to last month</div>
                        </div>
                        <div class="p-4 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-lg border border-blue-500/30">
                            <div class="flex items-center justify-between">
                                <span class="text-white/90">Member Satisfaction</span>
                                <span class="text-blue-400 font-bold">4.9/5</span>
                            </div>
                            <div class="text-sm text-white/60 mt-1">Based on recent feedback</div>
                        </div>
                        <div class="p-4 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-lg border border-purple-500/30">
                            <div class="flex items-center justify-between">
                                <span class="text-white/90">Classes This Week</span>
                                <span class="text-purple-400 font-bold">12</span>
                            </div>
                            <div class="text-sm text-white/60 mt-1">3 more than last week</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
