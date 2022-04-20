<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'Administration'
        );
        return view('admin.adminindex')->with($content);
    }
}
