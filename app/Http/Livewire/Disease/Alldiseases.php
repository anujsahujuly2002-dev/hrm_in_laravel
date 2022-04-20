<?php

namespace App\Http\Livewire\Disease;

use App\Models\Disease;
use Livewire\Component;
use Livewire\WithPagination;

class Alldiseases extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public function create()
    {
        $this->validate([
            'name' => 'required',
        ]);

        if ($this->val_id) {
            Disease::where('id', $this->val_id)->update([
                'name' => ucwords($this->name),
            ]);
        }
        else{
            Disease::create([
                'name' => ucwords($this->name),
            ]);
        }
        session()->flash('success', ucwords($this->name) . ' saved.');
        $this->name = '';
        $this->val_id = null;
    }

    public $val_id = null;
    public function edit($id)
    {
        $this->val_id = $id;
        $data = Disease::find($id);
        $this->name = $data->name;
    }

    public function cancel()
    {
        $this->name = '';
        $this->val_id = null;
    }

    public function render()
    {
        $data = Disease::orderBy('name')->paginate(10);
        return view('livewire.disease.alldiseases', ['data' => $data]);
    }
}
