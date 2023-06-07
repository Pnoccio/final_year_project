<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'description',
    ];

    public function fireIncident(){
        return $this->hasMany(fireIncident::class);
    } 

    public function reporting(){
        return $this->hasMany(reporting::class);
    }
}
