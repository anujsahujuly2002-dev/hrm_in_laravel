<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'Utility'
        );
        return view('util.utillist')->with($content);
    }

    public function addUser()
    {
        $content = array(
            'title' => 'Add user'
        );
        return view('util.adduser')->with($content);
    }

    public function profile()
    {
        $content = array(
            'title' => 'Profile update'
        );
        return view('util.profile')->with($content);
    }

    public function password()
    {
        $content = array(
            'title' => 'Change Password'
        );
        return view('util.changepassword')->with($content);
    }
}
