<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
        return view('profile', [
        	'user' => Auth::user(),
        	'posts' => Auth::user()->posts->sortByDesc('updated_at'),
            'comments' => Comment::all()->sortByDesc('updated_at'),
        ]);
    }

    public function edit(User $user)
    {
        dd($user->toArray());
    }

    public function show($user_id)
    {
    	$user = User::where('name', $user_id)->first();
        return view('profile', [
        	'user' => $user,
        	'posts' => $user->posts->sortByDesc('updated_at'),
            'comments' => Comment::all()->sortByDesc('updated_at'),
        ]);
    }

    public function store(Request $request)
    {
        
    }
}
