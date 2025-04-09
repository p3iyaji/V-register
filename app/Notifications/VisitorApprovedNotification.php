<?php

namespace App\Notifications;
use Illuminate\Notifications\Notification;
use App\Models\Visitor;

class VisitorApprovedNotification extends Notification
{
    

    public $visitor;

    public function __construct(Visitor $visitor)
    {
        $this->visitor = $visitor;
    }

    public function via($notifiable)
    {
        return ['database']; // For in-app notifications
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Visitor Approved',
            'visitor_id' => $this->visitor->id,
            'message' => $this->visitor->first_name . " " . $this->visitor->last_name . " has been approved",
            'action_url' => route('viewVisitor', $this->visitor->id),
            'approved_by' => auth()->user()->name,
            'approved_at' => now()->toDateTimeString(),
        ];
    }

    public function toArray($notifiable)
    {
        return $this->toDatabase($notifiable);
    }
}
