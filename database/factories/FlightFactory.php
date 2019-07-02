<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Motor;
use App\Flight;
use Faker\Generator as Faker;

$factory->define(Flight::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'rocket' => $faker->words(3, true),
        'motor_id' => function () {
            return factory(Motor::class)->create()->id;
        },
        'motor_quantity' => '9',
        'altitude' => '230 ft',
        'description' => $faker->paragraph,
        'date' => now(),
        'meta' => null,
    ];
});
