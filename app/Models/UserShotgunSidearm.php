<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserShotgunSidearm extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'barrel',
        'receiver',
        'user_id',
        'shotgun_sidearm_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'shotgun_sidearm_id';
    }

    public $timestamps = false; 
}
