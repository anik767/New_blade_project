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

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    /**
     * Get the comments for the project.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->where('is_approved', true);
    }
}
