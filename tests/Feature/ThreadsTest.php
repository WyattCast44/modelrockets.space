<?php

namespace Tests\Feature;

use App\Board;
use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_must_be_logged_in_to_view_create_threads_form()
    {
        // Given we have a board
        $board = create(Board::class);

        // When we visit the create thread page
        $resp = $this->get($board->path('create-thread'));

        // We should be redirected to the login page
        $resp->assertRedirect('/login');
    }

    public function test_if_a_user_is_logged_in_they_can_view_create_threads_form()
    {
        // Given we have a board
        $board = create(Board::class);

        // And given we have logged in
        $this->signIn();
        
        // When we visit the create thread page
        $resp = $this->get($board->path('create-thread'));

        // We should be successfull
        $resp->assertOk();
    }

    public function test_a_user_can_subscribe_to_a_thread()
    {
        // Given we have thread
        $thread = create(Thread::class);

        // And a authenticated user
        $user = $this->signIn();

        // When the user subscribes to the thread
        $thread->subscribe($user);

        // The user should have one subscription
        $this->assertEquals(1, $user->subscriptions->count());

        // And the subscription owner should be the user
        $this->assertEquals($user->id, $thread->subscriptions->first()->user->id);

        // And the subscription shoud type should be the thread
        $this->assertEquals($thread->id, $user->subscriptions->first()->id);
    }
}
