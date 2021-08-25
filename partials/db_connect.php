<?php

$db_host = 'localhost'; // 主機名稱。要連到哪一台主機，php要連到的資料庫在哪裡，目前環境apache跟database都是同一台
$db_name = 'ys-products-db'; // 資料庫名稱
$db_user = 'root'; // 連線用戶
$db_pass = ''; // 用戶密碼
// 編碼不一定要像講義一樣列出

// data source name 主機;資料庫名稱;編碼  *注意標點符號間不可空白*
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8";

// pdo連線設定 
// 兩個:表示常數是定義在類別的，屬性名稱是ATTR開頭的
$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //錯誤訊息會用EXCEPTION的方式，所以要用try-catch方式處理
    // PDO::ATTR_PERSISTENT => false,
    // PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //資料拿出來每一筆都會是關聯式陣列
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" // 連線後要執行的Sql指令 "指令內容"，這邊是資料不管進出，編碼都要是utf8
    //  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8 {$db_charset} COLLATE {$db_collate}"

];

// 如果沒有要做錯誤處理，可以直接
// 變數名稱 = new PDO(dsn,帳號,密碼,設定項目)大寫的是類型
$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);

// 以下是講義的程式碼:
// try {
//     $pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);
// } catch (PDOException $ex) {
//     echo 'Connection faild: ' . $ex->getMessage();
// }

// if (!isset($_SESSION)) {
//     session_start();
// }
