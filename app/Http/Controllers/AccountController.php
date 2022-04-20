<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function login()
    {
        $content = array(
            'title' => 'Login',
            'subtitle' => '',
        );
        return view('accounts.login')->with($content);
    }

    public function signup()
    {
        $users = User::all();
        if(count($users) > 0){
            return redirect()->route('index');
        }
        else{
            $content = array(
                'title' => 'Create an account',
                'subtitle' => '',
            );
            return view('accounts.signup')->with($content);
        }
    }

    public function setupStore()
    {
        $companies = Company::all();
        if(count($companies) > 0){
            return redirect()->route('index');
        }
        else{
            $content = array(
                'title' => 'Add Company',
                'subtitle' => 'Your company details',
            );
            return view('accounts.setup.company')->with($content);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('accounts.login')->with('success', 'Logged out!');
    }
}
