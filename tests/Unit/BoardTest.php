<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Board;
use App\Thread;

class BoardTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_board_is_by_default_public()
    {
        $this->withExceptionHandling();

        $board = factory(Board::class)->create();

        $this->assertTrue($board->public);
    }

    public function test_a_board_can_be_private()
    {
        $this->withoutExceptionHandling();

        $board = factory(Board::class)->create();

        $board->makePrivate();

        $this->assertFalse($board->public);
    }

    public function test_a_board_can_have_many_threads()
    {
        $this->withoutExceptionHandling();
        
        $board = factory(Board::class)->create();

        $threads = factory(Thread::class, 3)->create([
            'board_id' => $board->id,
        ]);

        $this->assertTrue($board->threads->count() === $threads->count());

        $threads->each(function ($thread) use ($board) {
            $this->assertTrue($thread->board->id === $board->id);
        });
    }
}
