<?php
require "./parts/db-connect.php";

$output = [
    'success' => false,
    'error' => '',
    'postData' => $_POST,
    'insertID' => 0,
    // 'code' => ''  //check steps
];


if (! empty($_POST['receiver'])) {
    
    $sql = "INSERT INTO `gift`(
        `member_sid`, `receiver`, `content`,`sticker`
        ) VALUES (?,?,?,?)";


    $stmt = $pdo->prepare($sql);
    
    try{
       
        $stmt->execute([
        $_SESSION['user']['sid'],    //合併要改成user
        $_POST['receiver'],
        $_POST['content'],
        $_POST['sticker']
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