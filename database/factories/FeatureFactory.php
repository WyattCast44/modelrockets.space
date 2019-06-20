<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Feature;
use Faker\Generator as Faker;
use App\User;

$factory->define(Feature::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'user_id' => factory(User::class)->create()->id,
        'status' => 'pending',
        'public' => true,
        'upvotes' => rand(0, 10),
    ];
});
