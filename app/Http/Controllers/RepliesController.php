<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Board;
use App\Thread;
use App\Attachment;
use JD\Cloudder\Facades\Cloudder;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Requests\NewReplyRequest;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
        $this->middleware(ProtectAgainstSpam::class)->only(['store']);
    }

    public function create(Board $board, Thread $thread, $parentId = null)
    {
        if (!$thread->open) {
            alert('Thread Locked!', "This thread's author has locked this thread, and no new replies can be posted at this time.", 'warning');
            
            return back();
        }
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

    public function store(Board $board, Thread $thread, NewReplyRequest $request)
    {
        $reply = Reply::create([
            'user_id' => auth()->id(),
            'thread_id' => $thread->id,
            'body' => $request->body,
            'parent_id' => ($request->parent_id) ? $request->parent_id : null
        ]);

        if ($request->hasFile('attachments')) {
            $this->uploadAttachments($request, $reply);
        }

        toast('Reply Posted!', 'success');

        return redirect($thread->path());
    }

    protected function uploadAttachments(NewReplyRequest $request, Reply $reply)
    {
        foreach ($request->attachments as $attachment) {
            Cloudder::upload($attachment->getRealPath(), null);

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
}
