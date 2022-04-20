<?php

namespace App\Http\Livewire\Util;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Changepassword extends Component
{
    public $current_password, $new_password, $confirm_password;

    public function update()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);

        $account = User::find(Auth::user()->id);
        if(Hash::check($this->current_password, $account->password)){
            $account->password = bcrypt($this->confirm_password);
            $account->save();
            session()->flash('success', 'Password changed');

            $this->current_password = '';
            $this->new_password = '';
            $this->confirm_password = '';
        }
        else{
            session()->flash('error', 'Current password does not matched');
        }
    }

    public function render()
    {
        return view('livewire.util.changepassword');
    }
}
