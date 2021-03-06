<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'bio', 'avatar_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * route model binding with username instead of user id
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'avatar_id')->withDefault(['name' => 'images/default.jpg']);
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'followers',
            'user_id',
            'follower_id'
        )->withPivot('status');
    }

    public function followings()
    {
        return $this->belongsToMany(
            User::class,
            'followers',
            'follower_id',
            'user_id'
        );
    }
}
