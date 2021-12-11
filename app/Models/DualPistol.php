<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DualPistol extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'barrel',
        'receiver',
        'link',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}