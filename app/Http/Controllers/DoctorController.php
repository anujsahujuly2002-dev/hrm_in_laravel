<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'Doctors'
        );
        return view('doctor.alldoctors')->with($content);
    }

    public function create()
    {
        $content = array(
            'title' => 'Add Doctor'
        );
        return view('doctor.create')->with($content);
    }
}
