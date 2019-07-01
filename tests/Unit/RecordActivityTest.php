<?php

namespace Tests\Unit;

use App\User;
use App\Reply;
use App\Flight;
use App\Thread;
use App\Article;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecordActivityTest extends TestCase
{
    use RefreshDatabase;

    public function test_when_a_thread_is_created()
    {
        // Given we create a thread
        $thread = factory(Thread::class)->create();

        // The threads owner should now have some activity (1 is created when user registers)
        $this->assertEquals(2, $thread->user->activity->count());

        // And the activity method should be "created a new thread"
        $this->assertEquals('created a new thread:', $thread->user->activity->last()->method);
    }

    public function test_when_a_user_replies_to_a_thread()
    {
        // Given we create a thread
        $thread = factory(Thread::class)->create();

        // And we reply to it
        $reply = factory(Reply::class)->create(['thread_id' => $thread->id]);

        // The replies owner should now have some activity (1 is created when user registers)
        $this->assertEquals(2, $reply->user->activity->count());

        // And the activity method should be "create"
        $this->assertEquals('replied to', $reply->user->activity()->latest()->get()->last()->method);
    }

    public function test_when_a_articles_is_published()
    {
        // Given we create a article
        $article = factory(Article::class)->create();

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
        $article = factory(Flight::class)->create();

        // The articles author should have activity (1 is created when user registers)
        $this->assertEquals(2, $article->user->activity->count());

        // And the activity method should be "recorded a new flight!"
        $this->assertEquals('recorded a new flight!', $article->user->activity->last()->method);
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
}
