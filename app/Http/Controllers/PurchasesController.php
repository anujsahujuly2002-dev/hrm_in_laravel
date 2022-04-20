<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'Purchase'
        );
        return view('purchases.allpurchases')->with($content);
    }

    public function new()
    {
        $content = array(
            'title' => 'New Purchase'
        );
        return view('purchases.newpurchase')->with($content);
    }
}
