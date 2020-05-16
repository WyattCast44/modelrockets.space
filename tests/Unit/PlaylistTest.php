<?php

namespace Tests\Unit;

use App\User;
use App\Playlist;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlaylistTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_playlist_without_videos_cannot_be_published()
    {
        // Given we have a playlist
        $playlist = create(Playlist::class);

        // And it has no videos
        $this->assertEquals(0, $playlist->videos->count());

        // We should not be able to publish it
        $this->assertFalse($playlist->publish());
    }

    public function test_a_playlist_with_videos_can_be_published()
    {
        // Given we have a playlist
        $playlist = factory(Playlist::class)->states('withVideos')->create();

        // And it has videos
        $this->assertNotEquals(0, $playlist->videos->count());

        // We should be able to publish it
        $this->assertTrue($playlist->publish());
    }
}
