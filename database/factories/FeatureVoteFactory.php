<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\FeatureVote::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'feature_id' => function () {
            return factory(App\Feature::class)->create()->id;
        },
    ];
});
