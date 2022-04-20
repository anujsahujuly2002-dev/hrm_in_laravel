<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use Livewire\Component;

class Alldoctors extends Component
{
    public $doctors = [];

    public function mount()
    {
        $this->doctors = Doctor::all()->sortBy('name');
    }

    public function render()
    {
        return view('livewire.doctor.alldoctors');
    }
}
