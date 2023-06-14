<?php
require "./parts/db-connect.php";

$output = [
    'success' => false,
    'error' => '',
    'postData' => $_POST,
    'rowCount' => 0,
];

if (!empty($_POST['email']) and !empty($_POST['address'])) {

    # TODO: 其他欄位的資料格式檢查

    $sql = "UPDATE `member` SET
    `name`=?,
    `nickname`=?,
    `mobile`=?,
    `email`=?,
    `address`=?
    WHERE `sid`=?";

    
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
          $_POST['name'],
          $_POST['nickname'],
          $_POST['mobile'],
          $_POST['email'],
          $_POST['address'],
          $_SESSION['user']['sid']
        ]);
        $output['success'] = !!$stmt->rowCount();
        $output['rowCount'] = $stmt->rowCount(); #修改看筆數
      } catch (PDOException $ex) {
        $output['error'] = '程式發生錯誤';
        $output['info'] = $ex->getMessage();
      }
    }
    
  // if (!empty($_POST['name']) and !empty($_POST['mobile'])) {

  //   $sql = "UPDATE `member` SET
  //   `name`=?,
  //   `mobile`=?,
  //   WHERE `sid`=?";

    
  //   $stmt = $pdo->prepare($sql);

  //   try {
  //       $stmt->execute([
  //         $_POST['name'],
  //         $_POST['mobile'],
  //         $_SESSION['user']['sid']
  //       ]);
  //       $output['success'] = !!$stmt->rowCount();
  //       $output['rowCount'] = $stmt->rowCount(); #修改看筆數
  //     } catch (PDOException $ex) {
  //       $output['error'] = '無法修改資料';
  //       $output['info'] = $ex->getMessage();
  //     }
  //   }


header('Content-Type: application/json');
echo json_encode($output);
