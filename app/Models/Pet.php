<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'name',
        'species',
        'age',
        'owner_name',
        'medical_history',
    ];
}
