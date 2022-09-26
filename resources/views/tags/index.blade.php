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
    <a href="/"><h1>衣装進捗報告</h1></a>
    <nav>
      <ul>
        <li><a href="/">検索</a></li>
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
      <h2>{{$tags->tag}}投稿一覧</h2>
      @foreach ($posts as $post)
      <div class="card">
          <h3><a href="">{{ $post->title }}</a></h3>
          <p>{{$post->content}}</p>
          <a href="../users/{{$post->user_id}}">{{$post->user->name}}</a>
          <a href="../tags/{{$post->tag_id}}">{{$post->tag->tag}}</a>
          <p>{{$post->created_at}}</p>
      </div>
      @endforeach
    </div>
    <div class="tags">
      <h2>タグ一覧</h2>
      <ul>
        @foreach($categories as $tag)
        <li><a href="../tags/{{$post->tag_id}}">{{$tag->tag}}</a></li>
        @endforeach
      </ul>
    </div>
  </main>
</body>
</html>