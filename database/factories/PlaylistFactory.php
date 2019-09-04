<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(App\Playlist::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
        'slug' => $faker->slug,
        'image' => null,
        'featured' => (rand(0, 1)) ? true : false,
        'published_at' => now(),
        'meta' => null,
    ];
});

$factory->afterCreating(App\Playlist::class, function ($playlist, $faker) {
    $playlist->videos()->save(factory(Video::class)->make());
});
