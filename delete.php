<?php
include('functions.php');

//1. GETデータ取得
$id = $_GET['id'];

//2. DB接続します(エラー処理追加)
$pdo = db_conn();

//3．データ登録SQL作成
$sql = 'DELETE FROM gs_todo_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header('Location:select.php');
    exit;
}