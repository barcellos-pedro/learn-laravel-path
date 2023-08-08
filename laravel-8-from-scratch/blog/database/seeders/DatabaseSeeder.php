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
        // Truncate before start seeding
        // to remove the entire table from the database
        Post::truncate();
        User::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Personal post',
            'excerpt' => 'Excerpt for my post',
            'body' => 'lorem ipsum...',
            'slug' => 'my-personal-post',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family post',
            'excerpt' => 'Excerpt for my post',
            'body' => 'lorem ipsum...',
            'slug' => 'my-family-post',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work post',
            'excerpt' => 'Excerpt for my post',
            'body' => 'lorem ipsum...',
            'slug' => 'my-work-post',
        ]);
    }
}
