<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'Reports'
        );
        return view('reports.reportsindex')->with($content);
    }

    public function report($report)
    {
        $content = array(
            'title' => $report,
        );
        return view('reports.report')->with($content);
    }
}
