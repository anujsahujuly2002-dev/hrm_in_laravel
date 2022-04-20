<?php

namespace App\Http\Livewire\Payment;

use App\Models\Checkup;
use App\Models\CheckupItem;
use App\Models\Payments;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Receivepayment extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $header='',$pname='',$medList=[];
    public $conCH = 0, $medCH = 0, $amount = 0;
    public $cId;

    public function meds($checkupId)
    {
        $this->cId = $checkupId;
        $this->header = 'Meds';
        $check=Checkup::find($checkupId);
        $this->pname = $check->patients->name;
        $this->medList=CheckupItem::where('checkup_id',$checkupId)->get();
    }

    public function pay($checkupId)
    {
        $this->cId = $checkupId;
        $this->header = 'Payment';
        $check=checkup::find($checkupId);
        $this->pname = $check->patients->name;
        $this->conCH = $check->consulting_charges;
        $this->medCH = $check->medicine_charges;
        $this->amount = $check->total_charges;
    }

    public function savePay()
    {
        $check=Checkup::find($this->cId);
        $check->status='Inactive';
        $check->save();
        Payments::create([
            'date'=> Carbon::now(),
            'amount'=>$this->amount,
            'patient_id'=>$check->patient_id,
            'checkup_id'=>$check->id,
            'note'=>'Amount Received From Patient',
        ]);

        $this->pname =0;
        $this->conCH =0;
        $this->medCH =0;
        $this->amount =0;
        $this->header='';
    }

    public function render()
    {
        $data = Checkup::where('status','Pending')->orderBy('date', 'DESC')->paginate(10);
        return view('livewire.payment.receivepayment', ['data' => $data]);
    }
}
