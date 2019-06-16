<?php

use Illuminate\Database\Seeder;
use App\Board;

class BoardsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Board::class)->create();
    }
}
