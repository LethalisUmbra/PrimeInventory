<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warframe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'neuroptics',
        'chassis',
        'systems',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}
