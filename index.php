<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>登録フォーム</title>
  <link rel='stylesheet' href='css/style.css'>

  <style>
    div {
      padding: 10px;
      font-size: 16px;
    }
  </style>
</head>

<body>

  <!-- Head[Start] -->
  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
      </div>
    </nav>
  </header>
  <!-- Head[End] -->

  <!-- Main[Start] -->
  <form method="POST" action="insert.php">
    <div class="jumbotron">
      <fieldset>
        <legend>ブックマークアプリ</legend>
        <label>書籍名：<input type="text" name="name"></label><br>
        <label>書籍URL：<input type="text" name="email"></label><br>
        <label>発売日：<input type="text" name="age"></label><br>

        <label>書籍コメント<textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
        <input type="submit" value="送信">
      </fieldset>
    </div>
  </form>
  <!-- Main[End] -->

  <div class="navbar-header"><a class="navbar-brand" href="select.php">登録データ一覧参照</a></div>
</body>

</html>