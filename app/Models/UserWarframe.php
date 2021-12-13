<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWarframe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'neuroptics',
        'chassis',
        'systems',
        'user_id',
        'warframe_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'warframe_id';
    }

    public $timestamps = false; 
}
