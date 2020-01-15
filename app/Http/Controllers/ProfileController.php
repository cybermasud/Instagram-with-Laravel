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
        $avatar = optional($user->media)->name ?? 'default.jpg';
        return view('profile.index', ['user' => $user, 'avatar' => $avatar]);
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
}
