<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewNotification implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $notificationMessage;

    public function __construct($message)
    {
        $this->notificationMessage = $message;
    }

    public function broadcastOn()
    {
        return new Channel('careepick-v1');
    }

    public function broadcastAs()
    {
        return 'new-notification';
    }
}
