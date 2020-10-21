<?php

namespace Tests\Feature;

use Livewire;
use App\Feature;
use Tests\TestCase;
use App\Http\Livewire\Features\FeatureIndex;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeaturesTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_users_can_upvote_features()
    {
        // Given we have a feature
        $feature = create(Feature::class);

        // And we are signed in
        $user = $this->signIn();

        // And we visit the features page
        $res = $this->get(route('features.index'));

        // It should be okay
        $res->assertOk();

        // We should see a upvote button and when we click it, 
        // it should call the upvote action
        Livewire::test(FeatureIndex::class)
            ->assertSee('Upvote')
            ->call('upvote', $feature->id);

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
        Livewire::test(FeatureIndex::class)
            ->assertSee('Login to vote')
            ->call('upvote', $feature->id)
            ->assertRedirect('/login');

        // And the feature should have no upvotes
        $this->assertEquals(0, $feature->refresh()->votes->count());
    }
}
