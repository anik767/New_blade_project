<?php

namespace Database\Seeders;

use App\Models\PageBanner;
use Illuminate\Database\Seeder;

class PageBannerSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            ['page' => 'about', 'background_media' => 'banners/about.jpg'],
            ['page' => 'contact', 'background_media' => 'banners/contact.jpg'],
        ];

        foreach ($pages as $data) {
            PageBanner::query()->firstOrCreate(['page' => $data['page']], $data);
        }
    }
}


