<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ServiceSeeder::class,
            ProjectPostSeeder::class,
            BlogSeeder::class,
            ContactSeeder::class,
            AboutSeeder::class,
            HomeBannerSeeder::class,
            PageBannerSeeder::class,
            ContactMessageSeeder::class,
            CommentSeeder::class,
        ]);
    }
}


