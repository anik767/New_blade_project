<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'email',
        'phone',
        'address',
        'social_links',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
