<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class, 11)->create();

        factory(Article::class)->create([
            'title' => 'Markdown Test',
            'body' => file_get_contents(__DIR__ . '/Test.md')
        ]);
    }
}
