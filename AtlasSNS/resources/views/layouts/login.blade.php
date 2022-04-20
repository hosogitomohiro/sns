<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img class="atlastitle" href="/top" src="{{asset('images/atlas.png')}}" alt="logo"></a></h1>
            <div id="MyProfil">
                <div  id="MyProfilItem">
                    <p class="login_name"><?php $user = Auth::user(); ?>{{ $user->username }}さん</p>
                </div>
                <div id="MyProfilItem">
                  <img class="login_icon" src="{{ asset('images/'.$user->images)}}" alt="サンプル" width="10" height="auto" >
                </div>

                <div id="MyProfilItem">

                    <label class="login_menu" for="toggle" onclick=""  for="menuToggle">menu</label>
                    <input type="checkbox" id="toggle" autocomplete="off">

                    <ul id="menu">
                        <li><a href="/top" >ホーム</a></li>
                        <li><a class="dropdown-item" href="{{route('users.edit',['id'=>$user->id])}}"><span class="text-primary">プロフィール編集</span></a></li>
                        <li><a href="{{ route('login.logout') }}">ログアウト</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="list">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p><?php $user = Auth::user(); ?>{{ $user->username }}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>名</p>
                <p><?php $user = Auth::user(); ?>{{ $user->username }}さんの</p>
                </div>
                <p class="btn"><a class="btn btn--orange" href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a  class="btn btn--orange" href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a  class="btn btn--orange" href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
