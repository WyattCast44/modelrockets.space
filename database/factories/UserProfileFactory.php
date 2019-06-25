<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\UserProfile;
use Faker\Generator as Faker;
use App\User;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'tagline' => $faker->words(rand(3, 8), true),
        'signature' => $faker->title,
        'meta' => null,
    ];
});
