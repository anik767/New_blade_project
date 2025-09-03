<?php

namespace Database\Seeders;

use App\Models\HomeBanner;
use Illuminate\Database\Seeder;

class HomeBannerSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'title_line2' => 'Azmain',
            'subtitle' => 'Full Stack Web Developer',
            'skills' => ['React', 'Laravel', 'Vue.js', 'PHP', 'JavaScript', 'Tailwind CSS', 'MySQL', 'Git', 'API Design', 'UI/UX'],
            'experience' => [
                [
                    'title' => 'Senior Frontend Developer',
                    'company' => 'SIMEC System Ltd',
                    'period' => 'July 2023 - Present',
                    'description' => 'Leading frontend development for enterprise applications, mentoring junior developers, and implementing modern React patterns.',
                ],
                [
                    'title' => 'Full Stack Developer',
                    'company' => 'TechCorp Solutions',
                    'period' => 'March 2021 - June 2023',
                    'description' => 'Developed and maintained multiple client websites, built RESTful APIs using Laravel and Node.js.',
                ],
                [
                    'title' => 'Junior Developer',
                    'company' => 'StartupXYZ',
                    'period' => 'January 2019 - February 2021',
                    'description' => 'Built responsive web applications using modern frameworks and integrated third-party APIs.',
                ],
            ],
        ];

        $banner = HomeBanner::query()->updateOrCreate(
            ['title_line1' => 'Hello, I\'m'],
            $data
        );

        // Normalize legacy string experience to structured array
        if (is_string($banner->experience)) {
            $banner->experience = [
                [
                    'title' => 'Experience',
                    'company' => '',
                    'period' => '',
                    'description' => $banner->experience,
                ],
            ];
            $banner->save();
        }
    }
}


