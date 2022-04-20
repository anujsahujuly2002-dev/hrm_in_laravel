<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $name, $contact, $email, $department, $image, $username, $password, $address;

    public $doctor = null, $doctor_user_id = null;
    public function mount(Request $request)
    {
        if($request->query('doctor_id')){
            $this->doctor = Doctor::find($request->query('doctor_id'));
            $this->name = $this->doctor->name;
            $this->contact = $this->doctor->contact;
            $this->email = $this->doctor->email;
            $this->department = $this->doctor->department;
            $this->address = $this->doctor->address;
            $this->doctor_user_id = $this->doctor->user_id;
        }
    }

    public function create()
    {

        if($this->doctor == null){
            $this->validate([
                'username' => 'nullable|unique:users,username',
                'password' => 'required_with:username',
                'name' => 'required',
                'email' => 'required|',
                'contact' => 'required',
                'address' => 'required',
                'department' => 'required',
            ]);

            $imagename = null;
            if ($this->image) {
                $imagename = time() . '.png';
                $this->image->storeAs('public/doctor', $imagename);
            }

            Doctor::create([
                'name' => ucwords($this->name),
                'contact' => $this->contact,
                'email' => strtolower($this->email),
                'department' => ucwords($this->department),
                'image' => $imagename,
                'address' => ucwords($this->address),
            ]);

            if ($this->username) {
                User::create([
                    'name' => ucwords($this->name),
                    'username' => strtolower($this->username),
                    'email' => strtolower($this->email),
                    'password' => bcrypt($this->password),
                    'role' => 2,
                ]);

                $get_user = User::where('username', strtolower($this->username))->latest()->first();
                $get_doc = Doctor::where('email', strtolower($this->email))->where('contact', $this->contact)->latest()->first();

                Doctor::where('id', $get_doc->id)->update([
                    'user_id' => $get_user->id,
                ]);
            }
        }
        else{
            $this->validate([
                'username' => 'nullable|unique:users,username',
                'password' => 'required_with:username',
                'name' => 'required',
                'email' => 'required',
                'contact' => 'required',
                'address' => 'required',
                'department' => 'required',
            ]);

            $imagename = $this->doctor->image;
            if ($this->image) {
                if ($this->doctor->image) {
                    $imagename = $this->doctor->image;
                }
                else{
                    $imagename = time() . '.png';
                }
                $this->image->storeAs('public/doctor', $imagename);
            }

            Doctor::where('id', $this->doctor->id)->update([
                'name' => ucwords($this->name),
                'contact' => $this->contact,
                'email' => strtolower($this->email),
                'department' => ucwords($this->department),
                'image' => $imagename,
                'address' => ucwords($this->address),
            ]);

            if ($this->doctor_user_id == null) {
                User::create([
                    'name' => ucwords($this->name),
                    'username' => strtolower($this->username),
                    'email' => strtolower($this->email),
                    'password' => bcrypt($this->password),
                    'role' => 2,
                ]);

                $get_user = User::where('username', strtolower($this->username))->latest()->first();
                // $get_doc = Doctor::where('email', strtolower($this->email))->where('contact', $this->contact)->latest()->first();

                Doctor::where('id', $this->doctor->id)->update([
                    'user_id' => $get_user->id,
                ]);
            }
        }

        session()->flash('success', 'Dr. ' . ucwords($this->name) . ' details saved.');
        return redirect()->route('doctor.index');
    }

    public function render()
    {
        return view('livewire.doctor.create');
    }
}
