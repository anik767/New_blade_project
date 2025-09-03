<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\ProjectPost;
use App\Models\Service;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $blog = Blog::query()->take(3)->get();
        foreach ($blog as $index => $post) {
            for ($i = 1; $i <= 2; $i++) {
                Comment::query()->firstOrCreate(
                    [
                        'commentable_type' => Blog::class,
                        'commentable_id' => $post->id,
                        'email' => 'blog_c'.$index.'_'.$i.'@example.com',
                    ],
                    [
                        'name' => 'Reader '.$i,
                        'comment' => 'Nice article #'.$i,
                        'is_approved' => true,
                    ]
                );
            }
        }

        $projects = ProjectPost::query()->take(3)->get();
        foreach ($projects as $index => $project) {
            for ($i = 1; $i <= 2; $i++) {
                Comment::query()->firstOrCreate(
                    [
                        'commentable_type' => ProjectPost::class,
                        'commentable_id' => $project->id,
                        'email' => 'project_c'.$index.'_'.$i.'@example.com',
                    ],
                    [
                        'name' => 'Dev Fan '.$i,
                        'comment' => 'Great work #'.$i,
                        'is_approved' => true,
                    ]
                );
            }
        }

        $services = Service::query()->take(3)->get();
        foreach ($services as $index => $service) {
            for ($i = 1; $i <= 2; $i++) {
                Comment::query()->firstOrCreate(
                    [
                        'commentable_type' => Service::class,
                        'commentable_id' => $service->id,
                        'email' => 'service_c'.$index.'_'.$i.'@example.com',
                    ],
                    [
                        'name' => 'Client '.$i,
                        'comment' => 'Highly recommended #'.$i,
                        'is_approved' => true,
                    ]
                );
            }
        }
    }
}


