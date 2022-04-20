<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'purchase_rate',
        'purchase_item_id',
        'dealer_id',
        'medicine_id',
        'open_stock',
        'sold_stock',
        'remain_stock',
        'status',
    ];
}
