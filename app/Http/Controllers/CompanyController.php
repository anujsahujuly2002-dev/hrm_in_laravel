<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'Company'
        );
        return view('company.companyindex')->with($content);
    }
}
