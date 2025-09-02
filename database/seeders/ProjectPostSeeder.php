<?php

namespace Database\Seeders;

use App\Models\ProjectPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectPostSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 12; $i++) {
            $data = [
                'title' => 'Project ' . $i,
                'description' => 'Description for project ' . $i,
                'github_link' => 'https://github.com/example/project-' . $i,
            ];
            $data['slug'] = Str::slug($data['title']);
            ProjectPost::query()->firstOrCreate(['title' => $data['title']], $data);
        }
    }
}


