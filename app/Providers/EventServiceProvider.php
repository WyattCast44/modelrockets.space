<?php

namespace App\Providers;

use App\User;
use App\Thread;
use App\Observers\UserObserver;
use App\Observers\ThreadObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Reply;
use App\Observers\ReplyObserver;
use App\Flight;
use App\Observers\FlightObserver;
use App\Attachment;
use App\Observers\AttachmentObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        User::observe(UserObserver::class);
        Reply::observe(ReplyObserver::class);
        Thread::observe(ThreadObserver::class);
        Flight::observe(FlightObserver::class);
        Attachment::observe(AttachmentObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
