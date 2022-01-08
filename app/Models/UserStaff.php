<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStaff extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blueprint',
        'ornament',
        'handle',
        'user_id',
        'staff_id',
    ];

    protected $table = 'user_staffs';

    public function getRouteKeyName()
    {
        return 'user_id'.'staff_id';
    }

    public $timestamps = false; 
}
