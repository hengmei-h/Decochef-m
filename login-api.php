<?php
header('Content-Type: application/json');
require "./parts/db-connect.php";


$output = [
  'success' => false,
  'error' => '',
  'postData' => $_POST,
  'code' => 0,
];


if (!empty($_POST['email']) and !empty($_POST['password'])) {
  $output['code'] = 100;

  $sql = "SELECT  `sid`, `name`, `nickname`, `id`, `birthday`, `mobile`, `email`, `address`, `password`, `protrait`, `level`, `bonus` FROM `member` WHERE `email`=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    $_POST['email'],
  ]);
  $row = $stmt->fetch();

  #驗證email
  if (!empty($row)) {
    $output['code'] = 200;
    // if (password_verify($_POST['password'], $row['password'])) {
    if ($_POST['password']==$row['password']) {
      // $output['code']=300;
      $output['success'] = true;
      // $output['userData'] = $row;
      $_SESSION['user'] = $row; #紀錄登入狀態
    }
  }
}


echo json_encode($output);
