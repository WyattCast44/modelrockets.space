<?php

namespace Tests\Unit;

use App\User;
use App\Board;
use App\Reply;
use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Attachment;

class ThreadTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_thread_belongs_to_a_user()
    {
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
        $board = factory(Board::class)->create();

        $thread = factory(Thread::class)->create(['board_id' => $board->id]);

        $this->assertNotNull($thread->board);

        $this->assertTrue($thread->board->id == $board->id);
    }

    public function test_a_thread_can_have_many_replies()
    {
        $thread = factory(Thread::class)->create();

        $replies = factory(Reply::class, 3)->create(['thread_id' => $thread->id]);

        $replies->each(function ($reply) use ($thread) {
            $this->assertTrue(($reply->thread->id == $thread->id));
        });
    }

    public function test_a_thread_can_have_attachments()
    {
        $thread = factory(Thread::class)->create();

        $attachments = factory(Attachment::class, 3)->create([
            'attachable_id' => $thread->id,
            'attachable_type' => Thread::class,
        ]);

        $this->assertEquals($attachments->count(), $thread->attachments->count());
        
        $this->assertTrue($thread->attachments->contains($attachments->first()));
    }
}
