<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/** Get all Posts */
Route::get('/', [PostController::class, 'index'])->name('home');

/** Get a Post */
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post');

/** Get all Categories */
Route::get('/categories', function () {
    return view('categories', [
        'categories' => Category::all()
    ]);
})->name('categories');

/** Register (Sign up) */
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
