<?php

use Illuminate\Database\Seeder;
use App\Board;

class BoardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Board::class, 5)->create();

        factory(Board::class)->create([
            'name' => 'Article Discussions',
            'description' => 'Article Bot 🤖 will automatically create threads whenever a new article is published.',
            'public' => true,
            'allow_new_public_threads' => false,
        ]);
    }
}
