<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHammer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'head',
        'handle',
        'user_id',
        'hammer_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'hammer_id';
    }

    public $timestamps = false; 
}
