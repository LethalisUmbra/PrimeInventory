<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nunchaku extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'handle',
        'chain',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}
