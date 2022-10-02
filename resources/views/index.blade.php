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
    <div class="main_left">
      <h2 class="main_title">一覧</h2>
      @foreach ($posts as $post)
      <div class="main_left-card">
          <h3 class="main_card-title"><p>{{ $post->title }}</p></h3>
          <p>{!! nl2br(htmlspecialchars($post->content)) !!}</p>
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
    <div class="main_right">
      <h2 class="main_title">投稿作成</h2>
      @if (Auth::check())
      <form method="POST" action="/">
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        @csrf
        <div class="input_title">
          <label>
            タイトル：<input type="text" name="title" class="title_input">
          </label>
        </div>
        <div class="input_content">
          <label>
            本文：<div><textarea name="content" class="content_txt"></textarea></div>
          </label>
        </div>
        <div class="input_tag">
          <label>
            タグ：<select name="tag_id">
              @foreach ($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->tag}}</option>
              @endforeach
            </select>
          </label>
        </div>
        <div class="input_submit">
          <input type="submit" value="投稿" class="input_submit-btn">
        </div>
      </form>
      @else
      <p>投稿の作成はログインをしてから行ってください。</p>
      @endif
    </div>
  </main>
</body>
</html>