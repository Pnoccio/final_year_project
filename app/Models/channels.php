<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class channels extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'latitude',
        'longitude',
        'field1',
        'field2',
        'field3',
        'field4',
        'created_at',
        'updated_at',
        'last_entry_id',
    ];
}
