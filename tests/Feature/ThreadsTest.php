<?php

namespace Tests\Feature;

use App\Board;
use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class BoardsTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_must_be_logged_in_to_view_create_threads_form()
    {
        //
    }
}
