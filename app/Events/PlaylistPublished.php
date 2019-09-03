<?php

namespace App\Events;

use App\Playlist;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class PlaylistPublished
{
    use Dispatchable, SerializesModels;

    public $playlist;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Playlist $playlist)
    {
        $this->playlist = $playlist;
    }
}
