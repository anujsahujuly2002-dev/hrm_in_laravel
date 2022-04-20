<?php

namespace App\Http\Livewire\Purchases;

use App\Models\Dealer;
use App\Models\Medicine;
use App\Models\MedicineRate;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Carbon\Carbon;
use Illuminate\Queue\NullQueue;
use Livewire\Component;

class Newpurchase extends Component
{
    public $dealers = [], $date, $purchase_data = null, $purchase_id;
    public function mount()
    {
        $this->dealers = Dealer::all()->sortBy('name');
        $this->date = Carbon::parse(Carbon::now())->format('Y-m-d');

        $count_p = Purchase::count();
        if($count_p > 0){
            $last_purchase = Purchase::where('status', true)->latest()->first();
            if ($last_purchase) {
                Purchase::create([
                    'date' => Carbon::parse(Carbon::now())->format('Y-m-d'),
                ]);
            }
        }
        else{
            Purchase::create([
                'date' => Carbon::parse(Carbon::now())->format('Y-m-d'),
            ]);
        }
        $this->purchase_data = Purchase::where('status', false)->latest()->first();
        $this->purchase_id = $this->purchase_data->id;
        if($this->purchase_data->dealer_id != null) {
            $this->dealer = $this->purchase_data->dealer_id;
            $this->getDealer();
        }
    }

    public $dealer_data = null, $dealer;
    public function getDealer()
    {
        $this->dealer_data = Dealer::find($this->dealer);
        $this->medicine_type = '';
        $this->meds = [];
        $this->getMeds();
    }

    public $meds = [], $medicine_type, $medicine;
    public function getMeds()
    {
        $this->validate([
            'dealer' => 'required',
            'date' => 'required',
        ]);

        $this->meds = [];
        $this->meds = Medicine::where('med_type', $this->medicine_type)->orderBy('name', 'ASC')->get();
    }

    public $unit, $med_data = null;
    // public function getMed()
    // {
    //     $this->validate([
    //         'medicine_type' => 'required',
    //     ]);

    //     $this->med_data = Medicine::find($this->medicine);
    //     $this->unit = $this->med_data->unit;
    // }

    public $quantity, $total;
    public function addItems($id)
    {
        $this->validate([
            'medicine' => 'required',
            'quantity' => 'required|numeric|min:1',
            'total' => 'required|numeric|min:1',
            'purchase_id' => 'required',
        ]);

        $per_unit = $this->total / $this->quantity;

        PurchaseItem::create([
            'purchase_id' => $id,
            'dealer_id' => $this->dealer,
            'medicine_id' => $this->medicine,
            'qty' => $this->quantity,
            'unit' => strtoupper($this->unit),
            'rate' => $this->total,
            'price_per_unit' => round($per_unit),
            'date' => Carbon::parse(Carbon::now())->format('Y-m-d'),
        ]);

        Purchase::where('id', $id)->update([
            'dealer_id' => $this->dealer,
        ]);
    }

    public function delete($id)
    {
        $del = PurchaseItem::find($id);
        $del->delete();
    }

    public $paid_amount, $balanced_amount;
    public function getBal()
    {
        $this->validate([
            'total_amount' => 'required|numeric|min:1',
        ]);

        $this->balanced_amount = $this->total_amount - $this->paid_amount;
    }

    public function submit($id)
    {
        $this->validate([
            'dealer' => 'required',
            'date' => 'required',
            'total_amount' => 'required|numeric|min:1',
            'paid_amount' => 'required|numeric|min:0',
            'balanced_amount' => 'required|numeric|min:0',
        ]);

        Purchase::where('id', $id)->update([
            'dealer_id' => $this->dealer,
            'total' => $this->total_amount,
            'paid' => $this->paid_amount,
            'remain' => $this->balanced_amount,
            'status' => true,
            'date' => Carbon::parse($this->date)->format('Y-m-d'),
        ]);

        $dealer = Dealer::find($this->dealer);
        $dealer->current_balance = $dealer->current_balance + $this->balanced_amount;
        $dealer->save();

        $ps = PurchaseItem::where('purchase_id', $id)->get();
        foreach($ps as $item) {
            $med = Medicine::find($item->medicine_id);
            if($med->stock>0)
            {
                $mr = MedicineRate::create([
                    'purchase_id' => $id,
                    'purchase_item_id' => $item->id,
                    'dealer_id' => $this->dealer,
                    'medicine_id' => $item->medicine_id,
                    'purchase_rate' => $item->price_per_unit,
                    'open_stock' => $item->qty,
                    'sold_stock' => 0,
                    'remain_stock' => $item->qty,
                    'status' => 'Pending',
                ]);
            }
            else
            {
                $mr = MedicineRate::create([
                    'purchase_id' => $id,
                    'purchase_item_id' => $item->id,
                    'dealer_id' => $this->dealer,
                    'medicine_id' => $item->medicine_id,
                    'purchase_rate' => $item->price_per_unit,
                    'open_stock' => $item->qty,
                    'sold_stock' => 0,
                    'remain_stock' => $item->qty,
                    'status' => 'Active',
                ]);
            }

            $med->stock = $med->stock + $item->qty;
            $med->save();
        }

        session()->flash('success', 'Purchase data saved');
        return redirect()->route('purchase.index');
    }

    public $total_amount;
    public function render()
    {
        $data = PurchaseItem::where('purchase_id', $this->purchase_id)->orderBy('id', 'DESC')->get();

        $total = 0;
        foreach($data as $item) {
            $total = $total + $item->rate;
        }

        $this->total_amount = $total;
        return view('livewire.purchases.newpurchase', ['data' => $data]);
    }
}
