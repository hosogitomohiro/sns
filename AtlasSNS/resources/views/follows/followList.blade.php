@extends('layouts.login')

@section('content')
<body class="container">
  @foreach ($posts as $post)
  <div>
    <ul>
      <li>
      <a class="btn profile_btn" href=""><img scr="{{ asset('images/$post->user->images')}}"alt="{{ $post->user->images}}" class="login_icon" ></a>
      </li>
    </ul>
  </div>
  @endforeach
  <div class="list_title"><p>Folow List</p></div>
  @foreach ($posts as $post)
  <div>

    <div class="followuser_icon">

    </div>
    <table class='table table-hover'>
      <tr>
      <td >
        <img scr="{{ asset('images/'.$post->user->images)}}"alt="{{ $post->user->images}}" class="user_img">
      </td>
      <td>
        {{ $post->user->username }}
      </td>
      <td>
        {{ $post->post}}
      </td>
      <td class = "post_at">
        {{$post->created_at}}
      </td>
      <td class="userid">
        {{$post->user_id}}
      </td>
      if()
      </tr>
    </table>
  </div>
  @endforeach
</body>
@endsection

