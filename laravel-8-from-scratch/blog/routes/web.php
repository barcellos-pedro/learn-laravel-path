<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

/** Sessions (log in & log out) */
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
