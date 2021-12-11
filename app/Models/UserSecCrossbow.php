<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSecCrossbow extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'upper_limb',
        'lower_limb',
        'receiver',
        'string',
        'user_id',
        'sec_crossbow_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'sec_crossbow_id';
    }

    public $timestamps = false; 
}
