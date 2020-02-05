<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['posts' => Post::query()->whereIn('user_id', Auth::user()->followings()->where('status', 1)->get()->pluck('id')->push(Auth::id()))->with(['user.media','media','comments','likes'])->latest()->get()]);
    }
}
