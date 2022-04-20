<?php

namespace App\Http\Livewire\Accounts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username, $password;
    public function login(Request $request)
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $this->username, 'password' => $this->password])) {
            $request->session()->regenerate();
            return redirect()->route('index');
        } else {
            session()->flash('error', 'Invalid credentials.');
            return back();
        }
    }

    public function render()
    {
        return view('livewire.accounts.login');
    }
}
