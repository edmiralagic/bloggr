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
        $this->middleware('guest', ['only' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('my home page.');
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
