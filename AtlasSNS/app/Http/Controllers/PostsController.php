<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Validator;



class PostsController extends Controller
{
    //
    public function index()
    {
        $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('following_id'))->orWhere('user_id', Auth::user()->id)->latest()->get();

        return view('posts.index')->with([
            'posts' => $posts,
        ]);
    }
    public function create(Request $request)
    {
        $post = $request->input('newPost');
        $id = Auth::id();
        \DB::table('posts')->insert([
            'post' => $post,'user_id' => $id
        ]);

        return redirect('top');
    }
    public function delete($id)
    {
        \DB::table('posts')
             ->where('id',$id)
             ->delete();

        return redirect('top');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }


}
