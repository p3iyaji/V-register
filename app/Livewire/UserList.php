<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function mount() 
    {
        $this->users = User::paginate($this->perPage);
    }

    public function mySearch()
    {
        $this->search = $this->search;
    }

    public function changeStatus($id)
    {
        $user = User::find($id);
        $user->is_active = $user->is_active === 1 ? 0 : 1;
        $user->save();
    }

    protected function applySearch($query)
    {
        if ($this->search !== null) {
            return $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('role', 'like', '%' . $this->search . '%');
        }
        return $query;
    }

    public function render()
    {
        //logger('search_value:', ['search' => $this->search]);

        $users = $this->applySearch(User::query())
            ->paginate($this->perPage);

        return view('livewire.user-list', ['users' => $users]);
    }
}
