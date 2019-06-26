<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Article;

class ArticlesTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_view_all_articles()
    {
        // Given we have articles
        $articles = factory(Article::class, 5)->create();

        // And we publish them
        $articles->each(function ($article) {
            $article->publish();
        });

        // We we visit the index page
        $response = $this->get($articles->first()->path());

        // We get a valid response
        $response->assertStatus(200);

        // And we see the title of the articles
        $response->assertSee($articles->first()->title);
    }

    public function test_a_user_can_view_a_single_article()
    {
        // Given we have an article
        $article = factory(Article::class)->create();
        
        // And we publish it
        $article->publish();

        // And we the visit the article
        $response = $this->get($article->path($article));

        // We get a valid response
        $response->assertStatus(200);

        // We see the article title
        $response->assertSee($article->title);
    }

    public function test_a_user_cannot_view_an_unpublished_article()
    {
        $article = factory(Article::class)->create(['published' => false]);

        $response = $this->get($article->path($article));

        $response->assertStatus(404);
    }
}
