<?php

namespace App\Console\Commands;

use App\User;
use App\Board;
use App\Video;
use App\Thread;
use App\Domain\Blog\Models\Article;
use App\Playlist;
use Illuminate\Console\Command;

class ResyncSearchableModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'searchable:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync searchable models with Algolia';

    protected $searchable = [
        Article::class,
        Thread::class,
        Board::class,
        User::class,
        Playlist::class,
        Video::class,
    ];

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Flush the index
        foreach ($this->searchable as $model) {
            $this->call("scout:flush", ['model' => $model]);
        }

        // Rebuild the index
        foreach ($this->searchable as $model) {
            $this->call("scout:import", ['model' => $model]);
        }
    }
}
