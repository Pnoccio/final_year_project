<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fire_detection_stations extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'forest_name',
        'gps_coordinates',
        'status',
        'last_maintenance',
        'temperature',
        'humidity',
        'smoke',
    ];

    public function forest(){
        return $this->belongsTo(Forest::class, 'forest_name', 'name');
    }
}
