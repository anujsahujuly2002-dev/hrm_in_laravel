<?php

namespace App\Http\Livewire\Disease;

use App\Models\Disease;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public function create()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Disease::create([
            'name' => ucwords($this->name),
        ]);
        session()->flash('success', ucwords($this->name) . ' saved.');
    }

    public function render()
    {
        return view('livewire.disease.create');
    }
}
