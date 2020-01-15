<?php


namespace App\Http\Controllers;


use App\Http\Requests\ProfileUpdateRequest;
use App\Media;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $avatar = $user->media ? $user->media->name : 'default.jpg';
        return view('profile.index', ['user' => $user, 'avatar' => $avatar]);
    }

    public function edit()
    {
        $user = Auth::user();
        $avatar = $user->media ? $user->media->name : 'default.jpg';
        return view('profile.edit', ['user' => $user, 'avatar' => $avatar]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->avatar_id = Media::storeMedia($request) ?? $user->avatar_id;
        $user->bio = $request->input('bio');
        $user->save();
        return redirect(route('account.edit'));
    }

}
