<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create admin user only if it doesn't exist
        User::firstOrCreate(
            ['email' => 'azminanik@gmail.com'],
            [
                'name' => 'Admin',
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
            ]
        );


            
    }
}
