<?php

namespace App\Console\Commands;

use App\User;
use App\Board;
use App\Video;
use App\Thread;
use App\Article;
use App\Playlist;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

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
    protected $description = 'Update the Laravel Scout sync';

    protected $searchable = [
        Article::class,
        Thread::class,
        Board::class,
        User::class,
        Playlist::class,
        Video::class,
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach ($this->searchable as $model) {
            $this->callSilent("scout:import", ['model' => $model]);
        }
    }
}