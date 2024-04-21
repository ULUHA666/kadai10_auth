
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<?php
session_start();
//1. POSTデータ取得
$id = $_GET["id"];
include("funcs.php");
sschk();
// echo $id;
// //2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  // $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
 
} catch (PDOException $e) {
  exit('DBConnection Error:'.$e->getMessage());
}

// // include("funcs.php");
// // $pdo = db_conn();

// //３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
$stmt->bindValue(':id',$id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

// //４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
    $values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]

}
?>

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
  <form method="POST" action="update.php">
    <div class="jumbotron">
      <fieldset>
        <legend>ブックマークアプリ詳細</legend>
        <?php foreach($values as $v){ ?>

        <label>書籍名：<input type="text" name="name"  value="<?=$v["name"]?>"></label><br>
        <label>書籍URL：<input type="text" name="email"  value="<?=$v["email"]?>"></label><br>
        <label>発売日：<input type="text" name="age"  value="<?=$v["age"]?>"></label><br>

        <label>書籍コメント<textArea name="naiyou" rows="4" cols="40"><?=$v["naiyou"]?></textArea></label><br>
        <input type="hidden" name="id" value="<?=$v["id"]?>">

      <?php } ?>
      <input type="submit" value="送信">

      </fieldset>
    </div>
  </form>
  <!-- Main[End] -->

  <div class="navbar-header"><a class="navbar-brand" href="select.php">登録データ一覧参照</a></div>
</body>

</html>
