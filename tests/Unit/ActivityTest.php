<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Thread;
use App\Reply;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    public function test_when_a_thread_is_created_user_activity_is_generated()
    {
        // Given we create a thread
        $thread = factory(Thread::class)->create();

        // The threads owner should now have some activity
        $this->assertEquals(1, $thread->user->activity->count());

        // And the activity method should be "create"
        $this->assertEquals('create', $thread->user->activity->first()->method);
    }

    public function test_when_a_user_replies_to_a_thread_user_activity_is_generated()
    {
        // Given we create a thread
        $thread = factory(Thread::class)->create();

        // And we reply to it
        $reply = factory(Reply::class)->create(['thread_id' => $thread->id]);

        // The replies owner should now have some activity
        $this->assertEquals(1, $reply->user->activity->count());

        // And the activity method should be "create"
        $this->assertEquals('create', $reply->user->activity->first()->method);
    }
}
