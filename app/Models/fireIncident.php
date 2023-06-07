<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fireIncident extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        // 'date_time',
        'cause',
        'severity',
        'description'
    ];

    public function location(){
        return $this->belongsTo(location::class);
    }
}
