<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reporting extends Model
{
    use HasFactory;

    public function location(){
        return $this->belongsTo(location::class);
    }
}
