<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSwordShield extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'blade',
        'guard',
        'hilt',
        'user_id',
        'sword_shield_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'sword_shield_id';
    }

    public $timestamps = false; 
}
