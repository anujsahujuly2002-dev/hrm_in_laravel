<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecordsController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'Records'
        );
        return view('records.recordsindex')->with($content);
    }
}
