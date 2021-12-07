<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userrifle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'barrel',
        'receiver',
        'stock',
        'user_id',
        'rifle_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'rifle_id';
    }

    public $timestamps = false; 
}
