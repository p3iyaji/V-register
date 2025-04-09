<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;

class VisitorsList extends Component
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
        $this->visitors = Visitor::paginate($this->perPage);
    }

    public function mySearch()
    {
        $this->search = $this->search;
    }

    protected function applySearch($query)
    {
        if ($this->search !== null) {
            return $query->where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('company_name', 'like', '%' . $this->search . '%')
                ->orWhere('check_in', 'like', '%' . $this->search . '%')
                ->orWhere('check_out', 'like', '%' . $this->search . '%')
                ->orWhere('national_id_no', 'like', '%' . $this->search . '%')
                ->orWhere('gender', 'like', '%' . $this->search . '%')
                ->orWhere('type', 'like', '%' . $this->search . '%')
                  // For date searching
                ->orWhereDate('created_at', $this->search)
                ->orWhere(DB::raw("DATE_FORMAT(created_at, '%d %b %Y')"), 'like', '%' . $this->search . '%')
                ->orWhere(DB::raw("DATE_FORMAT(created_at, '%e %b %Y')"), 'like', '%' . $this->search . '%');
        }
        return $query;
    }


    public function render()
    {
        //logger('search_value:', ['search' => $this->search]);

        $visitors = $this->applySearch(Visitor::query())
            ->orderBy('created_at', 'desc')->paginate($this->perPage);

        return view('livewire.visitors-list', ['visitors' => $visitors]);
    }

}
