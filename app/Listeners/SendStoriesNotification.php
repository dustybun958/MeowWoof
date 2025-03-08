<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Notification;

class SendStoriesNotification
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
    public function handle(object $event): void
    {
        // Send notification to Editor if stories is created or updated
        $editors = User::role('Editor')->get();

        $routeName = Route::currentRouteName();
        $title = $event->stories->title;
        $message = '';

        if ($routeName == 'stories.store') {
            $message = "$title has been created.";
        } elseif ($routeName == 'stories.update') {
            $message = "$title has been updated.";
        }

        foreach ($editors as $editor) {
            Notification::create([
                'user_id' => $editor->id,
                'data' => $message,
                'read_at' => null,
            ]);
        }
    }
}
