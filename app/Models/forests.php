<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forests extends Model
{
    use HasFactory;

    protected $primaryKey = 'name';
    protected $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'location',
    ];
}
