<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseMedicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'disease',
        'medicine',
    ];
      
    public function diseases()
    {
        return $this->belongsTo('App\Models\Disease', 'disease');
    }

    public function medicines()
    {
        return $this->belongsTo('App\Models\Medicine', 'medicine');
    }
}
