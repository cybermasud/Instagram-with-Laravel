<?php


namespace App;


use App\Events\MediaDeleted;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $dispatchesEvents = ['deleted' => MediaDeleted::class];

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
        $media->name = $request->file('img')->hashName();
        $media->save();
        return $media->id;
    }
}
