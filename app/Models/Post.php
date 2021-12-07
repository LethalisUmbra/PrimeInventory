<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'url', 'description', 'image_path'];

    
    public function getRouteKeyName()
    {
        return 'url';
    }
}
