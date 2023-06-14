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
    `gift_sid`, `rec_name`, `rec_mobile`, 
    `rec_address`, `shipping`, `payment_method`, 
    `order_date`, `status`, `od_name`, 
    `od_number`) 
    VALUES 
    (?,?,?,
    ?,?,?,
    ?,?,?,
    NOW(),'確認中',?,
    ?)";

    // INSERT ODDER INFO
    $od_sql = "INSERT INTO `order_details`
    (`order_code`, `product_sid`, `quantity`, `price`) 
    VALUES(?,?,?,?)";

    // UPDATE COUPON STATUS
        $cp_sql = "UPDATE `coupon_status` SET `od_code`=? WHERE `sid`=?";

    // card
    $card_sql = "INSERT INTO `gift`
    (`sticker`, `package`, `order_code`, 
    `receiver`, `content`) 
    VALUES (?,?,?,
    ?,?)";

        $stmt = $pdo->prepare($sql);
        $od_stmt = $pdo->prepare($od_sql);
        $cp_stmt = $pdo->prepare($cp_sql);
        $cd_stmt = $pdo->prepare($card_sql);

    
        try{
        // order
            $stmt->execute([
                $_POST['order_code'],
                $_SESSION['user']['sid'],
                $_POST['amount'],
                $_POST['gift_sid'],
                $_POST['rec_name'],
                $_POST['rec_mobile'],
                $_POST['rec_address'],
                $_POST['shipping'],
                $_POST['payment_method'],
                $_POST['od_name'],
                $_POST['od_mobile'],
            ]);

        // Order-details
            foreach($_SESSION['cart'] as $k=>$i){
            $od_stmt->execute([
                $_POST['order_code'],
                $i['sid'],
                $i['quantity'],
                $i['price'],
                ]);
            }

        // coupon
            $cp_stmt->execute([
                $_POST['order_code'],
                $_POST['coupon_sid'],
            ]);

        // card
        $cd_stmt->execute([
            $_POST['card_sticker'],
            $_POST['package'],
            $_POST['order_code'],
            $_POST['card_name'],
            $_POST['card_content']
        ]);

            $output['success'] = !!$stmt->rowCount();
            $output['insertId'] = $pdo->lastInsertId();
            $output['oid'] = $_POST["order_code"];




    } catch (PDOException $ex){
        $output['error'] = '程式發生錯誤';
        $output['info'] = $ex->getMessage();
    }
}

unset($_SESSION['cart']);

header('content-Type: application/json');
echo json_encode($output);