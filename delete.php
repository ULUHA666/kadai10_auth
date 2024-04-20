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
  $pdo = new PDO('mysql:dbname=uluha666_gs_kadai;charset=utf8;host=mysql621.db.sakura.ne.jp','uluha666','uxmu57bk');

} catch (PDOException $e) {
  exit('DBConnection Error:'.$e->getMessage());
}

// // include("funcs.php");
// // $pdo = db_conn();

// //３．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_an_table WHERE id=:id");
$stmt->bindValue(':id',$id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

// //４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  header("Location: select.php");
  exit();
  }
?>
