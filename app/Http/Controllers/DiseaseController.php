<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'Diseases'
        );
        return view('disease.alldiseases')->with($content);
    }

    public function dmRelation()
    {
        $content = array(
            'title' => 'DM Relations'
        );
        return view('dm.relations')->with($content);
    }
}
