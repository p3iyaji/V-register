<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EmployeesList extends Component
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
        $this->users = DB::table('users')
        ->where('role', 'employee')
        ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
        ->select('users.*', 'departments.name as department_name')
        ->paginate($this->perPage);
    }

    public function mySearch()
    {
        $this->search = $this->search;
    }

    protected function applySearch($query)
    {
        if ($this->search) {
            return $query->where(function($q) {
                $q->where('users.name', 'like', '%' . $this->search . '%')
                ->orWhere('users.email', 'like', '%' . $this->search . '%')
                ->orWhere('users.phone', 'like', '%' . $this->search . '%')
                ->orWhere('departments.name', 'like', '%' . $this->search . '%');
            });
        }
        return $query;
    }

    public function changeStatus($id)
    {
        $user = User::find($id);
        $user->is_active = $user->is_active === 1 ? 0 : 1;
        $user->save();
    }

    public function render()
    {
        //logger('search_value:', ['search' => $this->search]);

        $users = DB::table('users')
        ->where('role', 'employee')
        ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
        ->select('users.*', 'departments.name as department_name');

        // Apply search if needed
        $users = $this->applySearch($users)
            ->paginate($this->perPage);

        return view('livewire.employees-list', ['users' => $users]);
    }
}
