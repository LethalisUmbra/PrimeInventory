<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNikana extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'blade',
        'hilt',
        'user_id',
        'nikana_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'nikana_id';
    }

    public $timestamps = false; 
}
