<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSparring extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'gauntlet',
        'boot',
        'user_id',
        'sparring_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'sparring_id';
    }

    public $timestamps = false; 
}
