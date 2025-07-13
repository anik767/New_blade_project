<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'github_link',
    ];
}
