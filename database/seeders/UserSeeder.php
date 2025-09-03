<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->firstOrCreate(
            ['email' => 'azminanik@gmail.com'],
            [
                'name' => 'Azmain Iqtidar Anik',
                'password' => bcrypt('12345678'),
            ]
        );
    }
}


