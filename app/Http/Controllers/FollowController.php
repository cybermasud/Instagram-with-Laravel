<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    /**
     * follow user
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function followUser(User $user)
    {
        if (!$this->isFollowing($user)) {
            $user->followers()->attach(Auth::id());
        }
        return redirect()->back();
    }

    /**
     * unfollow user
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unfollowUser(User $user)
    {
        if ($this->isFollowing($user)) {
            $user->followers()->detach(Auth::id());
        }
        return redirect()->back();
    }

    /**
     * accept following request
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function acceptFollowRequest(User $user)
    {
        Auth::user()->followers()->updateExistingPivot($user->id, ['status' => 1]);
        return redirect()->back();
    }

    /**
     * show followers
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFollowers(User $user)
    {
        return view('profile.followers', ['user' => $user,
            'followers' => $user->followers()->where('status', 1)->get(),
            'follow_requests' => $user->followers()->where('status', null)->get()
        ]);
    }

    /**
     * show followings
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFollowings(User $user)
    {
        return view('profile.followings', ['user' => $user,
            'followings' => $user->followings()->where('status', 1)->get(),
            'follow_requests' => $user->followings()->where('status', null)->get()
        ]);
    }

    private function isFollowing($user)
    {
        return $user->followers()->wherePivot('follower_id', Auth::id())->exists();
    }
}
