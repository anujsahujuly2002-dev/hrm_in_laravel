<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckupTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'checkup_id',
        'test_id',
    ];

    public function checkups()
    {
        return $this->belongsTo('App\Models\Checkup', 'checkup_id');
    }

    public function patients()
    {
        return $this->belongsTo('App\Models\Patient', 'patient_id');
    }

    public function tests()
    {
        return $this->belongsTo('App\Models\Test', 'test_id');
    }
}
