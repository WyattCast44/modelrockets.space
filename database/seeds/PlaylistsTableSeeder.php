<?php

use App\Playlist;
use App\Database\BaseSeeder;

class PlaylistsTableSeeder extends BaseSeeder
{
    public function dev()
    {
        factory(Playlist::class, 8)->states('withVideos')->create();
    }
}
