<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $content = array(
            'title' => 'Dashboard'
        );
        return view('home.dashboard')->with($content);
    }
}
