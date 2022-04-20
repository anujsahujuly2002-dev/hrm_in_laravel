<?php

namespace App\Http\Livewire\Reports;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Report extends Component
{
    public $data=[];

    public function loadReport($reportname)
    {
        if($reportname== 'Patient Fees Details')
        {

        }
    }

    public function render()
    {
        $url= URL::current();
        $arr=explode('/',$url);
        $head=str_replace('%20',' ', $arr[5]);

        return view('livewire.reports.report',['url'=>$head]);
    }
}
