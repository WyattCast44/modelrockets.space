<?php

namespace App\Http\Controllers;

use Cloudder;
use App\Board;
use App\Thread;
use App\Attachment;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Requests\CreateThreadRequest;

class ThreadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'deleter']);
        
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

        if ($thread->board->id <> $board->id) {
            return abort(404);
        }

        $thread->load(['attachments', 'board', 'replies', 'user']);

        $replies = $thread->replies()->with('attachments')->paginate(10);

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
            $this->uploadAttachments($request, $thread);
        }

        $thread->load(['attachments', 'user']);

        return redirect()->route('threads.show', ['board' => $board, 'thread' => $thread]);
    }

    public function destroy(Board $board, Thread $thread)
    {
        if (auth()->id() <> $thread->user->id) {
            return abort(403);
        }

        $thread->delete();

        return redirect($board->path('show'));
    }

    protected function uploadAttachments(CreateThreadRequest $request, Thread $thread)
    {
        foreach ($request->attachments as $attachment) {
            Cloudder::upload($attachment->getRealPath(), null);

            Attachment::create([
                'user_id' => auth()->id(),
                'attachable_id' => $thread->id,
                'attachable_type' => Thread::class,
                'filename' => '',
                'vendor_id' => Cloudder::getPublicId(),
                'path' => Cloudder::secureShow(Cloudder::getPublicId()),
                'available' => true,
            ]);
        };
    }
}
