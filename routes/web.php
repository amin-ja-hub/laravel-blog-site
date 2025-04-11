<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Category resource routes with admin access control
    Route::resource('category', CategoryController::class)
        ->middleware('can:AdminView,App\Models\User');
    Route::get('/coemmtnes',[Comment::class,'index'])->name('comment.index')->middleware('can:AdminView,App\Models\User');;
    
    // Post routes
    Route::controller(PostController::class)->group(function () {
        Route::get('/posts', 'index')->name('posts.index');
        Route::get('/posts/{user}', 'index')->name('posts.panel.index');
        Route::get('/posts/create', 'create')->name('posts.create');
        Route::post('/posts', 'store')->name('posts.store');
        Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');
        Route::put('/posts/{post}', 'update')->name('posts.update');
        Route::delete('/posts/{post}', 'destroy')->name('posts.destroy');
    });
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.front.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show'); 

Route::post('/comment/{post}',[Comment::class,'store'])->name('comment.store');

// Registration Routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register.perform');

// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');

Route::post('/logout' ,[AuthController::class, 'logouut'])->name('logout');