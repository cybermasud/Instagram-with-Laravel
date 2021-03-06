<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Post;
use Illuminate\Http\Request;
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

    public function edit(Comment $comment)
    {
        return view('comment_edit', ['comment' => $comment]);
    }

    public function update(Comment $comment, CommentRequest $request)
    {
        $comment->body = $request->input('body');
        $comment->save();
        return back();
    }
}
