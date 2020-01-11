<?php


namespace App\Http\Controllers;


use App\Media;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->file('avatar')->store('public/avatars');
        $media = new Media();
        $media->name = $request->file('avatar')->hashName();
        $media->save();
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->avatar_id = $media->id;
        $user->bio = $request->input('bio');
        $user->save();
        return redirect(route('account.edit'));
    }

}
