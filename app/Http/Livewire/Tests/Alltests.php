<?php

namespace App\Http\Livewire\Tests;

use App\Models\Test;
use Livewire\Component;
use Livewire\WithPagination;

class Alltests extends Component
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
            Test::where('id', $this->val_id)->update([
                'name' => ucwords($this->name),
            ]);
        }
        else{
            Test::create([
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
        $data = Test::find($id);
        $this->name = $data->name;
    }

    public function cancel()
    {
        $this->name = '';
        $this->val_id = null;
    }

    public function render()
    {
        $data = Test::orderBy('name')->paginate(10);
        return view('livewire.tests.alltests', ['data' => $data]);
    }
}
