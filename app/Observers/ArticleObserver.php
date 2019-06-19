<?php

namespace App\Observers;

use App\Thread;
use App\Article;
use App\Board;

class ArticleObserver
{
    public function created(Article $article)
    {
        // Get the articles board
        $board = Board::where('name', 'Article Discussions')->first();

        // Create a new thread about this article
        $thread = Thread::create([
            'user_id' => $article->user->id,
            'board_id' => $board->id,
            'title' => $article->title,
            'body' => "This thread was opened by the Articles Bot (🤖) for discussion about the following article: <a href='{$article->path($article)}'>{$article->title}</a>",
            'open' => true,
        ]);

        $article->update([
            'thread_id' => $thread->id,
        ]);
    }
}
