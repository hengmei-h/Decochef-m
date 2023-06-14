<?php
require "./parts/db-connect.php";

$output = [
    'success' => false,
    'error' => '',
    'postData' => $_POST,
    'insertID' => 0,
];

if(! empty($_POST['name'])){

$sql = "INSERT INTO `member`(
    `name`, `nickname`,`id`,
    `birthday`, `mobile`, `email`, 
    `password`, `level`, `create_date`
    ) VALUES (
        ?,?,?,
        ?,?,?,
        ?,'1',NOW()
    )";

$stmt = $pdo->prepare($sql);

$cp_sql = "INSERT INTO `coupon_status` (`sid`, `coupon_sid`, `member_sid`, `od_code`) 
VALUES (null, ?, ?, null);";
$cp_stmt = $pdo->prepare($cp_sql);

try{
    $birthday = empty($_POST['birthday']) ? null : $_POST['birthday'];
    $stmt->execute([
        $_POST['name'],
        $_POST['nickname'],
        $_POST['id'],
        $birthday,
        $_POST['mobile'],
        $_POST['email'],
        $_POST['password']
    ]);
    
    $output['success'] = !!$stmt->rowCount();
    $output['insertId'] = $pdo->lastInsertId();
    $member_sid = $pdo->lastInsertId();

    
    $cp_stmt->execute([
        '1',
        $output['insertId']
    ]);

} catch (PDOException $ex) {
    $output['error'] = '程式發生錯誤';
    $output['info'] = $ex->getMessage();
}
}



header('content-Type: application/json');
echo json_encode($output);