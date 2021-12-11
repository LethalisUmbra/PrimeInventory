<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thrown extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'pouch',
        'blade',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}