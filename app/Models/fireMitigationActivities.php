<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fireMitigationActivities extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'type',
        'date_time',
        'duration',
        'description',
    ];

    public function location(){
        return $this->belongsTo(location::class);
    }
}
