<?php

use App\Article;
use App\Database\BaseSeeder;

class ArticlesTableSeeder extends BaseSeeder
{
    public function prod()
    {
        factory(Article::class)->create([
            'title' => 'Hello World 🚀',
            'subtitle' => 'Welcome to ModelRockets.Space',
            'slug' => 'hello-world',
            'body' => file_get_contents(__DIR__ . '/Data/HelloWorld.md')
        ])->publish();
    }

    public function dev()
    {
        // Five fake unpublished
        factory(Article::class, 5)->create();

        // Markdown Test Article
        factory(Article::class)->create([
            'title' => 'Markdown Test',
            'body' => file_get_contents(__DIR__ . '/Data/MarkdownTest.md')
        ])->publish();
    }
}
