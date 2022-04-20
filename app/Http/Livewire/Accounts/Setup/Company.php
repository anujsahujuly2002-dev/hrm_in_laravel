<?php

namespace App\Http\Livewire\Accounts\Setup;

use App\Models\Company as ModelsCompany;
use Livewire\Component;

class Company extends Component
{
    public $name;

    public function create()
    {
        $this->validate([
            'name' => 'required'
        ]);

        ModelsCompany::create([
            'name' => ucwords($this->name),
        ]);

        return redirect()->route('index');
    }

    public function render()
    {
        return view('livewire.accounts.setup.company');
    }
}
