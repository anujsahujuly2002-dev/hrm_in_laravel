<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'Tests'
        );
        return view('tests.alltests')->with($content);
    }
}
