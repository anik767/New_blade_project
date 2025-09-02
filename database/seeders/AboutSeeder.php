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
            'SKILL:HTML/CSS:95','SKILL:JavaScript:92','SKILL:React:88','SKILL:Vue.js:85','SKILL:PHP:82',
            'SKILL:Laravel:80','SKILL:MySQL:78','SKILL:Git:90','SKILL:API Design:75','SKILL:UI/UX:85',
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
        $combined = 'SKILLS:'.implode('|', $skills).'||'.'STRENGTHS:'.implode('|', $strengths);

        About::query()->updateOrCreate(
            ['email' => 'azmain.anik@gmail.com'],
            [
                'name' => 'Azmain Iqtidar Anik',
                'title' => 'Full Stack Web Developer',
                'content' => "I'm a passionate and dedicated web developer with over 5 years of experience crafting digital experiences that make a difference. My journey in web development began during my university years, where I discovered my love for turning complex problems into elegant, user-friendly solutions.

Throughout my career, I've had the privilege of working on diverse projects ranging from e-commerce platforms to enterprise applications. I believe in writing clean, maintainable code and creating interfaces that users love to interact with.

My approach combines technical expertise with creative problem-solving. I'm constantly learning and staying updated with the latest technologies and best practices in web development. Whether it's building responsive frontends, robust backends, or optimizing performance, I'm committed to delivering high-quality solutions that exceed expectations.

When I'm not coding, you'll find me exploring new technologies, contributing to open-source projects, or sharing knowledge with the developer community. I'm always excited to take on new challenges and collaborate with teams to build something amazing together.",
                'experience' => "**Senior Frontend Developer** at SIMEC System Ltd (2023–Present)
• Lead frontend development for enterprise applications
• Mentor junior developers and conduct code reviews
• Implement modern React patterns and best practices
• Collaborate with UX/UI teams to improve user experience

**Full Stack Developer** at TechCorp Solutions (2021–2023)
• Developed and maintained multiple client websites
• Built RESTful APIs using Laravel and Node.js
• Optimized database queries and improved performance
• Worked with cross-functional teams on agile projects

**Junior Developer** at StartupXYZ (2019–2021)
• Built responsive web applications using modern frameworks
• Integrated third-party APIs and payment gateways
• Participated in daily standups and sprint planning
• Contributed to open-source projects and team knowledge sharing",
                'education' => "**BSc in Computer Science & Engineering** - University of Dhaka (2019–2023)
• Graduated with First Class Honours (CGPA: 3.85/4.00)
• Specialized in Software Engineering and Web Technologies
• Completed final year project: 'AI-Powered Code Review System'
• Active member of Programming Club and Tech Community

**Higher Secondary Certificate** - Dhaka College (2017–2019)
• Science Group with Mathematics focus
• Achieved outstanding results in Computer Studies
• Participated in national programming competitions

**Secondary School Certificate** - Ideal School & College (2015–2017)
• Science Group with excellent academic performance
• Developed interest in computer programming
• Won school-level science fair projects",
                'phone' => '+880 1712-345678',
                'location' => 'Dhaka, Bangladesh',
                'linkedin' => 'https://linkedin.com/in/azmain-anik',
                'github' => 'https://github.com/azmain-anik',
                'map_embed_code' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9024424301397!2d90.3653!3d23.7937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1d915088279%3A0xf1675c60d4fd376f!2sDhaka%2C%20Bangladesh!5e0!3m2!1sen!2sus!4v1234567890!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'is_active' => true,
                'skills' => $combined,
            ]
        );
    }
}


