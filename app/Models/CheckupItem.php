<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckupItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'checkup_id',
        'disease_id',
        'medicine_id',
        'qty',
        'unit',
        'doses',
        'date',
    ];

    public function meds()
    {
        return $this->belongsTo('App\Models\Medicine', 'medicine_id');
    }

    public function diseases()
    {
        return $this->belongsTo('App\Models\Disease', 'disease_id');
    }

    public function checkups()
    {
        return $this->belongsTo('App\Models\Checkup', 'checkup_id');
    }

}
