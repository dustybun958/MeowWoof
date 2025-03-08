<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\Notification;
use App\Events\StoriesStatusUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendStatusUpdatedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StoriesStatusUpdated $event): void
    {
        // Send notification to Author if status updated
        $author = $event->stories->author;

        Notification::create([
            'user_id' => $author->id,
            'data' => $event->stories->title . ' has been updated to ' . $event->stories->status,
            'read_at' => null,
        ]);
    }
}
