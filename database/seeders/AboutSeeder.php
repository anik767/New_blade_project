<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        // Realistic skills with actual percentages
        $skills = [
            'SKILL:HTML/CSS:95',
            'SKILL:JavaScript:92',
            'SKILL:React:88',
            'SKILL:Vue.js:85',
            'SKILL:PHP:82',
            'SKILL:Laravel:80',
            'SKILL:MySQL:78',
            'SKILL:Git:90',
            'SKILL:API Design:75',
            'SKILL:UI/UX:85',
        ];

        // Realistic strengths with meaningful titles and subtitles
        $strengths = [
            'Critical Thinking:Analytical problem-solving with innovative approaches',
            'Communication:Clear technical communication across all stakeholders',
            'Adaptability:Rapid learning and implementation of new technologies',
            'Code Excellence:Writing clean, scalable, and maintainable code',
            'User-Centric:Designing solutions focused on user needs and experience',
            'Performance Optimization:Building fast, efficient, and scalable applications',
            'Quality Assurance:Comprehensive testing and debugging methodologies',
            'Technical Writing:Creating clear and comprehensive documentation',
            'Creative Solutions:Innovative approaches to complex technical challenges',
            'Project Leadership:Leading development teams and mentoring developers',
        ];
        
        $combined = 'SKILLS:' . implode('|', $skills) . '||' . 'STRENGTHS:' . implode('|', $strengths);

        // Build JSON version
        $strengthsJson = collect($strengths)
            ->map(function ($line) {
                [$title, $subtitle] = array_pad(explode(':', $line, 2), 2, '');
                return [
                    'title' => trim($title),
                    'subtitle' => trim($subtitle),
                ];
            })
            ->values()
            ->all();

        About::query()->updateOrCreate(
            ['email' => 'azmain.anik@gmail.com'],
            [
                'name' => 'Azmain Iqtidar Anik',
                'title' => 'Full Stack Web Developer',
                'content' => "I'm a passionate and dedicated web developer with over 5 years of experience crafting digital experiences that make a difference. My journey in web development began during my university years, where I discovered my love for turning complex problems into elegant, user-friendly solutions.",
                'experience' => "**Senior Frontend Developer** at SIMEC System Ltd (2023–Present)\n• Lead frontend development for enterprise applications\n• Mentor junior developers and conduct code reviews\n• Implement modern React patterns and best practices\n• Collaborate with UX/UI teams to improve user experience",
                'education' => "**BSc in Computer Science & Engineering** - University of Dhaka (2019–2023)",
                'phone' => '+880 1712-345678',
                'location' => 'Dhaka, Bangladesh',
                'linkedin' => 'https://linkedin.com/in/azmain-anik',
                'github' => 'https://github.com/azmain-anik',
                'map_embed_code' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9024424301397!2d90.3653!3d23.7937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1d915088279%3A0xf1675c60d4fd376f!2sDhaka%2C%20Bangladesh!5e0!3m2!1sen!2sus!4v1234567890!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'is_active' => true,
                'skills' => $combined,
                'strengths_json' => $strengthsJson,
            ]
        );
    }
}