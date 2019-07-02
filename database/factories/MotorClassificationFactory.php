<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\MotorClassification;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(MotorClassification::class, function (Faker $faker) {
    return [
        'name' => Str::limit($faker->word, 1, ''),
        'min_impulse' => '0.00',
        'max_impulse' => '10.00',
    ];
});
