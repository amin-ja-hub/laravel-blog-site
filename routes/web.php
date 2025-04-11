<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return 'a';
})->name('about');

Route::get('/contact', function () {
    return 'a';
})->name('contact');

Route::middleware(['auth'])->group(function () {
    // Category Resource Routes with Admin Control
    Route::resource('category', CategoryController::class)
        ->middleware('can:AdminView,App\Models\User');

    // Comment Management
    Route::get('/comments', [Comment::class, 'index'])
        ->name('comment.index')
        ->middleware('can:AdminView,App\Models\User');

    // Post Management
    Route::get('/admin/posts', [PostController::class, 'index'])->name('posts.index') 
        ->middleware('can:AdminView,App\Models\User');

    Route::controller(PostController::class)->group(function () {
        Route::get('/posts/create', 'create')->name('posts.create');
        Route::post('/posts/a', 'store')->name('posts.store');
        Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');
        Route::put('/posts/{post}', 'update')->name('posts.update');
        Route::delete('/posts/{post}', 'destroy')->name('posts.destroy');
        Route::get('/panel/posts', 'userIndex')->name('posts.user.index');
    });
});

// Public Post Routes
Route::get('/posts', [PostController::class, 'frontIndex'])->name('posts.front.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Comment Submission
Route::post('/comment/{post}', [Comment::class, 'store'])->name('comment.store');

// Authentication Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register.show');
    Route::post('/register', 'register')->name('register.perform');
    Route::get('/login', 'showLoginForm')->name('login.show');
    Route::post('/login', 'login')->name('login.perform');
    Route::post('/logout', 'logout')->name('logout');
});
