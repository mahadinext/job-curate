<?php

namespace App\Listeners;

use App\Events\NewNotificationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendNotificationListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(NewNotificationEvent $event)
    {
        // Broadcast the event to the Pusher channel
        event(new NewNotificationEvent($event->message));
    }
}
