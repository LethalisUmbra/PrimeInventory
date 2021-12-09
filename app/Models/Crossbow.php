<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crossbow extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'grip',
        'string',
        'barrel',
        'receiver',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}
