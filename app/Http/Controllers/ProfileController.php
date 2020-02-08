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
        $user->load('post.media');
        $is_following = $user->followers()->where('follower_id', Auth::id())->where('status', 1)->exists();
        $follow_requested = $user->followers()->where('follower_id', Auth::id())->where('status', null)->exists();
        $followings_count = $user->followings()->where('status', 1)->count();
        $followers_count = $user->followers()->where('status', 1)->count();
        return view('profile.index', ['user' => $user,
            'is_following' => $is_following,
            'follow_requested' => $follow_requested,
            'followers' => $followers_count,
            'followings' => $followings_count]);
    }

    /**
     * show edit form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
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
            $user->avatar_id = $this->storeMedia($request);
        }
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->bio = $request->input('bio');
        $user->save();
        return redirect(route('account.edit'));
    }

    /**
     * storing post or profile images
     *
     * @param $request
     * @return mixed
     */
    public static function storeMedia($request)
    {
        $media = new Media();
        $request->file('img')->store('public/media');
        $media->name = 'storage/media/' . $request->file('img')->hashName();
        $media->save();
        return $media->id;
    }
}
