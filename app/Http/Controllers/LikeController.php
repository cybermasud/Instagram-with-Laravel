<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Post $post)
    {
        $like = new Like;
        $like->user_id = Auth::id();
        $post->likes()->save($like);
        return back();
    }

    public function showLikedUsers(Post $post)
    {
        return view('liked_users', ['likes' => $post->likes()->with('user.media')->get()]);
    }

    public function unlike(Post $post)
    {
        $post->likes()->where('user_id', Auth::id())->delete();
        return back();
    }
}
