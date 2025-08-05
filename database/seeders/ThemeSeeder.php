<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;
use Illuminate\Support\Facades\DB;

class ThemeSeeder extends Seeder
{
    public function run()
    {
        $themes = config('themes');
        foreach ($themes as $slug => $colors) {
            Theme::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => ucfirst($slug),
                    'slug' => $slug,
                    'colors' => json_encode($colors),
                ]
            );
        }

        // Set Light theme as default if no theme is selected
        $selectedTheme = DB::table('settings')->where('key', 'selected_theme')->value('value');
        if (!$selectedTheme) {
            DB::table('settings')->updateOrInsert(
                ['key' => 'selected_theme'],
                ['value' => 1] // Light theme ID
            );
        }
    }
}