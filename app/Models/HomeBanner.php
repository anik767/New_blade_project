<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    // Table name is 'home_banners' by default (Laravel pluralizes model name)
    // Define which fields are mass assignable for security
    protected $fillable = [
        'title_line1',
        'title_line2',
        'subtitle',
        'background_image',  // new field for background image
        'person_image',      // new field for person image
        'cv_file',           // CV upload
        'skills',            // JSON array of skills
        'experience',        // JSON array of experience
    ];

    protected $casts = [
        'skills' => 'array',
        'experience' => 'array',
    ];
}
