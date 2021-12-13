<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserArchwing extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'barrel',
        'receiver',
        'user_id',
        'archwing_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'archwing_id';
    }

    public $timestamps = false; 
}
