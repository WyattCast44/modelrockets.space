<?php

namespace Tests\Unit;

use App\User;
use App\Reply;
use App\Flight;
use App\Thread;
use App\Article;
use App\Playlist;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecordActivityTest extends TestCase
{
    use RefreshDatabase;

    public function test_when_a_thread_is_created()
    {
        // Given we create a thread
        $thread = create(Thread::class);

        // The threads owner should now have some activity (1 is created when user registers)
        $this->assertEquals(2, $thread->user->activity->count());

        // And the activity method should be "created a new thread"
        $this->assertEquals('created a new thread:', $thread->user->refresh()->activity->last()->method);
    }

    public function test_when_a_user_replies_to_a_thread()
    {
        // Given we create a thread
        $thread = create(Thread::class);

        // And we reply to it
        $reply = create(Reply::class, ['thread_id' => $thread->id]);

        // The replies owner should now have some activity (1 is created when user registers)
        $this->assertEquals(2, $reply->user->activity->count());

        // And the activity method should be "create"
        $this->assertEquals('replied to', $reply->user->activity->last()->method);
    }

    public function test_when_a_articles_is_published()
    {
        // Given we create a article
        $article = create(Article::class);

        // And we publish it
        $article->publish();

        // The articles author should have activity (1 is created when user registers)
        $this->assertEquals(2, $article->user->activity->count());

        // And the activity method should be "published"
        $this->assertEquals('published', $article->user->activity->last()->method);
    }

    public function test_when_a_flight_is_added()
    {
        // Given we create a flight
        $article = create(Flight::class);

        // The articles author should have activity (1 is created when user registers)
        $this->assertEquals(2, $article->user->activity->count());

        // And the activity method should be "recorded a new flight!"
        $this->assertEquals('recorded a new flight!', $article->user->refresh()->activity->last()->method);
    }

    public function test_when_a_article_is_favorited()
    {
        // Given we a published article
        $article = create(Article::class)->publish();

        // And a user
        $user = create(User::class);

        // When we favorite an article
        $article->favorite($user);

        $user->refresh();

        // We should have two pieces of activity
        $this->assertEquals(2, $user->activity->count());

        // And the activity method should be "favorited"
        $this->assertEquals('favorited', $user->activity->last()->method);
    }

    public function test_when_a_plalists_is_subscribed_to()
    {
        // Given we a published playlist
        $playlist = create(Playlist::class);

        $playlist->publish();

        // And a user
        $user = create(User::class);

        // When we favorite an article
        $playlist->subscribe($user);

        $user->refresh();

        // We should have two pieces of activity
        $this->assertEquals(2, $user->activity->count());

        // And the latest activity method should be "subscribed to"
        $this->assertEquals('subscribed to', $user->activity->last()->method);
    }
}
