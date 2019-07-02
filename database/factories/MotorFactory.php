<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use App\Motor;
use App\Vendor;
use Faker\Generator as Faker;
use App\MotorType;
use App\MotorClassification;

$factory->define(Motor::class, function (Faker $faker) {
    return [
        'name' => 'I49N-P',
        'diameter' => '25',
        'height' => '120',
        'total_impulse' => '105.5',
        'propellant_mass' => '62.5',
        'dry_mass' => '20',
        'total_mass' => '82.5',
        'average_thrust' => '2.5',
        'max_thrust' => '3',
        'burn_time' => '2.3',
        'delay_time' => '1.2',
        'classification_id' => function () {
            return factory(MotorClassification::class)->create()->id;
        },
        'type_id' => function () {
            return factory(MotorType::class)->create()->id;
        },
        'vendor_id' => function () {
            return factory(Vendor::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'meta' => null,
    ];
});
