<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body' => ['required', 'string', 'min:3']
        ]);

        $post->comments()->create([
            'body' => request('body'),
            'user_id' => Auth::id()
        ]);

        return back();
    }
}
