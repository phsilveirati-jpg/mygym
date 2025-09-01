<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
            <div class="flex items-center space-x-4">
                <span class="gym-status-active">System Online</span>
                <div class="text-sm text-white/60">
                    {{ now()->format('l, F j, Y') }}
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="gym-dashboard-card gym-admin-theme mb-8">
                <div class="gym-dashboard-card-content">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">
                                Welcome {{ Auth::user()->name }} ⚡
                            </h3>
                            <p class="text-white/80">Monitor and manage your gym operations from here</p>
                        </div>
                        <div class="hidden md:block">
                            <div class="w-20 h-20 rounded-full bg-gradient-to-r from-purple-500 to-indigo-500 gym-flex-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="gym-stat-card">
                    <div class="gym-stat-number">{{ $totalMembers ?? 284 }}</div>
                    <div class="gym-stat-label">Total Members</div>
                    <svg class="gym-stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>

                <div class="gym-stat-card">
                    <div class="gym-stat-number">{{ $activeInstructors ?? 12 }}</div>
                    <div class="gym-stat-label">Instructors</div>
                    <svg class="gym-stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>

                <div class="gym-stat-card">
                    <div class="gym-stat-number">{{ $todayRevenue ?? '$2.4K' }}</div>
                    <div class="gym-stat-label">Today's Revenue</div>
                    <svg class="gym-stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>

                <div class="gym-stat-card">
                    <div class="gym-stat-number">{{ $equipmentStatus ?? '98%' }}</div>
                    <div class="gym-stat-label">Equipment Online</div>
                    <svg class="gym-stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Management Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- System Overview -->
                <div class="gym-content-section">
                    <h3 class="gym-section-title">System Overview</h3>
                    <div class="space-y-4">
                        <div class="p-4 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg border border-green-500/30">
                            <div class="flex items-center justify-between">
                                <span class="text-white/90">Active Sessions</span>
                                <span class="text-green-400 font-bold">{{ $activeSessions ?? 47 }}</span>
                            </div>
                            <div class="text-sm text-white/60 mt-1">Members currently in gym</div>
                        </div>

                        <div class="p-4 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-lg border border-blue-500/30">
                            <div class="flex items-center justify-between">
                                <span class="text-white/90">Monthly Revenue</span>
                                <span class="text-blue-400 font-bold">${{ $monthlyRevenue ?? '45.2K' }}</span>
                            </div>
                            <div class="text-sm text-white/60 mt-1">+12% from last month</div>
                        </div>

                        <div class="p-4 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-lg border border-purple-500/30">
                            <div class="flex items-center justify-between">
                                <span class="text-white/90">Class Utilization</span>
                                <span class="text-purple-400 font-bold">{{ $classUtilization ?? '87%' }}</span>
                            </div>
                            <div class="text-sm text-white/60 mt-1">Average capacity filled</div>
                        </div>
                    </div>
                </div>

                <!-- Quick Admin Actions -->
                <div class="gym-content-section">
                    <h3 class="gym-section-title">Admin Actions</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <button class="gym-action-btn text-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Add Member
                        </button>
                        <button class="gym-action-btn secondary text-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Manage Staff
                        </button>
                        <button class="gym-action-btn" style="background: var(--dark-gradient);">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            System Settings
                        </button>
                        <button class="gym-action-btn danger text-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            View Reports
                        </button>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & Alerts -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 gym-content-section">
                    <h3 class="gym-section-title">Recent Activity</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3 p-4 bg-white/5 rounded-lg">
                            <div class="w-3 h-3 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div class="flex-1">
                                <p class="text-white font-medium">New member registration</p>
                                <p class="text-white/60 text-sm">John Smith joined the premium membership</p>
                                <p class="text-white/40 text-xs">5 minutes ago</p>
                            </div>
                            <span class="gym-status-active">+$99</span>
                        </div>

                        <div class="flex items-start space-x-3 p-4 bg-white/5 rounded-lg">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div class="flex-1">
                                <p class="text-white font-medium">Class schedule updated</p>
                                <p class="text-white/60 text-sm">Sarah Johnson modified HIIT class timing</p>
                                <p class="text-white/40 text-xs">15 minutes ago</p>
                            </div>
                            <span class="gym-status-pending">Pending</span>
                        </div>

                        <div class="flex items-start space-x-3 p-4 bg-white/5 rounded-lg">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div class="flex-1">
                                <p class="text-white font-medium">Equipment maintenance</p>
                                <p class="text-white/60 text-sm">Treadmill #3 scheduled for service</p>
                                <p class="text-white/40 text-xs">1 hour ago</p>
                            </div>
                            <span class="gym-status-pending">Review</span>
                        </div>

                        <div class="flex items-start space-x-3 p-4 bg-white/5 rounded-lg">
                            <div class="w-3 h-3 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div class="flex-1">
                                <p class="text-white font-medium">Payment processed</p>
                                <p class="text-white/60 text-sm">Monthly membership renewals completed</p>
                                <p class="text-white/40 text-xs">2 hours ago</p>
                            </div>
                            <span class="gym-status-active">+$12.5K</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button class="gym-action-btn w-full text-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            View All Activities
                        </button>
                    </div>
                </div>

                <!-- System Status & Alerts -->
                <div class="space-y-6">
                    <div class="gym-content-section">
                        <h3 class="gym-section-title">System Status</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-green-500/10 rounded-lg border border-green-500/20">
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                    <span class="text-white/90 text-sm">Database</span>
                                </div>
                                <span class="text-green-400 text-sm font-medium">Online</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-green-500/10 rounded-lg border border-green-500/20">
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                    <span class="text-white/90 text-sm">Payment Gateway</span>
                                </div>
                                <span class="text-green-400 text-sm font-medium">Online</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-yellow-500/10 rounded-lg border border-yellow-500/20">
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                    <span class="text-white/90 text-sm">Email Service</span>
                                </div>
                                <span class="text-yellow-400 text-sm font-medium">Warning</span>
                            </div>
                        </div>
                    </div>

                    <div class="gym-content-section">
                        <h3 class="gym-section-title">Quick Stats</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-white/80 text-sm">New Members (Today)</span>
                                <span class="text-white font-bold">{{ $newMembersToday ?? 3 }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-white/80 text-sm">Classes Scheduled</span>
                                <span class="text-white font-bold">{{ $scheduledClasses ?? 24 }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-white/80 text-sm">Equipment Issues</span>
                                <span class="text-yellow-400 font-bold">{{ $equipmentIssues ?? 2 }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-white/80 text-sm">Pending Approvals</span>
                                <span class="text-purple-400 font-bold">{{ $pendingApprovals ?? 5 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Management Tools -->
            <div class="gym-content-section">
                <h3 class="gym-section-title">Management Tools</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">
                    <button class="gym-action-btn text-center flex-col py-4">
                        <svg class="w-6 h-6 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="text-xs">Members</span>
                    </button>

                    <button class="gym-action-btn secondary text-center flex-col py-4">
                        <svg class="w-6 h-6 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-xs">Schedule</span>
                    </button>

                    <button class="gym-action-btn text-center flex-col py-4" style="background: var(--accent-gradient);">
                        <svg class="w-6 h-6 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        <span class="text-xs">Billing</span>
                    </button>

                    <button class="gym-action-btn danger text-center flex-col py-4">
                        <svg class="w-6 h-6 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span class="text-xs">Reports</span>
                    </button>

                    <button class="gym-action-btn text-center flex-col py-4" style="background: var(--dark-gradient);">
                        <svg class="w-6 h-6 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-xs">Settings</span>
                    </button>

                    <button class="gym-action-btn secondary text-center flex-col py-4">
                        <svg class="w-6 h-6 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <span class="text-xs">Support</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Admin dashboard interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-refresh system status every 30 seconds
            setInterval(function() {
                // Add subtle pulse to online indicators
                const onlineIndicators = document.querySelectorAll('.bg-green-500');
                onlineIndicators.forEach(indicator => {
                    indicator.style.opacity = '0.7';
                    setTimeout(() => {
                        indicator.style.opacity = '1';
                    }, 200);
                });
            }, 30000);

            // Add hover effects to management tools
            const toolButtons = document.querySelectorAll('.gym-content-section button');
            toolButtons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px) scale(1.05)';
                });

                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
</x-app-layout>
