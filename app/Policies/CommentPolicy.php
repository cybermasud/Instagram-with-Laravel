<?php

namespace App\Policies;

use App\Comment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Comment $comment)
    {
        return (int)$user->id === (int)$comment->user_id || $user->post()->get()->pluck('id')->contains($comment->post_id);
    }

    public function update(User $user, Comment $comment)
    {
        return (int)$user->id === (int)$comment->user_id;
    }
}
