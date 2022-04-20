<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'dealer_id',
        'medicine_id',
        'qty',
        'unit',
        'rate',
        'price_per_unit',
        'date',
    ];

    public function medicines()
    {
        return $this->belongsTo('App\Models\Medicine', 'medicine_id');
    }

    public function dealers()
    {
        return $this->belongsTo('App\Models\Dealer', 'dealer_id');
    }

    public function purchases()
    {
        return $this->belongsTo('App\Models\Purchase', 'purchase_id');
    }
}
