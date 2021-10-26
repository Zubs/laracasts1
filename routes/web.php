<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('', [PostController::class, 'index'])->name('index');
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('show');
Route::post('/posts/{post:slug}/comment', [CommentController::class, 'store'])->name('comments.store');

Route::get('register', [RegisterController::class, 'create'])->name('register.create')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');

Route::get('login', [LoginController::class, 'create'])->name('login.create')->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->name('login.store')->middleware('guest');

Route::redirect('home', '/'); // Cause there's no homepage yet

Route::post('logout', [LogoutController::class, 'destroy'])->name('logout')->middleware('auth');
