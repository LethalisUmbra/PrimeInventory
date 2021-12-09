<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// User[Category]
class UserCrossbow extends Model
{
    use HasFactory;

    // Change components
    protected $fillable = [
        'id',
        'blueprint',
        'grip',
        'string',
        'barrel',
        'receiver',
        'user_id',
        'crossbow_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'crossbow_id';
    }

    public $timestamps = false; 
}
