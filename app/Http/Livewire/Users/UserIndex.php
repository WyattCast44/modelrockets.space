<?php

namespace App\Http\Livewire\Users;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $search = "";

    public $perPage = 15;

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

    public function render()
    {
        return view('users.index', [
            'users' => $this->users(),
        ])->extends('layouts.app')->section('content');
    }

    public function users()
    {
        if ($this->search == '') {
            $users = User::public()
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage);
        } else {
            // Searchable users are by default public
            $users = User::search($this->search)
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage);
        }

        return $users;
    }
}
