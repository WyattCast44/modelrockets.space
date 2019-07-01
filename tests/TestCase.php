<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    public function signIn(User $user = null)
    {
        $user = ($user <> null) ? $user : create(User::class);

        $this->actingAs($user);
    }
}
