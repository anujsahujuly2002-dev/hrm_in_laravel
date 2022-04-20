<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'gender',
        'contact',
        'email',
        'dob',
        'allergy',
        'image',
        'balance'
    ];
}
