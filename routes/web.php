<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('index');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('show');
