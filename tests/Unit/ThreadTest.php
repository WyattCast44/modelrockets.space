<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Thread;
use App\User;

class ThreadTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_thread_belongs_to_a_user()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->assertEquals(0, $user->threads->count());

        $thread = factory(Thread::class)->create([
            'user_id' => $user->id,
        ]);

        $user->load('threads');

        $this->assertEquals(1, $user->threads->count());
    }

    public function test_a_thread_belongs_to_a_board()
    {
        $thread = factory(Thread::class)->create();

        $this->assertNotNull($thread->board);
    }
}
