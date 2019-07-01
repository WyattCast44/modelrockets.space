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
}
