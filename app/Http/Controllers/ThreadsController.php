<?php

namespace App\Http\Controllers;

use Cloudder;
use App\Board;
use App\Thread;
use App\Attachment;
use App\Events\ThreadDeleted;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Requests\CreateThreadRequest;

class ThreadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
        
        $this->middleware(ProtectAgainstSpam::class)->only(['store']);
    }

    public function create(Board $board)
    {
        if (!$board->allow_new_public_threads) {
            alert()->warning('This board is closed to new threads.');

            return back();
        }
        
        return view('forum.threads.create', [
            'board' => $board,
        ]);
    }

    public function show(Board $board, Thread $thread)
    {
        if (!$board->public) {
            alert()->warning('This board is private.');

            return back();
        }

        $thread->load(['attachments', 'board', 'replies', 'user']);

        $replies = $thread->replies()->paginate(10);

        return view('forum.threads.show', [
            'board' => $board,
            'thread' => $thread,
            'replies' => $replies,
            'bestReply' => $thread->getBestReply()
        ]);
    }

    public function store(Board $board, CreateThreadRequest $request)
    {
        $thread = $board->threads()->create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'body' => $request->body,
            'open' => true,
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->attachments as $attachment) {
                $path = $attachment->getRealPath();

                list($width, $height) = getimagesize($path);
                
                Cloudder::upload($path, null);

                Attachment::create([
                    'user_id' => auth()->id(),
                    'attachable_id' => $thread->id,
                    'attachable_type' => Thread::class,
                    'filename' => '',
                    'vendor_id' => Cloudder::getPublicId(),
                    'path' => Cloudder::secureShow(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]),
                    'available' => true,
                ]);
            };
        }

        $thread->load(['attachments', 'user']);

        return redirect()->route('threads.show', ['board' => $board, 'thread' => $thread]);
    }

    public function delete(Board $board, Thread $thread)
    {
        event(new ThreadDeleted($thread));

        $thread->delete();

        return redirect()->route('forum.index');
    }
}
