<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Thread;
use App\Favorite;

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
        //
    }
}
