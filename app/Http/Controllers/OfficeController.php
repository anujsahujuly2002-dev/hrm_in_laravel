<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function contacts()
    {
        $content = array(
            'title' => 'Contacts'
        );
        return view('office.contacts')->with($content);
    }

    public function tasks()
    {
        $content = array(
            'title' => 'Tasks'
        );
        return view('office.tasks')->with($content);
    }

    public function notes()
    {
        $content = array(
            'title' => 'Notes'
        );
        return view('office.notes')->with($content);
    }

    public function documents()
    {
        $content = array(
            'title' => 'Documents'
        );
        return view('office.documents')->with($content);
    }
}
