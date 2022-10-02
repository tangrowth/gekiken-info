<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>『金鹿』衣装管理</title>
</head>
<body>
    <header>
      <a href="/" class="header_title"><h1>衣装進捗報告</h1></a>
      <nav class="header_nav">
        <ul class="header_nav-list">
          <li><a href="/search" class="header_nav-btn">検索</a></li>
          <li><a href="/costume" class="header_nav-btn">管理</a></li>
        @if (Auth::check())
        <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="header_nav-btn">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form></li>
        @else
        <li><a href="/login" class="header_nav-btn">ログイン</a></li>
        <li><a href="/register" class="header_nav-btn">登録</a></li>
        @endif
      </ul>
    </nav>
  </header>

  <main>
    <div class="center">
      <h2 class="main_title">投稿検索</h2>
        <div class="cos_form">
          <form action="search" method="POST" class="cos_input">
            @csrf
            <input type="text" name="input" value="{{$input}}" class="cos_input-text">
            <input type="submit" value="検索" class="search_form-btn">
          </form>
        </div>
        <h2 class="main_title">検索結果</h2>
        <div class="search_result">
        @if (@isset($posts))
        @foreach ($posts as $post)
        <div class="main_left-card">
          <h3 class="main_card-title">{{ $post->title }}</h3>
          <p>{{ $post->content }}</p>
          <div class="main_card-info">
            <div>
              <a href="users/{{$post->user_id}}" class="main_card-tag">{{$post->user->name}}</a>
              <a href="tags/{{$post->tag_id}}" class="main_card-tag">{{$post->tag->tag}}</a>
            </div>
            <p>{{$post->created_at}}</p>
          </div>
          @if($user == $post->user)
          <form action="/delete/{{ $post->id }}" method="POST">
            @csrf
            <input type="submit" value="削除" class="input_submit-btn">
          </form>
          @endif
        </div>
        @endforeach
      </div>
      @endif
    </div>
  </main>
</body>
</html>