<?php
require "./parts/db-connect.php";

$output = [
    'success' => false,
    'error' => '',
    'postData' => $_POST,
    'insertID' => 0,
];

if(! empty($_POST['pro_img'])){

    $sql = "UPDATE `member` SET `protrait`=? 
    WHERE sid=".$_SESSION['user']['sid'];
    
    $stmt = $pdo->prepare($sql);

    try{
    $stmt->execute([
        $_POST['pro_img'],
    ]);

    $output['success'] = !!$stmt->rowCount();
    $output['insertId'] = $pdo->lastInsertId();
    }catch (PDOException $ex) {
        $output['error'] = '程式發生錯誤';
        $output['info'] = $ex->getMessage();
    }
    
}

header('content-Type: application/json');
echo json_encode($output);