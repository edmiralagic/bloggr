<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {
        return view('home', [
            'posts' => Auth::user()->posts,
        ]);
    }

    public function post(Request $request)
    {
        $user = Auth::user();
        $post = new Post([
            'title' => $request->input('title'), 
            'body' => $request->input('body'), 
            'user_id' => $user->id
        ]);
        $post->save();
        return redirect('home');
    }
}
