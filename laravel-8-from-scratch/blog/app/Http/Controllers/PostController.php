<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    /** Show all Posts */
    public function index()
    {
        $filters = request([
            'search',
            'category',
            'author'
        ]);

        $posts = Post::latest()
            ->filter($filters)
            ->with(['category', 'author'])
            ->paginate(3)
            ->withQueryString();

        return view('posts.index', ['posts' => $posts]);
    }

    /** Show single Post */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
}
