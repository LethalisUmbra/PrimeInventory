<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPistol extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'barrel',
        'receiver',
        'user_id',
        'pistol_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'pistol_id';
    }

    public $timestamps = false; 
}
