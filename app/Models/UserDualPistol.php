<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDualPistol extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'barrel',
        'receiver',
        'link',
        'user_id',
        'dual_pistol_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'dual_pistol_id';
    }

    public $timestamps = false; 
}
