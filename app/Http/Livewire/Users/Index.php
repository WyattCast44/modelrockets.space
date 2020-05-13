<?php

namespace App\Http\Livewire\Users;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    public $search = "";

    public $perPage = 15;

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
        return view('livewire.users.index', [
            'users' => $this->users(),
        ]);
    }

    public function users()
    {
        if ($this->search == '') {
            $users = User::public()
                        ->paginate($this->perPage);
        } else {
            // Searchable users are by default public
            $users = User::search($this->search)                            
                        ->paginate($this->perPage);            
        }

        return $users;
    }
}
