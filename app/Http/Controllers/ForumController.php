<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Thread;
use App\Nova\Thread as AppThread;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller
{
    protected $allowedQueryParams = [
        'all' => 'all',
        'mine' => "mine",
        'popular' => "popular",
        'latest' => 'latest',
    ];

    public function __construct()
    {
        $this->allowedQueryParams = collect($this->allowedQueryParams);
    }

    public function __invoke(Request $request)
    {
        if ($request->has('q') && $this->allowedQueryParams->has($request->query('q'))) {
            $threads = $this->getCustomThreads();
        } else {
            $threads = $this->getStandardThreads();
        }

        $boards = Board::public()
                    ->latest()
                    ->withCount('threads')
                    ->take(6)
                    ->get();

        return view('forum.index', [
            'boards' => $boards,
            'threads' => $threads
        ]);
    }

    protected function getStandardThreads()
    {
        return Thread::latest()
                ->with(['user', 'board'])
                ->simplePaginate(20);
    }

    public function getCustomThreads()
    {
        $filter = $this->allowedQueryParams[request('q')];

        switch ($filter) {
            case 'all':
                $threads = Thread::latest()
                            ->with(['user', 'board'])
                            ->simplePaginate(20);
                break;

            case 'mine':
                if (auth()->check()) {
                    $threads = auth()->user()->threads()->with(['user', 'board'])->latest()->simplePaginate(20);
                } else {
                    $threads = Thread::where('user_id', null)->simplePaginate(20);
                }
                break;

            case 'popular':
                
                $threads = Thread::with(['user', 'board'])
                            ->withCount('replies')
                            ->orderBy('replies_count', 'desc')
                            ->simplePaginate(20);
                break;

            case 'latest':
                $threads = Thread::latest()
                            ->with(['user', 'board'])
                            ->simplePaginate(20);
                break;
                
            default:
                $threads = Thread::latest()
                            ->with(['user', 'board'])
                            ->simplePaginate(20);
                break;
        }

        return $threads;
    }
}
