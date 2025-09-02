<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPost extends Model
{
    protected $table = 'project_posts';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'github_link',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->where('is_approved', true);
    }
}

