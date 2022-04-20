<?php

namespace App\Http\Livewire\Opd;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;

class Opdetails extends Component
{
    use WithFileUploads;

    public $opd = null;
    public $name, $doctor, $degree, $speciality, $email, $mobile, $landline, $address, $image;

    public function loadData()
    {
        $this->name = $this->opd->name;
        $this->doctor = $this->opd->doctor_name;
        $this->degree = $this->opd->doctor_degree;
        $this->speciality = $this->opd->opd_spl;
        $this->email = $this->opd->email;
        $this->mobile = $this->opd->mobile;
        $this->landline = $this->opd->landline;
        $this->address = $this->opd->address;
    }

    public function mount()
    {
        $this->opd = Company::find(1);
        $this->loadData();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'doctor' => 'required',
            'degree' => 'required',
            'speciality' => 'required',
            'address' => 'required',
        ]);

        $imagename = null;
        if ($this->image) {
            $imagename = 'logo.png';
            $this->image->storeAs('public/opd', $imagename);
        }

        Company::where('id', $this->opd->id)->update([
            'name' => ucwords($this->name),
            'doctor_name' => ucwords($this->doctor),
            'doctor_degree' => ucwords($this->degree),
            'opd_spl' => ucwords($this->speciality),
            'email' => strtolower($this->email),
            'mobile' => $this->mobile,
            'landline' => $this->landline,
            'address' => ucwords($this->address),
            'logo' => $imagename,
        ]);

        session()->flash('success', 'OPD details saved.');
        $this->opd = Company::find(1);
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.opd.opdetails');
    }
}
