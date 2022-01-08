<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparring extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'gauntlet',
        'boot',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}
