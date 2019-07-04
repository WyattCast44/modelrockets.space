<?php

use App\Reply;
use App\Database\BaseSeeder;

class RepliesTableSeeder extends BaseSeeder
{
    public function dev()
    {
        factory(Reply::class, 5)->create();
    }
}
