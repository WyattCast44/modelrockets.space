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
        $articles = factory(Article::class, 5)->create(['published' => true]);

        $response = $this->get($articles->first()->path());

        $response->assertStatus(200);

        $response->assertSee($articles->first()->title);
    }

    public function test_a_user_can_view_a_single_article()
    {
        $article = factory(Article::class)->create(['published' => true]);

        $response = $this->get($article->path($article));

        $response->assertStatus(200);

        $response->assertSee($article->title);
    }

    public function test_a_user_cannot_view_an_unpublished_article()
    {
        $article = factory(Article::class)->create(['published' => false]);

        $response = $this->get($article->path($article));

        $response->assertStatus(404);
    }
}
