<?php

namespace Tests\Unit;

use App\Board;
use App\Article;
use Tests\TestCase;
use App\Events\ArticlePublished;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_article_belongs_to_a_user()
    {
        $article = factory(Article::class)->create();

        $this->assertNotNull($article->user);

        $this->assertDatabaseHas('users', ['email' => $article->user->email]);
    }

    public function test_when_an_article_is_published_a_thread_is_created()
    {
        // Given we have an article
        $article = factory(Article::class)->create();

        // Given we have a board called 'Article Discussions'
        $board = factory(Board::class)->create(['name' => 'Article Discussions']);

        // Given we publish the article
        $article->publish();

        // We expect to have one thread in our board
        $this->assertEquals(1, $board->threads->count());

        // We expect the title of the only thread to be the title of the article
        $this->assertTrue($board->threads->first()->title == $article->title);
    }
}
