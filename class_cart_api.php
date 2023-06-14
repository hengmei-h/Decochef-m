<?php
require "./parts/db-connect.php";

# CRUD # $_SESSION['class']
# cmd=add,update,remove,clear,read(no params)
# add: pid, quantity (加入)
# update: pid, quantity (更新項目)
# remove: pid (移除項目)
# clear: (清空整個購物車)


# 以編號 (sid) 去找商品資料
function findProduct($pdo, $pid) {
  $sql = "SELECT `sid`, `pic`, `type_sid`, `title`, `cost`, `time`,`deadline`, `location`, `product_sid`, `teacher_name` FROM class WHERE `sid`={$pid}";
  return $pdo->query($sql)->fetch();
}

if (!isset($_SESSION['class_cart'])) {
  $_SESSION['class_cart'] = [];
}

$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : 'read';
$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
$quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1;

switch ($cmd) {
  case 'add':
  case 'update':
    if ($pid >= 1) {
      if (empty($_SESSION['class_cart'][$pid])) {
              $item = findProduct($pdo, $pid);
      if (!empty($item)) {
        $item['quantity'] = $quantity;
        $_SESSION['class_cart'][$pid] = $item;
      }
    } else {
      if ($cmd == 'add')
      $_SESSION['class_cart'][$pid]['quantity'] += $quantity;
      else
      $_SESSION['class_cart'][$pid]['quantity'] = $quantity;
      }
    }
    break;
  case 'remove':
    unset($_SESSION['class_cart'][$pid]);
    break;
  case 'clear':
    $_SESSION['class_cart'] = [];
    break;
  default:
}

echo json_encode([
  'data' => $_SESSION['class_cart'],
  'seq' => array_keys($_SESSION['class_cart'])
], JSON_UNESCAPED_UNICODE);
