<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'Appointments'
        );
        return view('appointments.appointments')->with($content);
    }
}
