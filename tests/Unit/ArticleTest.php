<?php

namespace Tests\Unit;

use App\Article;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Board;

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
        $article = factory(Article::class)->create();

        // Some bad coupling, but oh well :(
        $board = factory(Board::class)->create(['name' => 'Article Discussions']);

        $article->publish();

        $this->assertEquals(1, $board->threads->count());
        
        $this->assertTrue($board->threads->first()->title == $article->title);
    }
}
