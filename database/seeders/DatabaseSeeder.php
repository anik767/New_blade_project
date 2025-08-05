<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'azminanik@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), 
        ]);

        // Run the sample data seeder
        $this->call([
            SampleDataSeeder::class,
            ThemeSeeder::class,
        ]);

        // Set Light theme as default
        DB::table('settings')->updateOrInsert(
            ['key' => 'selected_theme'],
            ['value' => 1] // Light theme ID
        );
            
    }
}
