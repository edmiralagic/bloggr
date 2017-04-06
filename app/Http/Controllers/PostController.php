<?php

namespace App\Http\Controllers;

use App\Post;
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
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        flash()->success('"' . $post->title . '" success deleted.');

        return redirect()->route('posts.index');
    }
}
