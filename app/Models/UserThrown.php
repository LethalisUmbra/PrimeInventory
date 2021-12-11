<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserThrown extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'pouch',
        'blade',
        'user_id',
        'thrown_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'thrown_id';
    }

    public $timestamps = false; 
}
