<?php
include './parts/db-connect.php';
$title = '體驗課程';
$pageName = 'class';

//  $cate = isset($_GET['cate']) ? intval($_GET['cate']) : 1;
// $cate = 1; #固定是一項
/*
$type_sid = isset($_GET['type_sid']) ? intval($_GET['type_sid']) : 0;
if ($type_sid != 0) {
  // print($type_sid);
  $r_sql = "SELECT * FROM `class` WHERE `type_sid`=$type_sid ORDER BY `sid` DESC LIMIT 6"; #第一項第一種 /從資料庫裡面sql裡面拿 
} else {
  // print($type_sid);
  $r_sql = "SELECT * FROM `class` ORDER BY `sid` DESC LIMIT 6";
}
$rows = $pdo->query($r_sql)->fetchAll();

*/

#換頁
$perPage = 6;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
  header("Location: class1_main_content.php"); // 設定回應的檔頭
  // Location 做轉向, 跳轉到別的頁面 (redirect)
  exit;
}

#取得所有商品
$where = ' WHERE 1 ';
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0; //所有商品
if (!empty($cate)) {
  $where .= " AND type_sid={$cate}";
}

$totalPages = 0; # 總頁數預設值
$rows = []; # 分頁資料

$t_sql = "SELECT COUNT(1) FROM class $where";
// 計算總筆數
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
if ($totalRows > 0) {
  // 計算總頁數
  $totalPages = ceil($totalRows / $perPage);
  if ($page > $totalPages) {
    header("Location: class1_main_text?page={$totalPages}");
    exit;
  }

  $sql = sprintf("SELECT * FROM `class`$where ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
  $rows = $pdo->query($sql)->fetchAll();
}

// echo json_encode([
//   'totalRows' => $totalRows,
//   'totalPages' => $totalPages,
//   'page' => $page,
//   'rows' => $rows,
//   'perPage' => $perPage,
// ]);
?>

<style>

</style>
  <?php foreach ($rows as $r) : ?>
    <div class="classCard" data-pid="<?= $r['sid'] ?>">
      <div class="classimgs">
        <a href="class2.php?sid=<?= $r['sid'] ?>">
          <img src="<?= $r['pic'] ?>" alt="" />
        </a>
      </div>
      <div class="classtext">
        <h6 style="color: #a24d38"><?= $r['time'] ?></h6>
        <h6><?= $r['title'] ?></h6>
        <h6>剩餘名額 : <?= $r['max'] ?></h6>
        <div class="costt">
          <div class="heart" style="color: #a24d38">
            <i class="fa-solid fa-heart"></i>
          </div>
          <div>
            <h6>$<?= number_format( $r['cost'])?></h6>
          </div>
          <a class="btn2 btn-s class_cart" onclick="addToClass(event)">
            <i class="fa-solid fa-cart-plus"></i>
          </a>
        </div>
      </div>
    </div>
  <?php endforeach ?>


<div class="muibox_root">
  <a href="?page=<?= $page - 1 ?>" class="muibox_icon <?= $i == 1 ? 'disabled' : '' ?>">
    <i class="fa-solid fa-angle-left"></i>
  </a>

  <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
    <button readonly class="muibox_form <?= $i == $page ? 'active' : '' ?>" onclick="typeContent(<?= $cate ?>, <?= $i ?>)"><?= $i ?></button>
  <?php endfor ?>

  <a href="?page=<?= $page + 1 ?>" class="muibox_icon <?= $i == $totaPages ? 'disabled' : '' ?>">
    <i class="fa-solid fa-angle-right"></i>
  </a>
</div>