<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rifle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'barrel',
        'receiver',
        'stock',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}
