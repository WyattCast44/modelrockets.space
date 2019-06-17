<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Thread;
use Faker\Generator as Faker;
use App\User;
use App\Board;

$factory->define(Thread::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => factory(User::class)->create()->id,
        'board_id' => factory(Board::class)->create()->id,
        'open' => true,
    ];
});
