<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification_system extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'contact_information',
        'fire_detection_station_id',
        'user_id',
    ];

    public function fireDetectionStation(){
        return $this->belongsTo(FireDetectionStation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
