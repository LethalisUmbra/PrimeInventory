<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glaive extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'blade',
        'disc',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}
