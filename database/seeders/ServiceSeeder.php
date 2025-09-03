<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $data = [
                'title' => 'Service ' . $i,
                'description' => 'Description for service ' . $i,
                'icon' => '🛠️',
                'is_active' => true,
                'order' => $i,
            ];
            Service::query()->firstOrCreate(['title' => $data['title']], $data);
        }
    }
}


