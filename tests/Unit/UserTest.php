<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_is_by_default_public()
    {
        $user = create(User::class);

        $this->assertTrue($user->public);
    }

    public function test_a_user_can_be_private()
    {
        $user = create(User::class);

        $this->assertTrue($user->public);

        $user->makePrivate();

        $this->assertFalse($user->public);
    }

    public function test_a_users_profile_is_created_automatically()
    {
        $user = create(User::class);

        $this->assertNotNull($user->profile);
    }

    public function test_a_user_knows_the_path_to_view_itself()
    {
        $user = create(User::class);

        $this->assertEquals(route('users.show', $user), $user->path('show'));
    }

    public function test_a_user_is_a_new_member_if_they_registered_within_the_last_five_days()
    {
        // Given we have a new user
        $newUser = create(User::class);

        // They should be a "new member"
        $this->assertTrue($newUser->new_member);
    }

    public function test_a_user_that_registered_more_than_five_days_ago_is_not_a_new_member()
    {
        // Given we have a user that registered 6 days ago
        $oldUser = create(User::class);
        
        $oldUser->update(['created_at' => now()->subDays(6)]);

        // They should not be a "new member"
        $this->assertFalse($oldUser->refresh()->new_member);
    }
}
