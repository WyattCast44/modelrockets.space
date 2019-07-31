<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Feature;

class FeaturesTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_users_can_upvote_features()
    {
        // Given we have a feature
        $feature = create(Feature::class);

        // And we are signed in
        $this->signIn();

        // And we visit the features page
        $res = $this->get(route('features.index'));

        // It should be okay
        $res->assertOk();

        // We should see an "upvote" btn
        $res->assertSee('Upvote');

        // And when we "upvote" the feature
        $res = $this->post(route('features.upvote', $feature));

        // We should be redirected back to the features index
        $res->assertRedirect(route('features.index'));

        // And the feature should have one upvote
        $this->assertEquals(1, $feature->refresh()->votes->count());
    }

    public function test_unauthenticated_users_cannot_upvote_features()
    {
        // Given we have a feature
        $feature = create(Feature::class);

        // And we visit the features page
        $res = $this->get(route('features.index'));

        // It should be okay
        $res->assertOk();

        // We should see a login to vote btn
        $res->assertSee('Login to vote');

        // If we try to "upvote" the feature
        $res = $this->post(route('features.upvote', $feature));

        // We should be redirected to the login page
        $res->assertRedirect('login');

        // And the feature should have no upvotes
        $this->assertEquals(0, $feature->refresh()->votes->count());
    }
}
