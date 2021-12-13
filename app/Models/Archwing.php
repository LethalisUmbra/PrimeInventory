<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archwing extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'harness',
        'wings',
        'systems',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}
