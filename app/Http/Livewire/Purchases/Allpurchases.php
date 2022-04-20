<?php

namespace App\Http\Livewire\Purchases;

use App\Models\Purchase;
use Livewire\Component;
use Livewire\WithPagination;

class Allpurchases extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $data = Purchase::where('status', true)->orderBy('id', 'DESC')->paginate();
        return view('livewire.purchases.allpurchases', ['data' => $data]);
    }
}
