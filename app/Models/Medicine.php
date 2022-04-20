<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'unit',
        'med_type',
        'stock',
        'price',
        'purchase_price',
        'disease_name',
    ];

    public function dms()
    {
        return $this->hasMany('App\Models\DiseaseMedicine');
    }
}
