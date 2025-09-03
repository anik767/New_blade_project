<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 12; $i++) {
            $data = [
                'title' => 'Blog Post ' . $i,
                'content' => 'This is blog post number ' . $i . '.',
            ];
            $data['slug'] = Str::slug($data['title']);
            Blog::query()->firstOrCreate(['title' => $data['title']], $data);
        }
    }
}


