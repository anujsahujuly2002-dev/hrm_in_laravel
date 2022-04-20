<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class Allpatients extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public function render()
    {
        $data = Patient::orderBy('name', 'ASC')->paginate(10);
        if($this->search){
            $data = Patient::where('name', 'like', '%' . $this->search . '%')->orWhere('contact', 'like', '%' . $this->search . '%')->orderBy('name', 'ASC')->paginate(10);
        }
        return view('livewire.patient.allpatients', ['data' => $data]);
    }
}
