<?php
include './parts/db-connect.php';

$perPage = 8;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// if($page < 1){
//     header("Location: activity.php");
//     exit;
// }
$totalPages = 0; #總頁數的預設值
$rows = []; # 分頁資料

$t_sql = "SELECT COUNT(1) FROM saved_product WHERE member_sid=". $_SESSION['user']['sid'];
//計算總筆數
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

// 如果有資料
if ($totalRows > 0){
//計算總頁數
$totalPages = ceil($totalRows/$perPage);
if($page > $totalPages) {
    // header("Location: list.php?page={$totalPages}");
    // exit;
}

// 先排序再拿資料，順序不可對調
$sql = sprintf("SELECT * FROM `saved_product` LIMIT %s, %s", ($page-1)*$perPage, $perPage);
// 依據頁數編碼決定拿哪裡到哪裡的資料
$rows = $pdo->query($sql)->fetchAll();
}