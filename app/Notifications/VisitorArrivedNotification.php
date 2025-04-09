<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use App\Models\Visitor;

class VisitorArrivedNotification extends Notification
{
    public $visitor;

    /**
     * Create a new notification instance.
     */
    public function __construct(Visitor $visitor)
    {
        $this->visitor = $visitor;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Visitor Arrived',
            'visitor_id' => $this->visitor->id,
            'message' => $this->visitor->first_name . " " . $this->visitor->last_name . " has arrived",
            'action_url' => route('viewVisitor', $this->visitor->id),
            'arrived_by' => auth()->user()->name,
            'arrived_at' => now()->toDateTimeString(),
        ];
    }
    
    public function toArray(object $notifiable): array
    {
        return $this->toDatabase($notifiable);
    }
}
