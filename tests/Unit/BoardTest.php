<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Board;

class BoardTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_board_can_be_private()
    {
        $board = factory(Board::class)->create();

        $board->makePrivate();

        $this->assertTrue($board->private);
    }
}
