<?php

namespace Tests\Feature;

use App\Board;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Thread;

class BoardsTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_view_a_single_board()
    {
        // Given we have an board
        $board = factory(Board::class)->create();

        // And we the visit the board
        $response = $this->get($board->path('show'));

        // We get a valid response
        $response->assertStatus(200);

        // We see the boards name
        $response->assertSee($board->name);
    }

    public function test_when_a_user_visits_a_single_board_we_should_see_all_the_boards_threads()
    {
        // Given we have an board
        $board = factory(Board::class)->create();

        // And given we have some threads on that board
        $threads = factory(Thread::class, 8)->create([
            'board_id' => $board->id
        ]);

        // And we the visit the board
        $response = $this->get($board->path('show'));

        // We get a valid response
        $response->assertStatus(200);

        // We see the boards name
        $response->assertSee($board->name);
        
        // And we should see the thread's titles
        $threads->each(function ($thread) use ($response) {
            $response->assertSee($thread->title);
        });
    }

    public function test_a_user_should_not_be_able_to_visit_private_boards()
    {
        //
    }

    public function test_an_rss_feed_is_generated_for_all_public_boards()
    {
        // Given we have boards
        $boards = factory(Board::class, 5)->create();

        // When we visit the rss for for boards
        $response = $this->get('/rss/forum/boards');

        // We should get a valid response
        $response->assertStatus(200);

        // We should see the boards title
        $response->assertSee($boards->first()->title);
    }

    public function test_rss_feed_does_not_contain_private_boards()
    {
        // Given we have two boards
        $publicBoard = factory(Board::class)->create();
        $privateBoard = factory(Board::class)->create();

        // And we make one private
        $privateBoard->makePrivate('password');
        
        // When we visit the rss for for articles
        $response = $this->get('/rss/forum/boards');

        // We should get a valid response
        $response->assertStatus(200);

        // And we should see the public boards title
        $response->assertSee($publicBoard->name);

        // But we should not see the private boards title
        $response->assertDontSee($privateBoard->name);
    }
}
