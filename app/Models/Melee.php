<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Melee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'blade',
        'handle',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}
