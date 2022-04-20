<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'dealer_id',
        'total',
        'paid',
        'remain',
        'status',
        'date',
    ];

    public function dealers()
    {
        return $this->belongsTo('App\Models\Dealer', 'dealer_id');
    }

    public function pitems()
    {
        return $this->hasMany('App\Models\PurchaseItem');
    }
}
