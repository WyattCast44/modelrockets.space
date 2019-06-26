<?php

namespace Tests\Unit;

use App\Board;
use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BoardTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_board_is_by_default_public()
    {
        $board = factory(Board::class)->create();

        $this->assertTrue($board->public);
    }

    public function test_a_public_board_can_be_private()
    {
        // Given we have a board
        $board = factory(Board::class)->create();

        // And we make it private and provide a password
        $board->makePrivate('password');

        // It should not be public
        $this->assertFalse($board->public);

        // And the password should be encrypted by default
        $this->assertNotEquals('password', $board->getOriginal('password'));
    }

    public function test_a_private_board_can_be_public()
    {
        // Given we have a board
        $board = factory(Board::class)->create();

        // And we make it private and provide a password
        $board->makePrivate('password');

        // It should not be public
        $this->assertFalse($board->public);

        // We should be able to make it public by passing in the correct password
        $board->makePublic('password');

        // It should then be public
        $this->assertTrue($board->public);
    }

    public function test_a_private_board_will_throw_an_exception_when_the_wrong_password_is_entered_to_make_it_public()
    {
        // An exception should be thrown
        $this->expectException(\Exception::class);

        // Given we have a board
        $board = factory(Board::class)->create();

        // And we make it private and provide a password
        $board->makePrivate('password');

        // It should not be public
        $this->assertFalse($board->public);

        // And we try to make it public but pass a wrong password.
        $board->makePublic('wrong-password');

        // It should still be private
        $this->assertFalse($board->public);
    }

    public function test_a_board_can_have_many_threads()
    {
        $board = factory(Board::class)->create();

        $threads = factory(Thread::class, 3)->create([
            'board_id' => $board->id,
        ]);

        $this->assertTrue($board->threads->count() === $threads->count());

        $threads->each(function ($thread) use ($board) {
            $this->assertTrue($thread->board->id === $board->id);
        });
    }

    public function test_a_board_knows_the_path_to_view_itself()
    {
        // Given we have a board
        $board = factory(Board::class)->create();

        // We expect the path method to match the routes file
        $this->assertEquals(route('boards.show', $board), $board->path('show'));
    }

    public function test_a_board_knows_the_path_to_the_index()
    {
        // Given we have a board
        $board = factory(Board::class)->create();

        // We expect the path method to match the routes file
        $this->assertEquals(route('forum.index'), $board->path('index'));
    }
}
