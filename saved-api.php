<?php
// test
// echo $_SERVER['HTTP_REFER'];
// exit;

require "./parts/db-connect.php";

if(! empty($_GET['sid'])){
    $sql = "INSERT INTO `saved_product`
    (`member_sid`, `product_sid`)
    VALUES (
      ?,?
    )";

  $stmt = $pdo->prepare($sql);

  $stmt->execute([
  $_SESSION['user']['sid'],
  $_GET['sid']
  ]);
}

$come_from = $_SERVER['HTTP_REFERER'] ?? 'list.php';
header("Location: $come_from");