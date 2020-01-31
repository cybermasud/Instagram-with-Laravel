<?php

namespace App;

use App\Events\MediaDeleted;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $with = ['media','comments','likes'];

    protected $dispatchesEvents = [
        'deleted' => MediaDeleted::class
    ];

    protected $fillable = ['user_id', 'media_id', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
