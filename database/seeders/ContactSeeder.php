<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'title' => 'Let\'s build something amazing together',
            'content' => "I'm currently open to freelance and full‑time opportunities. Whether you have a question, a project idea, or just want to say hi — my inbox is always open and I'll do my best to get back to you within 24 hours. I love collaborating on innovative projects and turning ideas into reality.",
            'email' => 'azmain.anik@gmail.com',
            'phone' => '+880 1712-345678',
            'address' => 'Banani, Dhaka 1213, Bangladesh',
            'social_links' => json_encode([
                'email' => 'mailto:azmain.anik@gmail.com',
                'linkedin' => 'https://linkedin.com/in/azmain-anik',
                'github' => 'https://github.com/azmain-anik',
                'twitter' => 'https://twitter.com/azmain_anik',
                'dribbble' => 'https://dribbble.com/azmain-anik',
            ]),
            'is_active' => true,
        ];

        $existing = Contact::query()->first();
        if ($existing) {
            $existing->update($data);
        } else {
            Contact::query()->create($data);
        }
    }
}


