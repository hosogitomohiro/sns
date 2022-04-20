<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\User;
use App\Follow;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username','mail','password'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    //

    public function follow(User $user) {    // ←この関数追記
        return $this->follows()->save($user);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }

    public function selectUserFindById($id)
    {
        $query = $this->select([
            'id',
            'username',
            'mail',
            'password',
            'bio',
            'images',
        ])->where([
            'id' => $id
        ]);

        return $query->first();
    }

    public function updateUserFindById($user)
    {
        return $this->where([
        'id' => $user['id']
        ])->update([
        'username' => $user['username'],
        'mail' => $user['mail'],
        'password' => $user['password'],
        'bio' => $user['bio'],
        'images' => $user['images']
        ]);
    }

    public function followup(Int $user_id) 
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id) 
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first(['id']);
    }

    // フォローされているか
    public function isFollowed(Int $user_id) 
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['id']);
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }




}


