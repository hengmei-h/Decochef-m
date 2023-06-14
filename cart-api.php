<?php
require "./parts/db-connect.php";

# CRUD # $_SESSION['cart']
# cmd=add,update,remove,clear,read(no params)
# add: pid, quantity (加入)
# update: pid, quantity (更新項目)
# remove: pid (移除項目)
# clear: (清空整個購物車)


# 以編號 (sid) 去找商品資料
function findProduct($pdo, $pid) {
  $sql = "SELECT
  products.sid, products.pdName, products.model, products.category_sid, products.price, products.pictures, brand.brand, color.color
  FROM products 
  INNER JOIN color ON color.sid = products.color_sid
  INNER JOIN brand ON brand.sid = products.brand_sid
  WHERE products.sid={$pid}";
  return $pdo->query($sql)->fetch();
}

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : 'read';
$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
$quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1;

switch ($cmd) {
  case 'add':
  case 'update':
    if ($pid >= 1) {
      if (empty($_SESSION['cart'][$pid])) {
              $item = findProduct($pdo, $pid);
      if (!empty($item)) {
        $item['quantity'] = $quantity;
        $_SESSION['cart'][$pid] = $item;
      }
    } else {
      if ($cmd == 'add')
      $_SESSION['cart'][$pid]['quantity'] += $quantity;
      else
      $_SESSION['cart'][$pid]['quantity'] = $quantity;
      }
    }
    break;
  case 'remove':
    unset($_SESSION['cart'][$pid]);
    break;
  case 'clear':
    $_SESSION['cart'] = [];
    break;
  default:
}

echo json_encode([
  'data' => $_SESSION['cart'],
  'seq' => array_keys($_SESSION['cart'])
], JSON_UNESCAPED_UNICODE);
