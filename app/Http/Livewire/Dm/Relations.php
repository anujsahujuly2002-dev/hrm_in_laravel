<?php

namespace App\Http\Livewire\Dm;

use App\Models\Disease;
use App\Models\DiseaseMedicine;
use App\Models\Medicine;
use Livewire\Component;

class Relations extends Component
{
    public $diseases = [], $medicines = [], $disease, $medicine, $search;
    public function mount()
    {
        $this->diseases = Disease::all()->sortBy('name');
        $this->medicines = Medicine::all()->sortBy('name');
    }

    public function searchMed()
    {
        if($this->search){
            $this->medicines = Medicine::where('name', 'like', '%' . $this->search . '%')->orderBy('name', 'ASC')->get();
        }
        else{
            $this->medicines = Medicine::all()->sortBy('name');
        }
    }

    public function create($id)
    {
        if($this->disease){
            $dm = DiseaseMedicine::where('disease', $this->disease)->where('medicine', $id)->first();
            if($dm){
                $dm->delete();
            }
            else{
                DiseaseMedicine::create([
                    'disease' => $this->disease,
                    'medicine' => $id,
                ]);
            }
            $this->search = '';
            $this->searchMed();
        }
        else{
            session()->flash('error', 'Select a disease first.');
            // $this->medicine = false;
        }
    }

    public function render()
    {
        return view('livewire.dm.relations');
    }
}
