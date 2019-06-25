<?php

namespace App\Http\Controllers;

use Purify;
use Cloudder;
use App\Reply;
use App\Board;
use App\Thread;
use Illuminate\Http\Request;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Attachment;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
        
        $this->middleware(ProtectAgainstSpam::class)->only(['store']);
    }

    public function create(Board $board, Thread $thread, $parentId = null)
    {
        $parent = null;

        if ($parentId <> null) {
            $parent = Reply::where('thread_id', $thread->id)
                        ->where('id', $parentId)
                        ->first();
        }

        return view('forum.replies.create', [
            'board' => $board,
            'thread' => $thread,
            'parent' => $parent
        ]);
    }

    public function store(Board $board, Thread $thread, Request $request)
    {
        $this->validate($request, [
            'body' => 'required|string|min:3',
            'parent_id' => 'nullable|exists:replies,id',
        ]);

        $body = trim(Purify::clean($request->body));

        $reply = Reply::create([
            'user_id' => auth()->user()->id,
            'thread_id' => $thread->id,
            'body' => Purify::clean($request->body),
            'parent_id' => ($request->parent_id) ? $request->parent_id : null
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->attachments as $attachment) {
                $path = $attachment->getRealPath();
                
                Cloudder::upload($path, null);

                Attachment::create([
                    'user_id' => auth()->id(),
                    'attachable_id' => $reply->id,
                    'attachable_type' => Reply::class,
                    'filename' => '',
                    'vendor_id' => Cloudder::getPublicId(),
                    'path' => Cloudder::secureShow(Cloudder::getPublicId()),
                    'available' => true,
                ]);
            };
        }

        toast('Reply Posted!', 'success');

        return redirect($thread->path());
    }
}
