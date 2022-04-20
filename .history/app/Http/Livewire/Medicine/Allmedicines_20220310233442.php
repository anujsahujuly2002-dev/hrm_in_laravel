<?php

namespace App\Http\Livewire\Medicine;

use App\Models\Medicine;
use App\Models\MedicineRate;
use Livewire\Component;
use Livewire\WithPagination;

class Allmedicines extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $pageId=0;
    public $name,$code, $potency, $medicine_type, $stock, $rate,$rateselling;
    public $medstockId=0;
    public function create()
    {
        $this->validate([
            'name' => 'required',
            'code' => 'required',
            'medicine_type' => 'required',
            'stock' => 'required|numeric|min:0',
            'rate' => 'required|numeric|min:0',
            'rateselling'=>'required|numeric|min:0'
        ]);

        if($this->val_id){
            Medicine::where('id', $this->val_id)->update([
                'name' => ucwords($this->name),
                'code' => $this->code,
                'unit' => strtoupper($this->potency),
                'med_type' => $this->medicine_type,
                'stock' => $this->stock,
                'price' => $this->rate,
                'rateselling' => $this->rateselling,
            ]);
        }
        else{
            Medicine::create([
                'name' => ucwords($this->name),
                'code' => $this->code,
                'unit' => strtoupper($this->potency),
                'med_type' => $this->medicine_type,
                'stock' => $this->stock,
                'price' => $this->rate,
                'rateselling' => $this->rateselling,
            ]);
        }
        session()->flash('success', ucwords($this->name) . ' saved.');
        $this->name = '';
        $this->code = '';
        $this->potency = '';
        $this->medicine_type = '';
        $this->rate = '';
         $this->rateselling ='';
        $this->stock = '';
        $this->val_id = null;
    }

    public function medStock($medId)
    {
        $this->medstockId=$medId;
        $this->pageId=1;
    }

    public function goBack()
    {
        $this->pageId=0;
    }

    public $val_id = null;
    public function edit($id)
    {
        $this->val_id = $id;
        $data = Medicine::find($id);
        $this->name = $data->name;
        $this->code=$data->code;
        $this->potency = $data->unit;
        $this->medicine_type = $data->med_type;
        $this->stock = $data->stock;
        $this->rate = $data->price;
        
    }

    public function cancel()
    {
        $this->name = '';
        $this->code = '';
        $this->potency = '';
        $this->medicine_type = '';
        $this->rate = '';
        $this->stock = '';
        $this->val_id = null;
    }

    public function render()
    {
        $medStockList = MedicineRate::where('medicine_id', $this->medstockId)->orderBy('id', 'DESC')->paginate(10);
        $data = Medicine::orderBy('name')->paginate(10);
        return view('livewire.medicine.allmedicines', ['data' => $data],['medStockList'=> $medStockList]);
    }
}
