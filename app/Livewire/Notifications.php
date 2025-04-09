<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class Notifications extends Component
{
    public $unreadCount;
    public $notifications;
    public $showDropdown = false;
    public $previousUnreadCount = 0;


    public function mount()
    {
        $this->refresh();
    }


    public function refresh()
    {
        $this->unreadCount = Auth::user()->unreadNotifications()->count();
        $this->previousUnreadCount = $this->unreadCount;

        $this->notifications = Auth::user()->unreadNotifications()->latest()->take(10)->get();

         // Play sound when new notifications arrive
         if ($this->unreadCount > $this->previousUnreadCount) {
            $this->dispatchBrowserEvent('play-notification-sound');
        }

      
        
      

        $this->previousUnreadCount = $this->unreadCount;
    }

    public function toggleDropdown()
    {
        $this->showDropdown = !$this->showDropdown;
    }

    public function markAsRead($notificationId)
    {
        $notification = DatabaseNotification::find($notificationId);
        
        if ($notification && $notification->notifiable_id === Auth::id()) {
            $notification->markAsRead();
            $this->refresh();
            
            if (isset($notification->data['action_url'])) {
                return redirect($notification->data['action_url']);
            }
        }
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        $this->refresh();
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
