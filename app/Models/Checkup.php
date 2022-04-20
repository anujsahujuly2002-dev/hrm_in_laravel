<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'age',
        'date',
        'case_year',
        'case_no',
        'case_year_full',
        'case_paper_no',
        'symptoms',
        'history',
        'history_details',
        'consulting_charges',
        'medicine_charges',
        'total_charges',
        'medicine_days',
        'next_appointment',
        'pay_mode',
        'status',
        'user_id',
    ];

    public function attachments()
    {
        return $this->hasMany('App\Models\CheckupAttach');
    }

    public function patients()
    {
        return $this->belongsTo('App\Models\Patient', 'patient_id');
    }
}
