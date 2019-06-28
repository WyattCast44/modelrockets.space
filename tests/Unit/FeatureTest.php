<?php

namespace Tests\Unit;

use App\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FreatureTest extends TestCase
{
    public function test_a_feature_belongs_to_a_user()
    {
        $feature = create(Feature::class);
        $this->assertNotNull($feature);
    }
}
