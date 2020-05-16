
<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Video;
use App\Playlist;
use Faker\Generator as Faker;

$factory->define(Playlist::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
        'description' => $faker->sentences(rand(2, 5), true),
        'slug' => $faker->slug,
        'image' => null,
        'featured' => (rand(0, 1)) ? true : false,
        'published_at' => now(),
        'meta' => null,
    ];
});

$factory->state(Playlist::class, 'withVideos', [
    'meta' => null,
]);

$factory->afterCreatingState(Playlist::class, 'withVideos', function ($playlist, $faker) {
    $playlist->videos()->save(factory(Video::class)->make());
});
