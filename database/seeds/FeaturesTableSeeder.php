<?php

use App\User;
use App\Feature;
use App\Database\BaseSeeder;

class FeaturesTableSeeder extends BaseSeeder
{
    public function prod()
    {
        $features = collect(require_once __DIR__ . '/Data/Features.php');

        $features->each(function ($feature) {
            factory(Feature::class)->create([
                'name' => $feature['name'],
                'body' => $feature['description'],
                'user_id' => User::where('username', 'SpaceMarauderX')->first()->id,
            ]);
        });
    }

    public function dev()
    {
        factory(Feature::class, 6)->create();
    }
}
