<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'band',
        'buckle',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}
