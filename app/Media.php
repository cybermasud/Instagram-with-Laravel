<?php


namespace App;


use App\Events\MediaDeleted;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $dispatchesEvents = ['deleted' => MediaDeleted::class];
}
