<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'checkup_id',
        'patient_id',
        'doctor_id',
        'date',
        'status',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function docs()
    {
        return $this->belongsTo('App\Models\User', 'doctor_id');
    }

    public function checkups()
    {
        return $this->belongsTo('App\Models\Checkup', 'checkup_id');
    }

    public function patients()
    {
        return $this->belongsTo('App\Models\Patient', 'patient_id');
    }
}
