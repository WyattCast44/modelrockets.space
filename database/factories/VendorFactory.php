<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Vendor;
use Faker\Generator as Faker;

$factory->define(Vendor::class, function (Faker $faker) {
    return [
        'name' => $faker->company, 
        'description' => $faker->paragraph, 
        'website' => $faker->url, 
    ];
});
