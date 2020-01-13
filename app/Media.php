<?php


namespace App;


use App\Http\Requests\PostRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    public static function storeMedia($request)
    {
        $media = new Media();
        if ($request instanceof ProfileUpdateRequest AND $request->hasFile('avatar')) {
            $request->file('avatar')->store('public/avatars');
            $media->name = $request->file('avatar')->hashName();
            $media->save();
            return $media->id;
        } elseif ($request instanceof PostRequest) {
            $request->file('post')->store('public/posts');
            $media->name = $request->file('post')->hashName();
            $media->save();
            return $media->id;
        } else {
            return null;
        }
    }
}
