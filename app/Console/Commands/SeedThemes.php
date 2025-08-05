<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Database\Seeders\ThemeSeeder;

class SeedThemes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:themes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed themes from config/themes.php';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Seeding themes...');
        
        $seeder = new ThemeSeeder();
        $seeder->run();
        
        $this->info('Themes seeded successfully!');
        $this->info('Available themes: Light, Dark, Blue, Purple');
        
        return Command::SUCCESS;
    }
}
