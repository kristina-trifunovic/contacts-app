<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // casting a json string from db to an array
    protected $casts = [
        'phone_number' => 'array',
        'phone_number_type' => 'array'

    ];
}
