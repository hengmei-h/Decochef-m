<?php
require "./parts/db-connect.php";

$output = [
    'success' => false,
    'error' => '',
    'postData' => $_POST,
    'insertID' => 0,
];

if(! empty($_POST['amount'])){
    // INSERT ORDER
    $sql = "INSERT INTO `order`(
    `order_code`, `member_sid`, `amount`, 
    `payment_method`, `order_date`, `status`, 
    `od_name`, `od_number`) 
    VALUES 
    (?,?,?,
    ?,NOW(),'已完成',
    ?,?)";

    // INSERT ODDER INFO
    $od_sql = "INSERT INTO `order_class_details`
    (`order_code`, `class_sid`, `quantity`, `price`) 
    VALUES(?,?,?,?)";

        $stmt = $pdo->prepare($sql);
        $od_stmt = $pdo->prepare($od_sql);

    
        try{
        // order
            $stmt->execute([ 
                $_POST['order_code'],
                $_SESSION['user']['sid'],
                $_POST['amount'],
                $_POST['payment_method'],
                $_POST['od_name'],
                $_POST['od_mobile'],
            ]);

        // Order-details
            foreach($_SESSION['class_cart'] as $k=>$i){
            $od_stmt->execute([
                $_POST['order_code'],
                $i['sid'],
                $i['quantity'],
                $i['cost'],
                ]);
            }
            
            $output['success'] = !!$stmt->rowCount();
            $output['insertId'] = $pdo->lastInsertId();
            $output['oid'] = $_POST["order_code"];




    } catch (PDOException $ex){
        $output['error'] = '程式發生錯誤';
        $output['info'] = $ex->getMessage();
    }
}

unset($_SESSION['class_cart']);

header('content-Type: application/json');
echo json_encode($output);