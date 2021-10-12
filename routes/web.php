<?php

use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('index');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('show');

Route::get('/categories/{category:slug}', [PostController::class, 'category'])->name('category');

Route::get('/authors/{user}', [PostController::class, 'author'])->name('author');

Route::get('/create-post', function () {
    return redirect()->action([PostController::class, 'index']);
});
