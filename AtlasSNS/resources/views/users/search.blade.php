@extends('layouts.login')

@section('content')
<body>
  <form class="form-inline" action="{{url('/search')}}">
    <div class="form-group">
      <input type="text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="名前を入力してください">
      <button type="submit" value="検索" class="btn btn-info"><img class="post_img"src="images/saerch.png" alt="検索"></button>
      <P><?php
          if(!empty($keyword)){
            echo"検索ワード：{$keyword}";
          }
          ?>
        </P>
    </div>
  </form>
  <div style="margin-top:50px;">
    <table class="table">
    @foreach($username as $username)
    <tr>
      <td><img class="user_icon" scr="{{ asset('images/'.$username->images)}}"alt="{{ $username->images}}"></td>
      <td>{{$username->username}}</td>
      <td>{{$username->id}}</td>
      @if($username->id = $posts)
      <td>follow</td>
      @else
      <p>kaizyo
      </p>
      @endif

    </tr>
    
    @endforeach
    </table>
  </div>

</body>

@endsection