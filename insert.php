<?php
include('functions.php');

// 入力チェック
if (
    !isset($_POST['task']) || $_POST['task']=='' ||
    !isset($_POST['deadline']) || $_POST['deadline']==''
) {
    exit('ParamError');
}

//POSTデータ取得
$task = $_POST['task'];
$deadline = $_POST['deadline'];
$comment = $_POST['comment'];

//DB接続
$pdo = db_conn();

//データ登録SQL作成
$sql ='INSERT INTO gs_todo_table(id, task, deadline, comment, indate)
VALUES(NULL, :a1, :a2, :a3, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $task, PDO::PARAM_STR);
$stmt->bindValue(':a2', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':a3', $comment, PDO::PARAM_STR);
$status = $stmt->execute();

//データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
} else {
    header('Location: index.php');
}
