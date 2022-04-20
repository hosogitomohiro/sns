<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use APP\User;
use App\Follow;
use Auth;


class Follow extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User
        ');
    }
    public function posts()
    {
        return $this->belongsToMany('App\Post
        ');
    }
}
