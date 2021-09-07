<?php

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

Route::get('/', function () {
    return view('posts');
});

Route::get('/post/{slug}', function ($slug) {
      $post = Post::find($slug);

      return view('post', [ 'post' => $post ]);
})->whereAlpha('post'); // Just to ensure post url is [A-Za-z_\-]+
