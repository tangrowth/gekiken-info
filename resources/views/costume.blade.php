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
    <a href="../"><h1>衣装進捗報告</h1></a>
  </header>

  <main>
    <h2>衣装管理</h2>
    <div class="cos_index">
      <table>
        <tr>
          <th>貸出日</th>
          <th>名前</th>
          <th>衣装</th>
          <th>返却</th>
        </tr>
        <form action="/costume" method="POST">
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach 
          @csrf
          <label>名前<input type="text" name="name"></label>
          <label>衣装<input type="text" name="costume"></label>
          <input type="submit" value="借りる">
        </form>
        @foreach($costumes as $costume)
        <tr>
          <td>{{ $costume->updated_at }}</td>
          <td>{{ $costume->name }}</td>
          <td>{{ $costume->costume }}</td>
          <td>
            <form action="costume/delete/{{ $costume->id }}" method="POST">
              @csrf
              <input type="submit" value="返却">
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </main>
</body>
</html>