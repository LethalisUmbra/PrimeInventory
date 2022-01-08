<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speargun extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blueprint',
        'barrel',
        'blade',
        'handle',
    ];
}
