<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'blade',
        'gauntlet',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}
