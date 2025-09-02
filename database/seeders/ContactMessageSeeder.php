<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            ContactMessage::query()->firstOrCreate(
                ['email' => 'user'.$i.'@example.com', 'message' => 'Hello there! #'.$i],
                [
                    'name' => 'Test User '.$i,
                    'phone' => '+1 555-01'.str_pad((string)$i, 2, '0', STR_PAD_LEFT),
                    'status' => ContactMessage::STATUS_UNREAD,
                ]
            );
        }
    }
}


