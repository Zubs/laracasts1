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
        $posts = Post::latest()->filter(request()->only('search'))->with('category', 'author')->get();
        $categories = Category::all();

        return view('posts')->with('posts', $posts)->with('categories', $categories);
    }

    public function category (Category $category)
    {
        return view('posts')
            ->with('posts', $category->posts->load('category', 'author'))
            ->with('categories', Category::all());
    }

    public function author ($user)
    {
        $user = User::where('username', $user)->orWhere('slug', $user)->first();

        if (!$user) {
            throw new ModelNotFoundException();
        }

        return view('posts')->with('posts', $user->posts->load('category', 'author'))->with('categories', Category::all());
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        return view('post')->with('post', $post->load('author', 'category'));
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
