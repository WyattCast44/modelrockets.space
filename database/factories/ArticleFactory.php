<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Article;
use Faker\Generator as Faker;
use App\User;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'slug' => $faker->slug(),
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'user_id' => factory(User::class)->create()->id,
    ];
});
