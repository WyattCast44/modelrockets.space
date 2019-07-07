<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Playlist::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'published' => $faker->boolean,
        'published_at' => $faker->dateTimeBetween(),
    ];
});
