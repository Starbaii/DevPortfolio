<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Make sure we have some users
        if (User::count() < 5) {
            User::factory()->count(5)->create();
        }

        // 2. Create 100 posts
        Post::factory()->count(100)->create();

        $this->command->info('✅ Seeded 100 posts.');
    }
}