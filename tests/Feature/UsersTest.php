<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_guest_can_view_all_public_users()
    {
        $publicUsers = factory(User::class, 5)->create(['public' => true]);

        $response = $this->get(route('users.index'));

        $response->assertStatus(200);

        $publicUsers->each(function ($user) use ($response) {
            $response->assertSee($user->username);
        });
    }

    public function test_a_guest_cannot_view_private_users()
    {
        $publicUsers = factory(User::class, 2)->create(['public' => true]);

        $privateUsers = factory(User::class, 2)->create(['public' => false]);

        $response = $this->get('/members');

        $response->assertStatus(200);

        $publicUsers->each(function ($user) use ($response) {
            $response->assertSee($user->username);
        });

        $privateUsers->each(function ($user) use ($response) {
            $response->assertDontSee($user->username);
        });
    }

    public function test_a_guest_can_view_a_public_users_page()
    {
        $publicUser = factory(User::class)->create(['public' => true]);

        $response = $this->get($publicUser->path('show'));

        $response->assertStatus(200);

        $response->assertSee($publicUser->username);
    }

    public function test_a_guest_cannot_view_a_private_users_page()
    {
        $privateUser = factory(User::class)->create(['public' => false]);

        $response = $this->get($privateUser->path('show'));

        $response->assertStatus(403);

        $response->assertDontSee($privateUser->username);
    }

    public function test_a_authenticated_user_cannot_view_a_private_users_page()
    {
        $user = factory(User::class)->create(['public' => true]);
        
        $this->actingAs($user);

        $privateUser = factory(User::class)->create(['public' => false]);

        $response = $this->get($privateUser->path('show'));

        $response->assertStatus(403);

        $response->assertDontSee($privateUser->username);
    }

    public function test_a_users_page_has_a_share_button()
    {
        $user = factory(User::class)->create(['public' => true]);

        $response = $this->get($user->path('show'));

        $response->assertStatus(200);

        $response->assertSee($user->username);

        $response->assertSee('Share');
    }

    public function test_a_new_user_is_sent_a_welcome_email()
    {
        Mail::fake();

        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        Mail::assertQueued(WelcomeEmail::class, function ($mail) use ($user) {
            return ($mail->user->id === $user->id);
        });
    }
}
