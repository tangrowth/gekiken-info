<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <header>
    <a href=""><h1>衣装進捗報告</h1></a>
    <nav>
      <ul>
        <li><a href="/search">検索</a></li>
        @if (Auth::check())
        <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="header_top_btn">ログアウト</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form></li>
        @else
        <li><a href="/login">ログイン</a></li>
        <li><a href="/register">登録</a></li>
        @endif
      </ul>
    </nav>
  </header>

  <main>
    <div class="index">
      <h2>一覧</h2>
      @foreach ($posts as $post)
      <div class="card">
          <h3><a href="">{{ $post->title }}</a></h3>
          <p>{{$post->content}}</p>
          <a href="users/{{$post->user_id}}">{{$post->user->name}}</a>
          <a href="tags/{{$post->tag_id}}">{{$post->tag->tag}}</a>
          <p>{{$post->created_at}}</p>
      </div>
      @endforeach
    </div>
    <div>
      <h2>投稿作成</h2>
      @if (Auth::check())
      <form method="POST" action="/">
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        @csrf
        <div class="input_title">
          <label>
            タイトル：<input type="text" name="title">
          </label>
        </div>
        <div class="input_content">
          <label>
            本文：<textarea name="content"></textarea>
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
          <input type="submit" value="投稿">
        </div>
      </form>
      @else
      <p>投稿の作成はログインをしてから行ってください。</p>
      @endif
    </div>
  </main>
</body>
</html>