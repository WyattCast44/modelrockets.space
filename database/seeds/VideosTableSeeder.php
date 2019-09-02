<?php

use App\Video;
use App\Database\BaseSeeder;
use App\Playlist;

class VideosTableSeeder extends BaseSeeder
{
    public function dev()
    {
        factory(Video::class, 10)->create();
    }
}
