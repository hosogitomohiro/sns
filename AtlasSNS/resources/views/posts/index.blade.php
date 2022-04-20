@extends('layouts.login')
@section('content')
<body class="container">


  <div>
    <div class="container">
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right"><img class="post_img"src="images/post.png" alt="追加"></button>
        {!! Form::close() !!}
    </div>
  </div>
  <div>
    
        @foreach ($posts as $post)
        <div>
          <ul>
            <li class="post-block">
              <figure><img scr="{{ asset('images/'.$post->user->images)}}"alt="{{ $post->user->images}}" class="user_img"></figure>
              <div class="post-content">
                <div>
                  <div class="post-name">{{ $post->user->username }}</div>
                  <div>{{ $post->created_at }}</div>
                </div>
                <div>{{ $post->post }}</div>
                @if (Auth::user()->id === $post->user_id)
                <h3 class="btn update_btn" href="/post/{{$post->id}}/update-form"><img class="update_img"src="images/edit.png" alt="更新"></h3>
                <h4 class="btn delete_btn" href="/post/{{$post->id}}/delete" ><img class="delete_img" src="images/trash.png" alt="削除" width="10" height="auto" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"></h4>
                @endif
            </li>
          </ul>
        </div>
        @endforeach
    
  </div>

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</body>

@endsection