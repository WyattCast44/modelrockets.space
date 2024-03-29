<?php

use App\User;
use App\Domain\Blog\Models\Article;
use App\Database\BaseSeeder;

class ArticlesTableSeeder extends BaseSeeder
{
    public function prod()
    {
        factory(Article::class)->create([
            'title' => 'Hello World 🚀',
            'subtitle' => 'Welcome to ModelRockets.Space',
            'slug' => 'hello-world',
            'body' => file_get_contents(__DIR__ . '/Data/HelloWorld.md'),
            'user_id' => User::where('username', 'SpaceMarauderX')->first()->id
        ])->publish();
    }

    public function dev()
    {
        // Five fake unpublished
        $articles = factory(Article::class, 5)->create();

        $articles->each->publish();

        // Markdown Test Article
        factory(Article::class)->create([
            'title' => 'Markdown Test',
            'body' => file_get_contents(__DIR__ . '/Data/MarkdownTest.md')
        ])->publish();
    }
}
