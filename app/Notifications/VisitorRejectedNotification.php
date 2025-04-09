<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Visitor;

class VisitorRejectedNotification extends Notification
{
    use Queueable;

    public $visitor;

    /**
     * Create a new notification instance.
     */
    public function __construct(Visitor $visitor)
    {
        $this->visitor = $visitor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Visitor Rejected',
            'visitor_id' => $this->visitor->id,
            'message' => $this->visitor->first_name . " " . $this->visitor->last_name . " has been rejected",
            'action_url' => route('viewVisitor', $this->visitor->id),
            'rejected_by' => auth()->user()->name,
            'rejected_at' => now()->toDateTimeString(),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return $this->toDatabase($notifiable);
    }
}
