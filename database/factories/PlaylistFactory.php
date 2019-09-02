<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Playlist::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'image' => null,
        'featured' => (rand(0, 1)) ? true : false,
        'published_at' => now(),
        'meta' => null,
    ];
});
