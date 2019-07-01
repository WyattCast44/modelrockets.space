<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Flight;
use Faker\Generator as Faker;

$factory->define(Flight::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'rocket' => $faker->words(3, true),
        'motors' => '9 x A10-3Ts',
        'altitude' => '230 ft',
        'description' => $faker->paragraph,
        'date' => now(),
        'meta' => null,
    ];
});
