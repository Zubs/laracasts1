<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->filter(request()->only('search', 'category', 'author'))->with('category', 'author')->paginate(9)->withQueryString();

        return view('posts.index')->with('posts', $posts);
    }

    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post->load('author', 'category', 'comments'))->with('comments', $post->comments->load('author'));
    }

    public function create()
    {
        return view('posts.create')->with('categories', Category::all());
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => ['required', 'string', 'min:3', 'unique:posts,title'],
            'body' => ['required', 'string', 'min:3'],
            'category_id' => ['required', 'int', 'exists:categories,id']
        ]);

        $fields['user_id'] = Auth::id();
        $fields['excerpt'] = null;
        $fields['slug'] = null;

        $post = Post::create($fields);

        return redirect()->route('index');
    }
}
