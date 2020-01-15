<?php

namespace App;

use App\Events\MediaDeleted;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $with = 'media';

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
}
