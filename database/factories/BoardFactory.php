<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Board;
use Faker\Generator as Faker;

$factory->define(Board::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
        'description' => $faker->sentence,
        'public' => true,
        'password' => null,
        'user_id' => null,
        'allow_new_public_threads' => true,
        'meta' => null
    ];
});
