<?php

namespace App\Providers;

use App\User;
use App\Reply;
use App\Flight;
use App\Thread;
use App\Article;
use App\Playlist;
use App\Attachment;
use App\Observers\UserObserver;
use App\Observers\ReplyObserver;
use App\Observers\FlightObserver;
use App\Observers\ThreadObserver;
use App\Observers\ArticleObserver;
use App\Observers\PlaylistObserver;
use App\Observers\AttachmentObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        Article::observe(ArticleObserver::class);
        Playlist::observe(PlaylistObserver::class);
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
