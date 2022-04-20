<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\FollowUser;
use Illuminate\Http\Request;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    public function userlist()
    {
        $username = \DB::table('users')->get('username');
        return view('users.search',['username'=>$username]);
    }
    
    public function timeline() {
        $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('following_id'))->latest()->get();
        return view('follows.followerList')->with([
            'posts' => $posts,
            ]);
        }

    public function timelined() {
        $posts = Post::query()->whereIn('user_id', Auth::user()->followers()->pluck('followed_id'))->latest()->get();
        return view('follows.followList')->with([
            'posts' => $posts,
            ]);
        }

}