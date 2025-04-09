<div class="flex items-center gap-2">
                <button 
                    wire:poll.60s="refresh" 
                    data-dropdown-toggle="dropdownNotification"
                    class="relative w-10 h-10 bg-neutral-200 dark:bg-neutral-700 text-neutral-900 dark:text-white rounded-full flex justify-center items-center hover:bg-neutral-300 dark:hover:bg-neutral-600 transition-colors"
                    type="button"
                >
                    <!-- Bell Icon -->
                    <iconify-icon icon="iconoir:bell" class="text-xl relative z-10"></iconify-icon>
                    
                    <!-- Notification Badge - Now properly positioned -->
                    @if($unreadCount > 0)
                        <span class="absolute top-0 right-0 bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold transform translate-x-1/4 -translate-y-1/4">
                            {{ min($unreadCount, 9) }}
                            @if($unreadCount > 9)
                                <span class="text-[0.6rem]">+</span>
                            @endif
                        </span>
                    @endif
                </button>
                    
                    <div id="dropdownNotification" class="z-10 hidden bg-white dark:bg-neutral-700 rounded-2xl overflow-hidden shadow-lg max-w-[394px] w-full">
                        <div class="py-3 px-4 rounded-lg bg-primary-50 dark:bg-primary-600/25 m-4 flex items-center justify-between gap-2">
                            <h6 class="text-lg text-neutral-900 font-semibold mb-0">Notifications</h6>
                            @if($unreadCount > 0)
                                <button 
                                    wire:click="markAllAsRead"
                                    class="text-sm text-primary-600 dark:text-primary-400 hover:underline"
                                >
                                    Mark all as read
                                </button>
                            @endif
                        </div>
                        <div class="scroll-sm !border-t-0">
                            <div class="max-h-[400px] overflow-y-auto">
                            @forelse($notifications as $notification)
                                <div 
                                    wire:key="notification-{{ $notification->id }}"
                                    class="p-3 hover:bg-neutral-100 dark:hover:bg-neutral-600 border-b border-neutral-100 dark:border-neutral-600 cursor-pointer"
                                    wire:click="markAsRead('{{ $notification->id }}')"
                                >
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0">
                                            <div class="w-10 h-10 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center">
                                                <iconify-icon icon="heroicons:bell" class="text-primary-600 dark:text-primary-300"></iconify-icon>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-medium text-sm">{{ $notification->data['title'] ?? 'Notification' }}</h4>
                                            <p class="text-sm text-neutral-600 dark:text-neutral-300 mt-1">{{ $notification->data['message'] ?? '' }}</p>
                                            <p class="text-xs text-neutral-500 mt-2">{{ $notification->created_at->diffForHumans() }}</p>
                                        </div>
                                        @if($notification->unread())
                                            <div class="w-2 h-2 rounded-full bg-primary-500"></div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="p-4 text-center text-neutral-500">
                                    No new notifications
                                </div>
                            @endforelse

                            </div>

                            <div class="text-center py-3 px-4">
                                <!-- <a href="#" class="text-primary-600 dark:text-primary-600 font-semibold hover:underline text-center">
                                    See All Notifications
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>