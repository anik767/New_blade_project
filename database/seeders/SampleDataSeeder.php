<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectPost;
use App\Models\BlogPost;
use App\Models\Service;
use App\Models\Comment;
use App\Models\ContactMessage;
use App\Models\AboutMe;
use App\Models\Contact;
use App\Models\HomeBanner;
use Illuminate\Support\Str;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 sample projects
        $projects = [
            ['title' => 'E-commerce Platform', 'description' => 'A modern e-commerce platform built with Laravel and Vue.js featuring payment integration and inventory management.', 'github_link' => 'https://github.com/example/ecommerce'],
            ['title' => 'Portfolio Website', 'description' => 'A responsive portfolio website showcasing creative work with smooth animations and modern design.', 'github_link' => 'https://github.com/example/portfolio'],
            ['title' => 'Task Management App', 'description' => 'A collaborative task management application with real-time updates and team collaboration features.', 'github_link' => 'https://github.com/example/task-manager'],
            ['title' => 'Social Media Dashboard', 'description' => 'A comprehensive dashboard for managing multiple social media accounts with analytics and scheduling.', 'github_link' => 'https://github.com/example/social-dashboard'],
            ['title' => 'Restaurant Booking System', 'description' => 'An online restaurant booking system with table management and customer reviews.', 'github_link' => 'https://github.com/example/restaurant-booking'],
            ['title' => 'Learning Management System', 'description' => 'A complete LMS for educational institutions with course management and student tracking.', 'github_link' => 'https://github.com/example/lms'],
            ['title' => 'Real Estate Platform', 'description' => 'A property listing platform with advanced search filters and virtual tour capabilities.', 'github_link' => 'https://github.com/example/real-estate'],
            ['title' => 'Fitness Tracking App', 'description' => 'A mobile app for tracking workouts, nutrition, and fitness goals with progress analytics.', 'github_link' => 'https://github.com/example/fitness-tracker'],
            ['title' => 'Event Management System', 'description' => 'A comprehensive event management platform with ticketing, registration, and event analytics.', 'github_link' => 'https://github.com/example/event-manager'],
            ['title' => 'Inventory Management System', 'description' => 'A robust inventory management system for businesses with barcode scanning and reporting.', 'github_link' => 'https://github.com/example/inventory'],
        ];

        foreach ($projects as $project) {
            ProjectPost::create([
                'title' => $project['title'],
                'slug' => Str::slug($project['title']),
                'description' => $project['description'],
                'image' => null,
                'github_link' => $project['github_link'],
            ]);
        }

        // Create 10 sample blog posts
        $blogPosts = [
            ['title' => 'Getting Started with Laravel', 'content' => 'Laravel is a web application framework with expressive, elegant syntax. In this comprehensive guide, we\'ll explore the fundamentals of Laravel development, from installation to deployment. Learn about routing, controllers, models, and the Eloquent ORM that makes database interactions seamless.'],
            ['title' => 'Modern Web Development Trends', 'content' => 'The web development landscape is constantly evolving with new technologies and methodologies. From Progressive Web Apps to Serverless Architecture, discover the latest trends that are shaping the future of web development and how to stay ahead of the curve.'],
            ['title' => 'Building Responsive Websites', 'content' => 'Responsive design is crucial in today\'s mobile-first world. Learn the best practices for creating websites that look great on all devices. We\'ll cover CSS Grid, Flexbox, media queries, and modern responsive design techniques.'],
            ['title' => 'JavaScript ES6+ Features', 'content' => 'Explore the powerful features introduced in ES6 and beyond. From arrow functions to async/await, destructuring to modules, learn how to write cleaner, more maintainable JavaScript code that leverages modern language features.'],
            ['title' => 'Vue.js vs React: A Comparison', 'content' => 'Both Vue.js and React are excellent frontend frameworks, but they have different philosophies and use cases. This detailed comparison will help you choose the right framework for your next project based on your specific requirements.'],
            ['title' => 'Database Design Best Practices', 'content' => 'Good database design is the foundation of any successful application. Learn about normalization, indexing strategies, relationship modeling, and performance optimization techniques that will make your applications faster and more reliable.'],
            ['title' => 'API Development with Laravel', 'content' => 'Build robust RESTful APIs with Laravel. This guide covers authentication, validation, resource controllers, API versioning, and best practices for creating APIs that are secure, scalable, and easy to maintain.'],
            ['title' => 'CSS Grid Layout Mastery', 'content' => 'CSS Grid is a powerful layout system that revolutionizes how we create web layouts. Learn how to create complex, responsive layouts with CSS Grid, from basic concepts to advanced techniques and real-world examples.'],
            ['title' => 'Performance Optimization Techniques', 'content' => 'Website performance directly impacts user experience and SEO rankings. Discover proven techniques for optimizing your web applications, including caching strategies, image optimization, code splitting, and monitoring tools.'],
            ['title' => 'Testing in Laravel Applications', 'content' => 'Testing is crucial for maintaining code quality and preventing regressions. Learn how to write effective tests in Laravel using PHPUnit, including unit tests, feature tests, and database testing strategies.'],
        ];

        foreach ($blogPosts as $post) {
            BlogPost::create([
                'title' => $post['title'],
                'slug' => Str::slug($post['title']),
                'content' => $post['content'],
                'image' => null,
            ]);
        }

        // Create 10 sample services
        $services = [
            ['title' => 'Web Development', 'description' => 'We specialize in creating custom web applications using the latest technologies and best practices. From simple websites to complex enterprise solutions, we deliver scalable and maintainable code.', 'icon' => 'code', 'order' => 1, 'is_active' => true],
            ['title' => 'UI/UX Design', 'description' => 'Creating user-centered designs that provide exceptional user experiences. Our design process focuses on usability, accessibility, and visual appeal to create interfaces that users love.', 'icon' => 'palette', 'order' => 2, 'is_active' => true],
            ['title' => 'Mobile App Development', 'description' => 'Developing mobile applications for iOS and Android platforms. We create native and cross-platform apps that deliver smooth performance and engaging user experiences.', 'icon' => 'smartphone', 'order' => 3, 'is_active' => true],
            ['title' => 'E-commerce Solutions', 'description' => 'Custom e-commerce platforms tailored to your business needs. We build secure, scalable online stores with advanced features like payment processing, inventory management, and analytics.', 'icon' => 'shopping-cart', 'order' => 4, 'is_active' => true],
            ['title' => 'API Development', 'description' => 'RESTful APIs and microservices for modern applications. We design and implement robust APIs that enable seamless integration between different systems and platforms.', 'icon' => 'database', 'order' => 5, 'is_active' => true],
            ['title' => 'Website Maintenance', 'description' => 'Ongoing support and maintenance for your web applications. We provide regular updates, security patches, performance monitoring, and technical support to keep your applications running smoothly.', 'icon' => 'wrench', 'order' => 6, 'is_active' => true],
            ['title' => 'Cloud Solutions', 'description' => 'Cloud infrastructure and deployment solutions for scalable applications. We help you migrate to the cloud and optimize your infrastructure for performance, security, and cost-effectiveness.', 'icon' => 'cloud', 'order' => 7, 'is_active' => true],
            ['title' => 'SEO Optimization', 'description' => 'Search engine optimization to improve your website\'s visibility and rankings. We implement on-page and off-page SEO strategies to drive organic traffic and increase conversions.', 'icon' => 'search', 'order' => 8, 'is_active' => true],
            ['title' => 'Performance Optimization', 'description' => 'Speed optimization and performance tuning for web applications. We analyze and optimize your code, database queries, and server configuration to deliver faster loading times.', 'icon' => 'speed', 'order' => 9, 'is_active' => true],
            ['title' => 'Technical Consulting', 'description' => 'Expert technical consulting to help you make informed decisions about technology choices, architecture, and development strategies for your projects.', 'icon' => 'consulting', 'order' => 10, 'is_active' => true],
        ];

        foreach ($services as $service) {
            Service::create([
                'title' => $service['title'],
                'slug' => Str::slug($service['title']),
                'description' => $service['description'],
                'icon' => $service['icon'],
                'image' => null,
                'order' => $service['order'],
                'is_active' => $service['is_active'],
            ]);
        }

        // Create 10 sample comments
        $comments = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'comment' => 'Great article! Very helpful for beginners. The examples are clear and easy to follow.'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'comment' => 'Thanks for sharing these insights! This will definitely help with my next project.'],
            ['name' => 'Mike Johnson', 'email' => 'mike@example.com', 'comment' => 'Excellent explanation of the concepts. Looking forward to more content like this.'],
            ['name' => 'Sarah Wilson', 'email' => 'sarah@example.com', 'comment' => 'This is exactly what I was looking for. The step-by-step approach is perfect.'],
            ['name' => 'David Brown', 'email' => 'david@example.com', 'comment' => 'Very informative post. The code examples are well-structured and easy to understand.'],
            ['name' => 'Lisa Davis', 'email' => 'lisa@example.com', 'comment' => 'Thanks for breaking down these complex topics into digestible pieces.'],
            ['name' => 'Tom Anderson', 'email' => 'tom@example.com', 'comment' => 'Great work! This article saved me hours of research.'],
            ['name' => 'Emily Taylor', 'email' => 'emily@example.com', 'comment' => 'The best explanation I\'ve found on this topic. Bookmarked for future reference.'],
            ['name' => 'Chris Martinez', 'email' => 'chris@example.com', 'comment' => 'Excellent tutorial! The practical examples really help solidify the concepts.'],
            ['name' => 'Rachel Garcia', 'email' => 'rachel@example.com', 'comment' => 'This is gold! Thank you for sharing your knowledge and experience.'],
        ];

        $blogPosts = BlogPost::all();
        foreach ($comments as $index => $comment) {
            $blogPost = $blogPosts[$index % count($blogPosts)];
                Comment::create([
                'name' => $comment['name'],
                'email' => $comment['email'],
                'comment' => $comment['comment'],
                    'commentable_type' => BlogPost::class,
                    'commentable_id' => $blogPost->id,
                'is_approved' => rand(0, 1),
            ]);
        }

        // Create 10 sample contact messages
        $contactMessages = [
            ['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'phone' => '+1 (555) 123-4567', 'message' => 'I would like to discuss a potential project with you. We need a custom web application for our business.'],
            ['name' => 'Bob Wilson', 'email' => 'bob@example.com', 'phone' => '+1 (555) 987-6543', 'message' => 'Do you offer consultation services? I need help with technology decisions for my startup.'],
            ['name' => 'Carol Davis', 'email' => 'carol@example.com', 'phone' => '+1 (555) 456-7890', 'message' => 'I need help with my website redesign project. Looking for a modern, responsive design.'],
            ['name' => 'Daniel Miller', 'email' => 'daniel@example.com', 'phone' => '+1 (555) 234-5678', 'message' => 'Interested in your mobile app development services. Can we schedule a consultation?'],
            ['name' => 'Eva Rodriguez', 'email' => 'eva@example.com', 'phone' => '+1 (555) 345-6789', 'message' => 'Looking for an e-commerce solution for my online store. What are your rates?'],
            ['name' => 'Frank Thompson', 'email' => 'frank@example.com', 'phone' => '+1 (555) 456-7890', 'message' => 'Need help with API development for our platform. Do you have experience with Laravel?'],
            ['name' => 'Grace Lee', 'email' => 'grace@example.com', 'phone' => '+1 (555) 567-8901', 'message' => 'Interested in your UI/UX design services. Can you share some portfolio examples?'],
            ['name' => 'Henry Clark', 'email' => 'henry@example.com', 'phone' => '+1 (555) 678-9012', 'message' => 'Looking for ongoing website maintenance services. What packages do you offer?'],
            ['name' => 'Ivy White', 'email' => 'ivy@example.com', 'phone' => '+1 (555) 789-0123', 'message' => 'Need help with cloud migration for our applications. Do you provide cloud consulting?'],
            ['name' => 'Jack Hall', 'email' => 'jack@example.com', 'phone' => '+1 (555) 890-1234', 'message' => 'Interested in SEO optimization for our website. Can you provide a free audit?'],
        ];

        $statuses = ['unread', 'read', 'replied'];
        foreach ($contactMessages as $message) {
            ContactMessage::create([
                'name' => $message['name'],
                'email' => $message['email'],
                'phone' => $message['phone'],
                'message' => $message['message'],
                'status' => $statuses[array_rand($statuses)],
            ]);
        }

        // Create about me data if it doesn't exist
        if (AboutMe::count() === 0) {
            AboutMe::create([
                'name' => 'Azmain Iqtidar Anik',
                'title' => 'Full Stack Developer',
                'content' => 'I am a passionate full-stack developer with expertise in modern web technologies. I love creating beautiful, functional, and user-friendly applications that solve real-world problems. With years of experience in Laravel, Vue.js, and React, I specialize in building scalable web applications and mobile solutions.',
                'email' => 'azmain@example.com',
                'phone' => '+1 (555) 123-4567',
                'location' => 'Dhaka, Bangladesh',
                'linkedin' => 'https://linkedin.com/in/azmain-anik',
                'github' => 'https://github.com/azmain-anik',
                'map_embed_code' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.53636221425!2d90.37872792589972!3d23.870592084150395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c40f82bd8f7b%3A0x8c888da8fc05ec94!2sSector%2012%2C%20Dhaka%201230!5e0!3m2!1sen!2sbd!4v1754201318215!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ]);
        }

        // Create contact data if it doesn't exist
        if (Contact::count() === 0) {
            Contact::create([
                'title' => 'Get In Touch',
                'content' => 'Ready to start your next project? I\'d love to hear from you! Whether you have a question about my services, want to discuss a potential collaboration, or just want to say hello, feel free to reach out. I\'m always excited to work on new and challenging projects.',
                'email' => 'contact@azmain-anik.com',
                'phone' => '+1 (555) 123-4567',
                'address' => 'Sector 12, Dhaka 1230, Bangladesh',
                'social_links' => 'LinkedIn: https://linkedin.com/in/azmain-anik\nGitHub: https://github.com/azmain-anik\nTwitter: https://twitter.com/azmain_anik',
            ]);
        }

        // Create home banner data if it doesn't exist
        if (HomeBanner::count() === 0) {
            HomeBanner::create([
                'title_line1' => 'Hello',
                'title_line2' => 'I\'m Azmain Iqtidar Anik',
                'subtitle' => 'Full Stack Developer passionate about crafting clean, user-friendly websites that delight users.',
                'background_image' => null,
                'person_image' => null,
                'cv_file' => null,
                'skills' => ['HTML', 'CSS', 'JavaScript', 'Laravel', 'Vue.js', 'React', 'Tailwind CSS', 'MySQL', 'Git', 'Docker'],
                'experience' => [
                    [
                        'title' => 'Frontend Developer',
                        'company' => 'SIMEC System Ltd',
                        'period' => 'July 2023 - Present',
                        'description' => 'Working with Laravel, Vue, and Tailwind CSS to build responsive web interfaces.'
                    ],
                    [
                        'title' => 'Junior Developer',
                        'company' => 'Tech Solutions Inc',
                        'period' => 'January 2023 - June 2023',
                        'description' => 'Developed and maintained web applications using PHP and JavaScript.'
                    ],
                    [
                        'title' => 'Freelance Developer',
                        'company' => 'Self-Employed',
                        'period' => '2022 - 2023',
                        'description' => 'Built custom websites and web applications for various clients.'
                    ]
                ],
            ]);
        }
    }
}
