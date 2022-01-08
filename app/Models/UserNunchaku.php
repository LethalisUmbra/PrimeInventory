<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNunchaku extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'handle',
        'chain',
        'user_id',
        'nunchaku_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'nunchaku_id';
    }

    public $timestamps = false; 
}
