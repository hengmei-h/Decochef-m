<?php
// test
// echo $_SERVER['HTTP_REFER'];
// exit;

require "./parts/db-connect.php";

if(! empty($_GET['sid'])){
    $sql = "DELETE FROM `saved_product` WHERE Product_sid=". intval($_GET['sid']);
    $pdo->query($sql);
}
$come_from = $_SERVER['HTTP_REFERER'] ?? 'list.php';
header("Location: $come_from");