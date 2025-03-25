<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;

class PreRegistersList extends Component
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
        $this->visitors = DB::table('visitors')
        ->where('type', 'pre_registered')
        ->leftJoin('users', 'visitors.employee_id', '=', 'users.id')
        ->select('visitors.*', 'users.name as employee_name')
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
                $q->where('visitors.first_name', 'like', '%' . $this->search . '%')
                  ->orWhere('visitors.last_name', 'like', '%' . $this->search . '%')
                  ->orWhere('visitors.email', 'like', '%' . $this->search . '%')
                  ->orWhere('visitors.phone', 'like', '%' . $this->search . '%')
                  ->orWhere('visitors.company_name', 'like', '%' . $this->search . '%')
                  ->orWhere('users.name', 'like', '%' . $this->search . '%')
                      // For date searching
                      ->orWhereDate('visitors.created_at', $this->search)
                      ->orWhere(DB::raw("DATE_FORMAT(visitors.created_at, '%d %b %Y')"), 'like', '%' . $this->search . '%')
                      ->orWhere(DB::raw("DATE_FORMAT(visitors.created_at, '%e %b %Y')"), 'like', '%' . $this->search . '%');
            });
        }
        return $query;
    }

    public function render()
    {
        $visitors = DB::table('visitors')
            ->where('visitors.type', 'pre_registered')
            ->leftJoin('users', 'visitors.employee_id', '=', 'users.id')
            ->select('visitors.*', 'users.name as employee_name');

        $visitors = $this->applySearch($visitors)
            ->orderBy('visitors.created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.pre-registers-list', ['visitors' => $visitors]);
    }


}
