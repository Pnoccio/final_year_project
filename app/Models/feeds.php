<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feeds extends Model
{
    use HasFactory;

    protected $fillable = [
        'channel_id',
        'temperature_level',
        'smoke_level',
        'humidity_level',
        'soil_moisture_level',
        'created_at',
    ];

    public $timestamps = false;
}
