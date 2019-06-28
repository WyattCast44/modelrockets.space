<?php

namespace Tests\Unit;

use App\User;
use App\Feature;
use Tests\TestCase;

class FeatureTest extends TestCase
{
    public function test_a_feature_belongs_to_a_user()
    {
        // Given we a have a feature
        $feature = create(Feature::class);

        // We should have a user
        $this->assertNotNull($feature->user);
        $this->assertDatabaseHas('users', ['email' => $feature->user->email]);
    }

    public function test_a_feature_can_have_votes()
    {
        // Given we have a feature and a user
        $feature = create(Feature::class);
        $user = create(User::class);

        // And we sign in as the user
        $this->actingAs($user);

        // The user should be able to upvote the feature
        $feature->upvote();

        // And the feature should have votes
        $this->assertEquals(1, $feature->votes->count());
    }

    public function test_a_user_can_only_vote_on_a_feature_once()
    {
        // Given we have a feature and a user
        $feature = create(Feature::class);
        $user = create(User::class);

        // And we sign in as the user
        $this->actingAs($user);

        // The user should be able to upvote the feature
        $feature->upvote();

        // And the feature should have votes
        $this->assertEquals(1, $feature->votes->count());

        // If we try to vote again, the vote count shouldn't change
        $feature->upvote();
        $this->assertEquals(1, $feature->votes->count());
    }
}
