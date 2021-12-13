<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentinel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'cerebrum',
        'carapace',
        'systems',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}
