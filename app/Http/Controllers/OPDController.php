<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OPDController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'OPD'
        );
        return view('opd.opdetails')->with($content);
    }
}
