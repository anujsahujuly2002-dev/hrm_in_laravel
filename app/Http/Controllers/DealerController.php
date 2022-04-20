<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'Dealers'
        );
        return view('dealer.alldealers')->with($content);
    }
}
