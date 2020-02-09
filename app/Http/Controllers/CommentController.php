<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Post $post, CommentRequest $request)
    {
        $comment = new Comment;
        $comment->body = $request->input('body');
        $comment->user_id = Auth::id();
        $post->comments()->save($comment);
        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }

    // TODO owner of the comment can update his/her comment text
}
