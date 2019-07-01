<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Thread;
use App\Favorite;
use App\Article;

class FavoriteTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_have_favorites()
    {
        // Given we have a user
        $user = create(User::class);

        $this->actingAs($user);

        // And given they favorite something, like a thread
        create(Thread::class)->favorite();

        // The user should have one "favorite"
        $this->assertEquals(1, $user->fresh()->favorites->count());
    }

    public function test_favorites_belong_to_a_user()
    {
        // Given we have a user
        $user = create(User::class);

        $this->actingAs($user);

        // And given they favorite something, like a thread
        create(Thread::class)->favorite();

        // The new favorite should belong to the user
        $this->assertTrue(Favorite::first()->user->id == $user->id);
    }

    public function test_a_user_can_favorite_threads()
    {
        //
    }

    public function test_a_user_can_favorite_replies()
    {
        //
    }

    public function test_a_user_can_favorite_articles()
    {
        // Given we have an article, that is published
        $article = create(Article::class)->publish();

        // And we have an authenticated user
        $this->actingAs($article->user);

        // We can favorite the article
        $article->favorite();

        // And our favorites can one item, that is the article
        $this->assertEquals(1, $article->user->favorites->count());
        $this->assertEquals($article->title, $article->user->favorites->first()->item->title);
    }
}
