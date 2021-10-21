<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->filter(request()->only('search', 'category', 'author'))->with('category', 'author')->paginate(9)->withQueryString();

        return view('posts.index')->with('posts', $posts);
    }

    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post->load('author', 'category'));
    }
}
