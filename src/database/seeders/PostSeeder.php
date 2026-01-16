<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

	Post::create([
            'user_id' => $user->id,
            'title' => 'First Real Post',
            'content' => 'This is stored in the database',
	]);
    }
}
