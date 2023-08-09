<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 1 user
        // replacing just the name
        $user = User::factory()->create([
            'name' => 'Pedro Reis'
        ]);

        // create 5 posts from same user
        // and 5 different categories
        Post::factory(5)->create([
            'user_id' => $user->id
        ]);
    }
}
