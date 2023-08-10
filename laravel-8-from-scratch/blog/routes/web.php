<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/** Get all Posts */
Route::get('/', function () {
    $posts = Post::latest()->with(['category', 'author']);

    if (request('search')) {
        $posts->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%');
    }

    return view('posts', [
        'posts' => $posts->get(),
        'categories' => Category::all()
    ]);
})->name('home');

/** Get a Post */
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
})->name('post');

/** Get all Categories */
Route::get('/categories', function () {
    return view('categories', [
        'categories' => Category::all()
    ]);
})->name('categories');

/** Get all Posts by Category */
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->load(['category', 'author']),
        'categories' => Category::all(),
        'currentCategory' => $category
    ]);
})->name('category');

/** Get all Posts by User */
Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts->load(['category', 'author']),
        'categories' => Category::all()
    ]);
})->name('author');
