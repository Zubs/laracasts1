<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with('category', 'author')->get();

        return view('posts')->with('posts', $posts);
    }

    public function category (Category $category)
    {
        return view('posts')->with('posts', $category->posts->load('category', 'author'));
    }

    public function author ($user)
    {
        $user = User::where('username', $user)->orWhere('slug', $user)->first();

        if (!$user) {
            throw new ModelNotFoundException();
        }

        return view('posts')->with('posts', $user->posts->load('category', 'author'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
