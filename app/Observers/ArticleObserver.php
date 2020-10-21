<?php

namespace App\Observers;

use App\Domain\Blog\Models\Article;
use App\Events\ArticleDeleted;

class ArticleObserver
{
    /**
     * Handle the article "created" event.
     *
     * @param  \App\Domain\Blog\Models\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
        //
    }

    /**
     * Handle the article "updated" event.
     *
     * @param  \App\Domain\Blog\Models\Article  $article
     * @return void
     */
    public function updated(Article $article)
    {
        //
    }

    /**
     * Handle the article "deleted" event.
     *
     * @param  \App\Domain\Blog\Models\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        event(new ArticleDeleted($article));
    }

    /**
     * Handle the article "restored" event.
     *
     * @param  \App\Domain\Blog\Models\Article  $article
     * @return void
     */
    public function restored(Article $article)
    {
        //
    }

    /**
     * Handle the article "force deleted" event.
     *
     * @param  \App\Domain\Blog\Models\Article  $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        //
    }
}
