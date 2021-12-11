<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAkWeapon extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'single_weapon',
        'link',
        'user_id',
        'ak_weapon_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'ak_weapon_id';
    }

    public $timestamps = false; 
}
