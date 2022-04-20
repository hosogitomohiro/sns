@extends('layouts.login')

@section('content')
<body>
  <div class = "profile_date">
    <img class="user_profile" scr="{{asset('images/xxx')}}">
    <div><p>name</p></div>
    <div>{{username}}</div>
    <p>bio</p>
    <div>{{bio}}</div>
    <a class="" href="" >
      <img class="" src="" alt="フォローする">
  </a>
  </div>
  <table class='table table-hover'>
    <tr>
      <td>
        <img scr="{{ asset('images/'.)}}">
      </td>
      <td>{{username}}</td>
      <td>{{post}}</td>
      <td>{{created_at}}</td>
    </tr>
  </table>

</body>
@endsection