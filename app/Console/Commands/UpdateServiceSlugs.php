<?php

namespace App\Console\Commands;

use App\Models\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class UpdateServiceSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'services:update-slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update existing services with slugs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $services = Service::all();
        
        foreach ($services as $service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
                $service->save();
                $this->info("Updated service '{$service->title}' with slug: {$service->slug}");
            } else {
                $this->line("Service '{$service->title}' already has slug: {$service->slug}");
            }
        }
        
        $this->info('All services updated successfully!');
    }
}
