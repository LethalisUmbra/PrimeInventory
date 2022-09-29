<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserArchgun extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'barrel',
        'receiver',
        'stock',
        'user_id',
        'archgun_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'archgun_id';
    }

    public $timestamps = false;
}
