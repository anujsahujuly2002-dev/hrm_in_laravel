<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckupAttach extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkup_id',
        'file'
    ];

    public function checkups()
    {
        return $this->belongsTo('App\Models\Checkup', 'checkup_id');
    }
}
