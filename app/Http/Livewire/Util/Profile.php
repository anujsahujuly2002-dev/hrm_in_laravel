<?php

namespace App\Http\Livewire\Util;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $profile = null, $doctor = null;
    public $name, $email, $username;
    public $doctor_name, $doctor_contact, $doctor_email, $doctor_department, $doctor_image, $doctor_address;
    public function mount()
    {
        $this->profile = User::find(Auth::user()->id);
        $this->name = $this->profile->name;
        $this->username = $this->profile->username;
        $this->email = $this->profile->email;

        // Doctor
        if(Auth::user()->role == 2){
            $this->doctor = Doctor::where('user_id', Auth::user()->id)->first();
            $this->doctor_name = $this->doctor->name;
            $this->doctor_contact = $this->doctor->contact;
            $this->doctor_email = $this->doctor->email;
            $this->doctor_department = $this->doctor->department;
            $this->doctor_address = $this->doctor->address;
        }
    }

    public function create()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'username' => 'required|unique:users,username,' . Auth::user()->id,
        ]);

        User::where('id', Auth::user()->id)->update([
            'name' => ucwords($this->name),
            'username' => strtolower($this->username),
            'email' => strtolower($this->email),
        ]);

        session()->flash('success', 'Profile updated.');
        return redirect()->route('utility.index');
    }

    public function update()
    {
        $this->validate([
            'doctor_name' => 'required',
            'doctor_email' => 'required',
            'doctor_contact' => 'required',
            'doctor_address' => 'required',
            'doctor_department' => 'required',
        ]);

        $imagename = $this->doctor->image;
        if ($this->doctor_image) {
            if ($this->doctor->image) {
                $imagename = $this->doctor->image;
            } else {
                $imagename = time() . '.png';
            }
            $this->doctor_image->storeAs('public/doctor', $imagename);
        }

        Doctor::where('id', $this->doctor->id)->update([
            'name' => ucwords($this->doctor_name),
            'contact' => $this->doctor_contact,
            'email' => strtolower($this->doctor_email),
            'department' => ucwords($this->doctor_department),
            'image' => $imagename,
            'address' => ucwords($this->doctor_address),
        ]);

        session()->flash('success', 'Doctor profile updated.');
        return redirect()->route('utility.index');
    }

    public function render()
    {
        return view('livewire.util.profile');
    }
}
