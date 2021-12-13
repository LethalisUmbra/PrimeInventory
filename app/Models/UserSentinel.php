<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSentinel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'cerebrum',
        'carapace',
        'systems',
        'user_id',
        'sentinel_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'sentinel_id';
    }

    public $timestamps = false; 
}
