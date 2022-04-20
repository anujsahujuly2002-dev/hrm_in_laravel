<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'Patients'
        );
        return view('patient.allpatients')->with($content);
    }

    public function receipt()
    {
        $content = array(
            'title' => 'Receipt'
        );
        return view('patient.receipt')->with($content);
    }

    public function create()
    {
        $content = array(
            'title' => 'Add new patient'
        );
        return view('patient.create')->with($content);
    }

    public function checkup()
    {
        $content = array(
            'title' => 'Patient Checkup'
        );
        return view('patient.checkup')->with($content);
    }
}
