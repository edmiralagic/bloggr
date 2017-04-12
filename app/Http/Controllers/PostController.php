<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('posts', [
            'posts' => Post::all()->sortByDesc('updated_at'),
            'comments' => Comment::all()->sortByDesc('created_at'),
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function edit(Post $post)
    {
        if($post->user_id == Auth::user()->id) {
            return view('editpost', [
                'post' => $post,
            ]);
        } else {
            return redirect()->route('posts.index');
        }
    }

    public function show(Post $post)
    {
        return view('showpost', [
                'post' => $post,
                'comments' => Comment::all()->sortByDesc('created_at'),
            ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $post = new Post([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => $user->id
        ]);
        $post->save();

        flash()->success('Post created successfully.');

        return redirect()->route('posts.index');
    }

    public function update(Post $post, Request $request)
    {
        if($post->user_id == Auth::user()->id) {
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->save();

            return redirect()->route('posts.show', $post);
        } else {
            return redirect()->route('posts.index');
        }
    }

    public function destroy(Post $post)
    {
        if($post->user_id == Auth::user()->id) {
            $post->delete();

            flash()->success('"' . $post->title . '" success deleted.');

            return redirect()->route('posts.index');
        } else {
            return redirect()->route('posts.index');
        }
    }
}
