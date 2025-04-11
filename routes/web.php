<?php

use App\Http\Controllers\{
    AuthController, CategoryController, CommentController, HomeController, PostController
};
use Illuminate\Support\Facades\Route;

// ===========================
// Public Routes
// ===========================

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', fn() => 'a')->name('about');
Route::get('/contact', fn() => 'a')->name('contact');

// ===========================
// Authentication Routes
// ===========================
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register.show');
    Route::post('/register', 'register')->name('register.perform');
    Route::get('/login', 'showLoginForm')->name('login.show');
    Route::post('/login', 'login')->name('login.perform');
    Route::post('/logout', 'logout')->name('logout');
});

// ===========================
// Posts Routes
// ===========================

Route::get('/posts', [PostController::class, 'frontIndex'])->name('posts.front.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/search', [PostController::class, 'searchByCategoryOrTag'])->name('posts.search');

// ===========================
// Comment Submission
// ===========================

Route::post('/comment/{post}', [CommentController::class, 'store'])->name('comment.store');

// ===========================
// Protected Routes (Require Auth)
// ===========================

Route::middleware(['auth'])->group(function () {
    
    // Category Management (Admin Only)
    Route::resource('category', CategoryController::class)
        ->middleware('can:AdminView,App\Models\User');

    // Comment Management (Admin Only)
    Route::get('/comments', [CommentController::class, 'index'])
        ->name('comment.index')
        ->middleware('can:AdminView,App\Models\User');

    // Post Management
    Route::get('/admin/posts', [PostController::class, 'index'])->name('posts.index')
        ->middleware('can:AdminView,App\Models\User');

    Route::controller(PostController::class)->group(function () {
        Route::get('/posts/create', 'create')->name('posts.create');
        Route::post('/posts', 'store')->name('posts.store');
        Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');
        Route::put('/posts/{post}', 'update')->name('posts.update');
        Route::delete('/posts/{post}', 'destroy')->name('posts.destroy');
        Route::get('/panel/posts', 'userIndex')->name('posts.user.index');
    });
});
