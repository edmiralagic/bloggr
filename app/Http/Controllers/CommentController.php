<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('posts', [
            'posts' => Post::all()->sortByDesc('updated_at'),
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function edit(Post $post)
    {
        return view('editpost', [
            'post' => $post,
        ]);
    }

    public function show(Post $post)
    {
        dd($post->toArray());
    }

    public function store(Request $request, Post $post)
    {
        $user = Auth::user();
        $comment = new Comment([
            'post_id' => $post->id, 
            'message' => $request->input('message'), 
            'user_id' => $user->id
        ]);
        $comment->save();

        flash()->success('Comment created successfully.');

        return redirect()->route('posts.index');
    }

    public function update(Post $post, Request $request)
    {
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        flash()->success('Your comment was successfully deleted.');

        return redirect()->route('posts.index');
    }
}
