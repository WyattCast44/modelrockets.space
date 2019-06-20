<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Feature;
use Faker\Generator as Faker;
use App\User;

$factory->define(Feature::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => factory(User::class)->create()->id,
        'status' => 'pending',
        'public' => true
    ];
});
