<?php
require "./parts/db-connect.php";

$output = [
    'success' => false,
    'error' => '',
    'postData' => $_POST,
    'insertID' => 0,
    'user_sid' => $_SESSION['user']['sid'],
];

if (!empty($_POST['package'])) {

    $sql = "INSERT INTO `gift`(
        `member_sid`, `package`
        ) VALUES (?,?)";

    $stmt = $pdo->prepare($sql);

    try{
        $stmt->execute([
            $_SESSION['user']['sid'],  //合併要改成user
            $_POST['package']
        ]);
        $output['success'] = !!$stmt->rowCount();
        $output['insertId'] = $pdo->lastInsertId();
    } catch (PDOException $ex) {
        $output['error'] = '程式發生錯誤';
        $output['info'] = $ex->getMessage();
    }
}

header('content-Type: application/json');
echo json_encode($output);