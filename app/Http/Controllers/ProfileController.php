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

        $avatar = Media::query()->find($user->avatar_id);
        if (empty($avatar)) {
            $avatar = 'default.jpg';
        } else {
            $avatar = $avatar->name;
        }
        return view('profile.index', [
            'user' => $user, 'avatar' => $avatar
        ]);
    }

    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
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
