<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Visitor;
use Livewire\Attributes\On;

class VisitorTypeSelector extends Component
{

    public $showSearch = false;
    public $visitor;
    public $search = '';
    public $searchResults = [];


    #[On('toggleSearch')]
    public function toggleSearch()
    {
        $this->showSearch = !$this->showSearch;
        $this->search = '';
        $this->visitor = null;
        $this->searchResults = [];
    }

    public function searchVisitor()
    {
        $this->validate([
            'search' => 'required|min:2'
        ]);

        $searchResults = Visitor::with('employee')
        ->where('type', 'pre_registered')
        ->where(function($query) {
            $query->where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('company_name', 'like', '%' . $this->search . '%')
                ->orWhereHas('employee', function($q) {
                    $q->where('name', 'like', '%'.$this->search.'%');
                })
                ->orWhereDate('created_at', $this->search)
                ->orWhere(DB::raw("DATE_FORMAT(created_at, '%d %b %Y')"), 'like', '%' . $this->search . '%')
                ->orWhere(DB::raw("DATE_FORMAT(created_at, '%e %b %Y')"), 'like', '%' . $this->search . '%');
        })->limit(10)
        ->get();

        $this->searchResults = $searchResults;


    }
    


    public function render()
    {
        return view('livewire.visitor-type-selector', ['searchResults' => $this->searchResults]);
    }
}
