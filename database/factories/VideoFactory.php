<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'description' => $faker->text,
        'url' => $faker->url,
        'published' => $faker->boolean,
        'published_at' => $faker->dateTimeBetween(),
    ];
});
