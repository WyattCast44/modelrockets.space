<?php

namespace Tests\Unit;

use App\Reply;
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

        // The threads owner should now have some activity
        $this->assertEquals(1, $thread->user->activity->count());

        // And the activity method should be "create"
        $this->assertEquals('created', $thread->user->activity->first()->method);
    }

    public function test_when_a_user_replies_to_a_thread()
    {
        // Given we create a thread
        $thread = factory(Thread::class)->create();

        // And we reply to it
        $reply = factory(Reply::class)->create(['thread_id' => $thread->id]);

        // The replies owner should now have some activity
        $this->assertEquals(1, $reply->user->activity->count());

        // And the activity method should be "create"
        $this->assertEquals('created', $reply->user->activity->first()->method);
    }

    public function test_when_a_articles_is_published()
    {
        // Given we create a article
        $article = factory(Article::class)->create();

        // And we publish it
        $article->publish();

        // The articles author should have activity
        $this->assertEquals(1, $article->user->activity->count());

        // And the activity method should be "published"
        $this->assertEquals('published', $article->user->activity->first()->method);
    }
}