<?php


namespace App\Http\Controllers;


use App\Http\Requests\ProfileUpdateRequest;
use App\Media;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * show user profile
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(User $user)
    {
        $is_following = $user->followers()->where('follower_id', Auth::id())->where('status', 1)->exists();
        $follow_requested = $user->followers()->where('follower_id', Auth::id())->where('status', null)->exists();
        $avatar = optional($user->media)->name ?? 'default.jpg';
        return view('profile.index', ['user' => $user,
            'avatar' => $avatar,
            'is_following' => $is_following,
            'follow_requested' => $follow_requested]);
    }

    /**
     * show edit form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();
        $avatar = $user->media ? $user->media->name : 'default.jpg';
        return view('profile.edit', ['user' => $user, 'avatar' => $avatar]);
    }

    /**
     * update user profile
     *
     * @param ProfileUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        if ($request->has('img')) {
            optional(Auth::user()->media)->delete();
            $user->avatar_id = Media::storeMedia($request);
        }
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->bio = $request->input('bio');
        $user->save();
        return redirect(route('account.edit'));
    }

    /**
     * follow user
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function followUser(User $user)
    {
        if (!$user->followers->pluck('id')->contains(Auth::id())) {
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
        if ($user->followers->pluck('id')->contains(Auth::id())) {
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

    public function showFollowers(User $user)
    {
        return view('profile.followers', ['user' => $user,
            'followers' => $user->followers()->where('status', 1)->get(),
            'follow_requests' => $user->followers()->where('status', null)->get()
        ]);
    }

    public function showFollowings(User $user)
    {
        return view('profile.followings', ['user' => $user,
            'followings' => $user->followings()->where('status', 1)->get(),
            'follow_requests' => $user->followings()->where('status', null)->get()
        ]);
    }
}
