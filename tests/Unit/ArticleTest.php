<?php

namespace Tests\Unit;

use App\Board;
use App\Article;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_article_belongs_to_a_user()
    {
        $article = factory(Article::class)->create();

        $this->assertNotNull($article->user);

        $this->assertTrue($article->user->articles->contains($article));
    }

    public function test_when_an_article_is_published_a_thread_is_created()
    {
        // Given we have an article
        $article = factory(Article::class)->create();

        // Given we have a board called 'Article Discussions' and the ArticlesBot Exists
        $board = factory(Board::class)->create(['name' => 'Article Discussions']);
        factory(User::class)->create(['username' => 'ArticlesBot']);

        // Given we publish the article
        $article->publish();

        // We expect to have one thread in our board
        $this->assertEquals(1, $board->threads->count());

        // We expect the title of the only thread to be the title of the article
        $this->assertTrue($board->threads->first()->title == $article->title);
    }

    public function test_a_article_can_be_published()
    {
        // Given we have an article
        $article = factory(Article::class)->create();

        // It should be unpublished by default
        $this->assertFalse($article->published);

        // When we publish it
        $article->publish();

        // It should be "published" and have a timestamp set
        $this->assertTrue($article->published);
        $this->assertNotNull($article->published_at);
    }

    public function test_a_article_can_be_unpublished()
    {
        // Given we have an article
        $article = factory(Article::class)->create();

        // And we publish it
        $article->publish();

        // When we unpublish it
        $article->unpublish();

        // It should no longer be "published" and the timestamp should be reset
        $this->assertFalse($article->published);
        $this->assertNull($article->published_at);
    }

    public function test_an_article_knows_if_it_has_been_updated()
    {
        // Given we have an article
        $article = factory(Article::class)->create();

        // And we publish it
        $article->publish();

        // And we update it
        $article->update(['title' => 'New title']);

        // It should be true that we updated it
        $this->assertTrue($article->hasBeenUpdated());
    }

    public function test_an_articles_knows_the_path_to_view_itself()
    {
        // Given we have an article
        $article = factory(Article::class)->create();

        // And we publish it
        $article->publish();

        // It can tell us the path to view it
        $this->assertNotNull($article->path('show'));
        
        // The path it returns should match what the routes file gives us
        $this->assertEquals(route('articles.show', $article), $article->path('show'));
    }

    public function test_an_articles_knows_the_path_to_view_all_articles()
    {
        // Given we have an article
        $article = factory(Article::class)->create();

        // And we publish it
        $article->publish();

        // It can tell us the path to view it
        $this->assertNotNull($article->path('index'));
        
        // The path it returns should match what the routes file gives us
        $this->assertEquals(route('articles.index'), $article->path('index'));
    }

    public function test_an_article_knows_the_path_to_its_discussion_thread()
    {
        // Given we have an article
        $article = factory(Article::class)->create();

        // Given we have a board called 'Article Discussions'
        $board = factory(Board::class)->create(['name' => 'Article Discussions']);
        factory(User::class)->create(['username' => 'ArticlesBot']);

        // Given we publish the article
        $article->publish();

        // We we ask for the discuss path, we should get the right path
        $this->assertEquals(
            route('threads.show', ['board' => $article->thread->board, 'thread' => $article->thread]),
            $article->path('discuss')
        );
    }
}
