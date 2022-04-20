@extends('layouts.login') @section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><img scr="{{ asset('images/'.$user->images)}}"alt="{{ $user->images}}" class="user_img"></div>
        <div class="card-body">
          <!-- 重要な箇所ここから -->
          <form action="{{ route('users.postEdit', ['id' => $user->id]) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}" />
            <p>user name</p>
            <input type="text" name="username" value="{{ $user->username }}" />
            <p>mail adress</p>
            <input type="text" name="mail" value="{{ $user->mail }}" /><br />
            <p>password</p>
            <input type="password" name="password" value="{{ $user->password }}" />
            <p>bio</p>
            <input type="text" name="bio" value="{{ $user->bio }}" />
            <p>images</p>
            <input type="file" name="images" accept="image/png, image/jpeg" />
            <input type="submit" value="更新" class="plofile_edit"/>
          </form>
          <!-- 重要な箇所ここまで -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection