<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $content = array(
            'title' => 'Payments'
        );
        return view('Payment.ReceivePayment')->with($content);
    }
}
