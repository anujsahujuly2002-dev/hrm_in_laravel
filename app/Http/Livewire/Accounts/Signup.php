<?php

namespace App\Http\Livewire\Accounts;

use App\Models\User;
use Livewire\Component;

class Signup extends Component
{
    public $name, $email, $password, $username;
    public function create()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'username' => 'required',
        ]);

        User::create([
            'name' => ucwords($this->name),
            'username' => strtolower($this->username),
            'email' => strtolower($this->email),
            'password' => bcrypt($this->password),
            'role' => 1,
        ]);

        return redirect()->route('accounts.login');
    }

    public function render()
    {
        return view('livewire.accounts.signup');
    }
}
