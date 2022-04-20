<?php

namespace App\Http\Livewire\Dealer;

use App\Models\Dealer;
use Livewire\Component;
use Livewire\WithPagination;

class Alldealers extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $val_id = null;

    public $name, $contact, $address, $open_balance;
    public function create()
    {
        if($this->val_id == null) {
            $this->validate([
                'name' => 'required',
                'address' => 'nullable|max:150',
                'contact' => 'required|numeric|digits:10',
                'open_balance' => 'required|min:0',
            ]);

            Dealer::create([
                'name' => ucwords($this->name),
                'address' => ucwords($this->address),
                'contact' => $this->contact,
                'open_balance' => $this->open_balance,
                'current_balance' => $this->open_balance,
            ]);
        }
        else{
            $this->validate([
                'name' => 'required',
                'address' => 'nullable|max:150',
                'contact' => 'required|numeric|digits:10',
            ]);

            Dealer::where('id', $this->val_id)->update([
                'name' => ucwords($this->name),
                'address' => ucwords($this->address),
                'contact' => $this->contact,
            ]);
        }

        session()->flash('success', ucwords($this->name) . ' details saved.');
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->val_id = null;
        $this->name = '';
        $this->address = '';
        $this->contact = '';
        $this->open_balance = '';
    }

    public function edit($id)
    {
        $this->val_id = $id;
        $data = Dealer::find($id);
        $this->name = $data->name;
        $this->address = $data->address;
        $this->contact = $data->contact;
    }

    public function cancel()
    {
        $this->resetInputs();
    }

    public function render()
    {
        $data = Dealer::orderBy('name', 'ASC')->paginate(4);
        return view('livewire.dealer.alldealers', ['data' => $data]);
    }
}
