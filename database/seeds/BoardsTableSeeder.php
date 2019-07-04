<?php

use App\Board;
use App\Database\BaseSeeder;

class BoardsTableSeeder extends BaseSeeder
{
    public function prod()
    {
        $this->createArticlesBoard();
        $this->createOtherBoards();
    }

    public function dev()
    {
        $this->createArticlesBoard();

        factory(Board::class, 2)->create();
    }

    public function createArticlesBoard()
    {
        factory(Board::class)->create([
            'name' => 'Article Discussions',
            'description' => 'Article Bot 🤖 will automatically create threads whenever a new article is published.',
            'public' => true,
            'allow_new_public_threads' => false,
        ]);
    }

    public function createOtherBoards()
    {
        factory(Board::class)->create([
            'name' => 'SpaceX',
            'description' => 'A SpaceX related discussion board',
            'public' => true,
            'allow_new_public_threads' => true,
        ]);

        factory(Board::class)->create([
            'name' => 'The Catina',
            'description' => 'A general discussion board',
            'public' => true,
            'allow_new_public_threads' => true,
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
}
