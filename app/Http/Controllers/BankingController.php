<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankingController extends Controller
{
    public function banks()
    {
        $content = array(
            'title' => 'Banks'
        );
        return view('banking.banks')->with($content);
    }

    public function bankaccounts()
    {
        $content = array(
            'title' => 'Bank Accounts'
        );
        return view('banking.bankaccounts')->with($content);
    }

    public function deposits()
    {
        $content = array(
            'title' => 'Deposits'
        );
        return view('banking.deposits')->with($content);
    }

    public function retrivals()
    {
        $content = array(
            'title' => 'Retrivals'
        );
        return view('banking.retrivals')->with($content);
    }

    public function transfers()
    {
        $content = array(
            'title' => 'Transfers'
        );
        return view('banking.transfers')->with($content);
    }

    public function reports()
    {
        $content = array(
            'title' => 'Reports'
        );
        return view('banking.reports')->with($content);
    }
}
