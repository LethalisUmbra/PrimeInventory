<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pistol extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'barrel',
        'receiver',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}