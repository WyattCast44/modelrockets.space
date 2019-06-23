<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Attachment;
use Faker\Generator as Faker;
use App\User;
use App\Thread;

$factory->define(Attachment::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'attachable_id' => function () {
            return factory(Thread::class)->create()->id;
        },
        'attachable_type' => Thread::class,
        'filename' => $faker->image(null, 200, 200, 'cats', false),
        'path' => $faker->imageUrl(200, 200, 'cats'),
        'available' => true,
    ];
});
