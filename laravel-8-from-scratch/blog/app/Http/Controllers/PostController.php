<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /** Show all Posts */
    public function index()
    {
        $filters = request(['search', 'category', 'author']); // possible filters

        $posts = Post::latest()
            ->filter($filters) // uses scopeFilter on Model
            ->with(['category', 'author'])
            ->get();

        return view('posts', [
            'posts' => $posts,
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }

    /** Show single Post */
    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }
}
