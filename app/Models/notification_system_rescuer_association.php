<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification_system_rescuer_association extends Model
{
    use HasFactory;

    protected $fillable = [
        'notification_system_id',
        'rescuer_id',
    ];

    public function notificationSystem(){
        return $this->belongsTo(NotificationSystem::class);
    }

    public function rescuer(){
        return $this->belongsTo(Rescuer::class);
    }
}
