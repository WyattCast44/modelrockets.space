<?php

namespace App\Http\Livewire\Articles;

use App\Domain\Blog\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleIndex extends Component
{
    use WithPagination;

    public $search = "";

    public $perPage = 10;

    protected $queryString  = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'livewire.partials.pagination';
    }

    public function articles()
    {
        if ($this->search == '') {
            $articles = Article::published()
                ->orderBy('published_at', 'desc')
                ->paginate($this->perPage);
        } else {
            $articles = Article::search($this->search)
                ->paginate($this->perPage);
        }

        $articles->load(['user']);

        return $articles;
    }

    public function render()
    {
        return view('articles.index', [
            'articles' => $this->articles(),
        ])->extends('layouts.app')->section('content');
    }
}
