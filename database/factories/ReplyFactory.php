<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Reply;
use Faker\Generator as Faker;
use App\User;
use App\Thread;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'thread_id' => factory(Thread::class)->create()->id,
        'body' => $faker->paragraph,
        'favorites' => rand(0, 100),
        'parent_id' => null
    ];
});
