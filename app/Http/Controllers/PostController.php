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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function retrieve()
    {
        return view('posts', [
            'posts' => Auth::user()->posts->sortByDesc('updated_at'),
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function publish(Request $request)
    {
        $user = Auth::user();
        $post = new Post([
            'title' => $request->input('title'), 
            'body' => $request->input('body'), 
            'user_id' => $user->id
        ]);
        $post->save();
        return redirect('posts');
    }
}
