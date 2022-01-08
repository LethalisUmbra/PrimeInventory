<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMelee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'blade',
        'handle',
        'user_id',
        'melee_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'melee_id';
    }

    public $timestamps = false; 
}
