<?php

namespace App\Http\Livewire\Appointments;

use App\Models\Appointment;
use Carbon\Carbon;
use Livewire\Component;

class Appointments extends Component
{

    public $todaysApo,$tomorrowApo,$dayafterApo;
    public function mount()
    {
        $this->todaysApo = Appointment::where('date', Carbon::parse(Carbon::now())->format('Y-m-d'))->get();
        $this->tomorrowApo = Appointment::where('date', Carbon::parse(Carbon::now()->addDays(1))->format('Y-m-d'))->get();
        $this->dayafterApo = Appointment::where('date', Carbon::parse(Carbon::now()->addDays(2))->format('Y-m-d'))->get();
    }

    public function render()
    {
        return view('livewire.appointments.appointments');
    }
}
