<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'doctor_name',
        'doctor_degree',
        'opd_spl',
        'email',
        'mobile',
        'alt_mobile',
        'landline',
        'gstin',
        'address',
        'logo',
    ];
}
