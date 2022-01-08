<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSpeargun extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'barrel',
        'blade',
        'handle',
        'user_id',
        'speargun_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'speargun_id';
    }

    public $timestamps = false; 
}
