<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hammer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'head',
        'handle',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}
