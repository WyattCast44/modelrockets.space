<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Doctrine\DBAL\Driver\PDOException;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_is_by_default_public()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->assertTrue($user->public);
    }

    public function test_a_user_can_be_private()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->assertTrue($user->public);

        $user->makePrivate();

        $this->assertFalse($user->public);
    }

    public function test_a_users_profile_is_created_automatically()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->assertNotNull($user->profile);
    }
}
