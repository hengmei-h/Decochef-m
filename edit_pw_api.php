<?php
require "./parts/db-connect.php";

$output = [
    'success' => false,
    'error' => '',
    'postData' => $_POST,
    'rowCount' => 0,
];

if ($_POST['old_password']==$_SESSION['user']['password']) {
    # TODO: 其他欄位的資料格式檢查

    $sql = "UPDATE `member` SET
    `password`=?
    WHERE `sid`=?";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
          $_POST['password'],
          $_SESSION['user']['sid']
        ]);
        $output['success'] = !!$stmt->rowCount();
        $output['rowCount'] = $stmt->rowCount(); #修改看筆數
      } catch (PDOException $ex) {
        $output['error'] = '程式發生錯誤';
        $output['info'] = $ex->getMessage();
      }
    }

header('Content-Type: application/json');
echo json_encode($output);
