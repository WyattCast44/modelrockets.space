<?php

namespace Tests\Feature;

use App\Article;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ArticlesTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_view_all_articles()
    {
        // Given we have articles
        $articles = create(Article::class, [], 5);

        // And we publish them
        $articles->each(function ($article) {
            $article->publish();
        });

        // We we visit the index page
        $response = $this->get($articles->first()->path('index'));

        // We get a valid response
        $response->assertStatus(200);

        // And we see the title of the articles
        $response->assertSee($articles->first()->title);
    }

    public function test_a_user_can_view_a_single_article()
    {
        // Given we have an article
        $article = create(Article::class);
        
        // And we publish it
        $article->publish();

        // And we the visit the article
        $response = $this->get($article->path('show'));

        // We get a valid response
        $response->assertStatus(200);

        // We see the article title
        $response->assertSee($article->title);
    }

    public function test_a_user_cannot_view_an_unpublished_article()
    {
        $article = create(Article::class, ['published' => false]);

        $response = $this->get($article->path('show'));

        $response->assertStatus(404);
    }

    public function test_an_rss_feed_is_generated_for_published_articles()
    {
        // Given we have articles
        $articles = create(Article::class, [], 5);

        // And we publish them
        $articles->each(function ($article) {
            $article->publish();
        });

        // When we visit the rss for for articles
        $response = $this->get('/rss/articles');

        // We should get a valid response
        $response->assertStatus(200);

        // We should see the article title
        $response->assertSee($articles->first()->title);
    }

    public function test_rss_feed_does_not_contain_unpublished_articles()
    {
        // Given we have two articles
        $publishedArticle = create(Article::class);
        $unpublishedArticle = create(Article::class);

        // And we publish one of them
        $publishedArticle->publish();
        
        // When we visit the rss for for articles
        $response = $this->get('/rss/articles');

        // We should get a valid response
        $response->assertStatus(200);

        // And we should see the published articles title
        $response->assertSee($publishedArticle->title);

        // But we should not see the unpublished articles title
        $response->assertDontSee($unpublishedArticle->title);
    }

    public function test_an_article_can_be_favorited_by_authenticated_users()
    {
        // Given we have an article
        $article = create(Article::class);
        
        // And we publish it
        $article->publish();

        // And we sign in
        $user = create(User::class);
        $this->actingAs($user);

        // And we the visit the article
        $response = $this->get($article->path('show'));

        // We should see a favorite button
        $response->assertSee('👍 Favorite');

        // When we visit the favorite link, we should have a new favorite
        $response = $this->post($article->path('favorite'), []);

        $this->assertEquals(1, $user->favorites->count());
        
        $this->assertEquals($article->title, $user->favorites->first()->item->title);
    }

    public function test_an_article_cannot_be_favorited_by_guests()
    {
        // Given we have an article
        $article = create(Article::class);
        
        // And we publish it
        $article->publish();

        // And we the visit the article
        $response = $this->get($article->path('show'));

        // We should see a favorite button
        $response->assertSee('👍 Favorite');

        // When we visit the favorite link, we should have a new favorite
        $response = $this->post($article->path('favorite'));

        $response->assertRedirect('/login');
    }
}
