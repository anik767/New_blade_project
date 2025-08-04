<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'email',
        'phone',
        'location',
        'linkedin',
        'github',
        'map_embed_code',
        'skills',
        'experience',
        'education',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
} 