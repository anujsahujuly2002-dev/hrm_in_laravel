<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicineeController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'Medicines'
        );
        return view('medicine.allmedicines')->with($content);
    }
}
