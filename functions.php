<?php

//DB接続関数
function db_conn(){
    $dbn = 'mysql:dbname=gsf_l01_db03;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    try{
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        exit('dbError:' .$e->getMessage());
    }
}

//SQL処理エラー
function errorMsg($stmt){
    $error = $stmt->errorInfo();
    exit('ErrorQuery:' .$error[2]);
}

function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}