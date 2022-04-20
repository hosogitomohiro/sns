<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\User;
use Illuminate\Validation;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request){

         #キーワード受け取り
        $keyword = $request->input('keyword');
         #クエリ生成
         #もしキーワードがあったら
        if(!empty($keyword))
        {
            $query = \DB::table('users')->where('username','like','%'.$keyword.'%');

        }
        else{
            $query = \DB::table('users');
        }
        $username = $query->get();
        $id = \DB::table('users')->where('id');
        $auth = auth()->user();
        $following = \DB::table('follows')->where('following_id',$auth);
        $followed = \DB::table('follows')->where('followed_id');
        return view('users.search',['username'=>$username,])
        ->with('username',$username)
        ->with('keyword',$keyword)
        ->with('id',$id)
        ->with('auth',$auth)
        ->with('following',$following)
        ->with('followed',$followed)
        ->with('message','ユーザーリスト');

    }
    public function follow(User $username){
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($username->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->followup($username->id);
            return back();
        }
    }


    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('username');        //こちらです

            //中略
        });
    }

    public function show()
    {
        $user = Auth::user();
        return view('users/profile',['user' =>$user]);
    }

    /**
     * プロフィール編集機能（ユーザー名、メールアドレス）
     * @param
     * @return Redirect 一覧ページ-メッセージ（プロフィール更新完了）
     */
    public function profileUpdate(Request $request,user $user)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'mail' => ['required', 'string', 'mail', 'max:255', Rule::unique('users')->ignore(Auth::id())],
            'password' => 'required|stling|min;6|confirmed',
            'bio' => 'required|string|max:255',
        ]);

        try {
            $user = Auth::user();
            $user->username = $request->input('username');
            $user->mail = $request->input('mail');
            $user ->password = bcrypt($request->input('password'));
            $user ->bio = bcrypt($request->input('bio'));
            $user->save();

        } catch (\Exception $e) {
            return back()->with('msg_error', '更新に失敗しました')->withInput();
        }
        return redirect()->route('articles_index')->with('msg_success', '更新が完了しました');
    }
    //
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getEdit($id)
    {
        $user = $this->user->selectUserFindById($id);
        return view('users.edit', compact('user'));
    }
    public function postEdit($id, Request $request)
    {
        // フォームから渡されたデータの取得
        $user = $request->post();
        // DBへ更新依頼

        $this->user->updateUserFindById($user);
        // 再度編集画面へリダイレクト
        return redirect()->route('users.edit', ['id' => $id]);
    }
    public function timeline() {
        $posts = User::query()->whereIn('id', Auth::user()->follows()->pluck('following_id'))->latest()->get();

        
        return view('users.search')->with([
            'posts' => $posts,
        ]);
    }

    public function timelined() {
        $posts = Post::query()->whereIn('id', Auth::user()->followers()->pluck('followed_id'))->latest()->get();
        return view('users.search')->with([
            'posts' => $posts,
        ]);
    }

}