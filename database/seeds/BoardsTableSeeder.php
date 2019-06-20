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
        if (app()->environment('production')) {
            $this->createArticlesBoard();
            return;
        }

        $this->createRandomBoards();
        $this->createArticlesBoard();
    }

    public function createArticlesBoard()
    {
        factory(Board::class)->create([
            'name' => 'Article Discussions',
            'description' => 'Article Bot 🤖 will automatically create threads whenever a new article is published.',
            'public' => true,
            'allow_new_public_threads' => false,
        ]);

        factory(Board::class)->create([
            'name' => 'Mid Power Rocketry',
            'description' => 'Anything and everything, mid power rocketry!',
            'public' => true,
            'allow_new_public_threads' => true,
        ]);

        factory(Board::class)->create([
            'name' => 'High Power Rocketry',
            'description' => 'Anything and everything, high power rocketry!',
            'public' => true,
            'allow_new_public_threads' => true,
        ]);

        factory(Board::class)->create([
            'name' => 'ITAR/USML',
            'description' => 'Anything and everything related to ITAR/USML.',
            'public' => true,
            'allow_new_public_threads' => true,
        ]);
    }

    public function createRandomBoards($number = 5)
    {
        factory(Board::class, $number)->create();
    }
}
