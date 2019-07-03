<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

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
        $posts = Post::orderBy('id', 'DESC')->take(3)->get();
        return view('home')->with('posts', $posts);
    }

    public function information()
    {
        $user = Auth::user();
        $info = [$user->name, $user->email, $user->phone];
        return view('information')->with('info', $info);
    }

    public function test(){
        return view('test');
    }
}
