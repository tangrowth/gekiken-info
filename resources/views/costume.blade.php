<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
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
      <h2 class="main_title">衣装管理</h2>
      <div class="cos_form">
        <form action="/costume" method="POST">
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach 
          @csrf
          <div class="cos_input">
            <label class="cos_input-label">名前<input type="text" name="name" class="cos_input-text"></label>
            <label class="cos_input-label">衣装<input type="text" name="costume" class="cos_input-text"></label>
            <input type="submit" value="借りる" class="search_form-btn">
          </div>
        </form>
      </div>
      <div class="cos_list">
        <table class="cos_list-table">
          <tr>
            <th>貸出日</th>
            <th>名前</th>
            <th>衣装</th>
            <th>返却</th>
          </tr>
          @foreach($costumes as $costume)
          <tr>
            <td>{{ $costume->updated_at }}</td>
            <td>{{ $costume->name }}</td>
            <td>{{ $costume->costume }}</td>
            <td>
              <form action="costume/delete/{{ $costume->id }}" method="POST">
                @csrf
                <input type="submit" value="返却" class="search_form-btn">
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </main>
</body>
</html>