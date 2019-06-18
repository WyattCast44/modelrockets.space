<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Article;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_article_belongs_to_a_user()
    {
        $article = factory(Article::class)->create();

        $this->assertNotNull($article->user);

        $this->assertDatabaseHas('users', ['email' => $article->user->email]);
    }
}
