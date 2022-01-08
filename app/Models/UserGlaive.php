<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGlaive extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'blade',
        'disc',
        'user_id',
        'glaive_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'glaive_id';
    }

    public $timestamps = false; 
}
