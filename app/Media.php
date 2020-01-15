<?php


namespace App;


use App\Events\MediaCreated;
use App\Events\MediaDeleted;
use App\Http\Requests\PostRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class Media extends Model
{
    protected $table = 'media';
    protected $dispatchesEvents = ['deleted' => MediaDeleted::class];


    public static function storeMedia($request)
    {
        if ($request instanceof ProfileUpdateRequest && $request->hasFile('avatar')) {
            optional(Auth::user()->media)->delete();
            $media = new Media();
            $request->file('avatar')->store('public/avatars');
            $media->name = $request->file('avatar')->hashName();
            $media->save();
            return $media->id;
        } elseif ($request instanceof PostRequest) {
            $media = new Media();
            $request->file('post')->store('public/posts');
            $media->name = $request->file('post')->hashName();
            $media->save();
            return $media->id;
        } else {
            return null;
        }
    }
}
