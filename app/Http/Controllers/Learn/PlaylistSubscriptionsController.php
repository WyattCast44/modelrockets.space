<?php

namespace App\Http\Controllers\Learn;

use App\Playlist;
use App\Http\Controllers\Controller;

class PlaylistSubscriptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Playlist $playlist)
    {
        if (!$playlist->published) {
            toast('Sorry that playlist has not been published yet, try again once it is published!', 'error', 'top');
            
            return redirect()->route('learn.index');
        }
    
        $playlist->subscribe(auth()->user());

        toast('Your subscribed! We will send you a message whenever this playlist is updated, thanks!', 'success', 'top');

        return redirect()->route('learn.playlists.show', $playlist);
    }

    public function destroy(Playlist $playlist)
    {
        if (!$playlist->published) {
            toast('Sorry that playlist has not been published yet, try again once it is published!', 'error', 'top');
            
            return redirect()->route('learn.index');
        }
    
        $user = auth()->user();

        if ($user->isSubscribedTo($playlist)) {
            $playlist->unsubscribe(auth()->user());
        }

        toast('You have unsubscribed!', 'success', 'top');

        return redirect()->route('learn.playlists.show', $playlist);
    }
}
