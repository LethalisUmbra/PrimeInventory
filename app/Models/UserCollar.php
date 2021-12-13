<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCollar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'band',
        'buckle',
        'user_id',
        'collar_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'collar_id';
    }

    public $timestamps = false; 
}
