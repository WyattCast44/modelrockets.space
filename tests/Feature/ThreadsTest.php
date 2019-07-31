<?php

namespace Tests\Feature;

use App\Board;
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

        // We should be succesfull
        $resp->assertOk();
    }
}
