<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecCrossbow extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'upper_limb',
        'lower_limb',
        'receiver',
        'string',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}