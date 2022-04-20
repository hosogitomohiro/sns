<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;


class Post extends Model
{
    //多対１
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function follow(Post $follow_post) {    // ←この関数追記
        return $this->follows()->save($follow_post);
    }
    public function follows()
    {
        return $this->belongsToMany(Post::class, 'follows', 'followed_id', 'following_id');
    }
    public function followers()
    {
        return $this->belongsToMany(Post::class, 'follows', 'following_id', 'followed_id');
    }
}