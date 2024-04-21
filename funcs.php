<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//2. DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    // $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');


} catch (PDOException $e) {
    exit('DBConnection Error:' . $e->getMessage());
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header("Location: " . $file_name);
    exit();
}

//SessionCheck(スケルトン)
function sschk(){
    if (!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()) {
        exit("Login Error");
    } else {
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();
    }
}
