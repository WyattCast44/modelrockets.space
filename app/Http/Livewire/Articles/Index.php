<?php

namespace App\Http\Livewire\Articles;

use App\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    public $search = "";

    public $perPage = 10;

    protected $updatesQueryString = [
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

    public function render()
    {
        return view('livewire.articles.index', [
            'articles' => $this->articles(),
        ]);
    }

    public function articles()
    {
        if ($this->search == '') {
            $articles = Article::published()->paginate($this->perPage);
        } else {
            $articles = Article::search($this->search)->paginate($this->perPage);
        }

        return $articles;
    }
}
