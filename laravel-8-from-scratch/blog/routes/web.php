<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/** Get all posts */
Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
});

/** Get a Post */
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

/** Get all Categories */
Route::get('/categories', function (Category $category) {
    return view('categories', [
        'categories' => Category::all()
    ]);
});

/** Get all Posts by category */
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});
