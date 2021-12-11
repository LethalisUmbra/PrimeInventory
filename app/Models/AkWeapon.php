<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkWeapon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'single_weapon',
        'link',
    ];
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}