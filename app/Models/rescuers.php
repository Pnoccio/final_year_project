<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rescuers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_information',
        'expertise',
        'notification_system_id',
    ];

    public function notificationsystem(){
        return $this->belongsTo(NotificationSystem::class);
    }
}
