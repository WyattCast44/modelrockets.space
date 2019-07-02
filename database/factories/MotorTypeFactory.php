<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\MotorType;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(MotorType::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'abbr' => Str::limit($faker->word, 3, ''),
        'description' => $faker->paragraph,
    ];
});
