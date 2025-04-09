@extends('layout.layout')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Notifications</h1>
        @if(auth()->user()->unreadNotifications->count() > 0)
            <form action="{{ route('notifications.markAllRead') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">
                    Mark all as read
                </button>
            </form>
        @endif
    </div>
    
    <div class="bg-white dark:bg-neutral-800 rounded-lg shadow overflow-hidden">
        @forelse($notifications as $notification)
            <a href="{{ route('notifications.read', $notification->id) }}" 
               class="block p-4 hover:bg-neutral-50 dark:hover:bg-neutral-700 border-b border-neutral-200 dark:border-neutral-700">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center">
                            <iconify-icon icon="heroicons:bell" class="text-primary-600 dark:text-primary-300"></iconify-icon>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between">
                            <h3 class="font-medium {{ $notification->unread() ? 'text-neutral-900 dark:text-white' : 'text-neutral-600 dark:text-neutral-400' }}">
                                {{ $notification->data['title'] ?? 'Notification' }}
                            </h3>
                            <span class="text-xs text-neutral-500">
                                {{ $notification->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <p class="text-sm text-neutral-600 dark:text-neutral-300 mt-1">
                            {{ $notification->data['message'] ?? '' }}
                        </p>
                    </div>
                    @if($notification->unread())
                        <div class="w-2 h-2 rounded-full bg-primary-500"></div>
                    @endif
                </div>
            </a>
        @empty
            <div class="p-6 text-center text-neutral-500">
                No notifications found
            </div>
        @endforelse
    </div>
    
    {{ $notifications->links() }}
</div>
@endsection