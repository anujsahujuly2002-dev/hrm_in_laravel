<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function dashboard()
    {
        $content = array(
            'title' => 'Dashboard'
        );
        return view('billing.dashboard')->with($content);
    }

    public function patient()
    {
        $content = array(
            'title' => 'Patient'
        );
        return view('billing.patient')->with($content);
    }

    public function patients()
    {
        $content = array(
            'title' => 'Patients'
        );
        return view('billing.patients')->with($content);
    }

    public function copayer()
    {
        $content = array(
            'title' => 'Copayer'
        );
        return view('billing.copayer')->with($content);
    }

    public function copayers()
    {
        $content = array(
            'title' => 'Copayers'
        );
        return view('billing.copayers')->with($content);
    }

    public function invoice()
    {
        $content = array(
            'title' => 'Invoice'
        );
        return view('billing.invoice')->with($content);
    }

    public function payments()
    {
        $content = array(
            'title' => 'Payments'
        );
        return view('billing.payments')->with($content);
    }

    public function sploffers()
    {
        $content = array(
            'title' => 'Special Offers'
        );
        return view('billing.sploffers')->with($content);
    }
}
