<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Department;

class DepartmentList extends Component
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
        $this->departments = Department::paginate($this->perPage);
    }

    public function mySearch()
    {
        $this->search = $this->search;
    }

    protected function applySearch($query)
    {
        if ($this->search !== null) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        }
        return $query;
    }

    public function render()
    {
        //logger('search_value:', ['search' => $this->search]);

        $departments = $this->applySearch(Department::query())
            ->paginate($this->perPage);

        return view('livewire.department-list', ['departments' => $departments]);
    }
}
