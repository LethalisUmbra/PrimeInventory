<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFist extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'blade',
        'gauntlet',
        'user_id',
        'fist_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'fist_id';
    }

    public $timestamps = false; 
}
