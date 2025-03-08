<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\StoriesCreated;
use App\Listeners\SendStoriesNotification;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        StoriesCreated::class => [
            SendStoriesNotification::class,
        ],
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        parent::boot();
    }
}
