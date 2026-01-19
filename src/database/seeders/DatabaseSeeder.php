<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Admin Account
        User::factory()->create([
            'name'  => 'Test Admin',
            'phone' => '+6012-3456789',
            'email' => 'admin@example.com',
            'password'=> bcrypt('admin123'),
            'isAdmin'      => true,
            'isModderator' => true,
        ]);

        // Moderator Account
        User::factory()->create([
            'name'  => 'Test Moderator',
            'phone' => '+6012-3456789',
            'email' => 'moderator@example.com',
            'password'=> bcrypt('modd1234'),
            'isAdmin'      => false,
            'isModderator' => true,
        ]);

        // Regular User
        User::factory()->create([
            'name'  => 'Test User',
            'phone' => '+6012-3456789',
            'email' => 'test@example.com',
            'password'=> bcrypt('password'),
            'isAdmin'      => false,
            'isModderator' => false,
        ]);

        $this->call(PostSeeder::class);
    }
}
