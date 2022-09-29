<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBow extends Model
{
    use HasFactory;

    protected $table = 'user_bows as ub';

    protected $fillable = [
        'id',
        'blueprint',
        'upper_limb',
        'lower_limb',
        'grip',
        'string',
        'user_id',
        'bow_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id'.'bow_id';
    }

    public $timestamps = false;
}
