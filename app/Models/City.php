<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'country',
        'region',
        'latitude',
        'longitude',
        'is_division',
        'is_district',
        'is_tehsil',
        'district_id',
        'division_id'

    ];

    protected $gaurded = [];
    
}
