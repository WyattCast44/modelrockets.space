<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use Faker\Generator as Faker;
use App\Domain\Blog\Models\Article;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'subtitle' => $faker->sentence,
        'body' => $faker->paragraph,
        'published' => false,
        'published_at' => null,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
