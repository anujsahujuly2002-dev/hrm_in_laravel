<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $name_of_patient, $address_of_patient, $gender_of_patient, $contact_of_patient, $email_of_patient, $dob_of_patient, $age_of_patient, $allergy_of_patient, $image_of_patient, $balance_of_patient;

    public $patient_data = null;
    public function mount(Request $request)
    {
        if($request->query('patient_id')){
            $this->patient_data = Patient::find($request->query('patient_id'));
            $this->name_of_patient = $this->patient_data->name;
            $this->address_of_patient = $this->patient_data->address;
            $this->gender_of_patient = $this->patient_data->gender;
            $this->email_of_patient = $this->patient_data->email;
            $this->dob_of_patient = $this->patient_data->dob;
            $this->getAge();
            $this->contact_of_patient = $this->patient_data->contact;
            $this->balance_of_patient = $this->patient_data->balance;
            $this->allergy_of_patient = $this->patient_data->allergy;
        }
    }

    public function getAge()
    {
        $this->age_of_patient = Carbon::parse($this->dob_of_patient)->age;
    }


    public function createPatient(Request $request)
    {
        $this->validate([
            'name_of_patient' => 'required',
            'address_of_patient' => 'required',
            'gender_of_patient' => 'required',
            'image_of_patient' => 'nullable|image|mimes:png,jpg',
            'email_of_patient' => 'nullable|email',
            'dob_of_patient' => 'required',
            'age_of_patient' => 'required',
            'contact_of_patient' => 'required|numeric',
            'balance_of_patient' => 'required|numeric',
        ]);

        if($this->patient_data != null){
            $imagename = $this->patient_data->image;
            if ($this->image_of_patient) {
                if ($this->patient_data->image) {
                    $imagename = $this->patient_data->image;
                    if($this->patient_data->image == 'default.png'){
                        $imagename = time() . '.png';
                    }
                }
                else{
                    $imagename = time() . '.png';
                }
                $this->image_of_patient->storeAs('public/patients', $imagename);
            }

            $pat = Patient::where('id', $this->patient_data->id)->update([
                'name' => ucwords($this->name_of_patient),
                'address' => ucwords($this->address_of_patient),
                'gender' => $this->gender_of_patient,
                'contact' => $this->contact_of_patient,
                'email' => strtolower($this->email_of_patient),
                'dob' => Carbon::parse($this->dob_of_patient)->format('Y-m-d'),
                'allergy' => ucfirst($this->allergy_of_patient),
                'image' => $imagename,
                'balance' => $this->balance_of_patient,
            ]);
        }
        else{
            $imagename = 'default.png';
            if ($this->image_of_patient) {
                $imagename = time() . '.png';
                $this->image_of_patient->storeAs('public/patients', $imagename);
            }

            $pat = Patient::create([
                'name' => ucwords($this->name_of_patient),
                'address' => ucwords($this->address_of_patient),
                'gender' => $this->gender_of_patient,
                'contact' => $this->contact_of_patient,
                'email' => strtolower($this->email_of_patient),
                'dob' => Carbon::parse($this->dob_of_patient)->format('Y-m-d'),
                'allergy' => ucfirst($this->allergy_of_patient),
                'image' => $imagename,
                'balance' => $this->balance_of_patient,
            ]);
        }

        session()->flash('success', 'Patient details saved.');
        return redirect()->route('patient.index');
    }

    public function render()
    {
        return view('livewire.patient.create');
    }
}
