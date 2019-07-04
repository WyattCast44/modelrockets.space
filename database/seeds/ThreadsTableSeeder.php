<?php

use App\Thread;
use App\Database\BaseSeeder;

class ThreadsTableSeeder extends BaseSeeder
{
    public function dev()
    {
        factory(Thread::class, 3)->create();
    }
}
