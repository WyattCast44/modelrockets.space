<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraphs(3, true),
        'public' => true,
        'published' => false,
        'meta' => null,
    ];
});
