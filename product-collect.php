<?php
include './parts/db-connect.php';
if(! isset($_SESSION['user'])){
  header("Location: index_.php");
  exit;
}
$title = '會員活動';
$pageName = 'member_activity';

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


// 商品
$sql = sprintf("SELECT * FROM `saved_product` INNER JOIN `products` ON  products.sid = product_sid INNER JOIN color ON color.sid = color_sid
INNER JOIN brand ON color.sid = brand.sid WHERE member_sid =" .$_SESSION['user']['sid']." LIMIT %s, %s", ($page-1)*$perPage, $perPage);
$rows = $pdo->query($sql)->fetchAll();
}

?>

<h4 class="subtitle">商品名稱</h4>
<div class="collections">
    <div class="row wrap">
        <!-- collection items -->
        <?php foreach($rows as $r):
            $img = explode(',',$r['pictures'])[0];
            ?>
        <div class="item" data-pid="<?= $r['product_sid'] ?>">
            <a href="javascript: delete_it(<?= $r['product_sid'] ?>)">
                <div class="remove">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </a>
            <div class="img-wrap">
                <img class="w100"src="./imgs/products-imgs/<?= $img ?>" alt="">
            </div>
            <div class="item-function">
                <div class="row spc-between">
                    <div class="item-info">
                        <p class="pm"><?= $r['brand']?> - <?= ((mb_strlen($r['pdName'], "UTF8")>8) ? mb_substr($r['pdName'],0,8, "UTF8") : $r['pdName'])
                            .' '.((mb_strlen($r['pdName'], "UTF8")>8) ? nl2br(' ...') : nl2br('')) ?> (<?=$r['color']?>)</p>
                        <p class="ps">$<?= number_format($r['price'])?></p>
                    </div>
                    <div class="cart" onclick="addToCart(event)">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>
<div class="pages">
    <div class="container">
        <div class="row">
            <a href="?page=1">
                <div class="pagebtn btn5 <?= $page==1 ? 'disabled': ''?>">
                    <i class="fa-solid fa-angles-left"></i>
                </div>
            </a>

            <a href="?page=<?= $page-1?>">
                <div class="pagebtn btn5 <?= $page==1 ? 'disabled': ''?>">
                
                    <i class="fa-solid fa-angle-left"></i>
                </div>
            </a>

            <?php for($i= $page-3; $i<=$page+3; $i++): 
                if($i >=1 and $i<=$totalPages):
            ?>
            <a class="page-link" href="javascript: changeProductCollectPage(<?= $i ?>)">
                <div class="pagebtn btn5 <?= $i==$page ? 'active' : ''?>">
                        <?= $i ?>
                </div>
            </a>
            <?php endif; 
                endfor; ?>
            <a href="?page=<?= $page+1?>">
                <div class="pagebtn btn5 <?= $page==$totalPages ? 'disabled': ''?>">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
            </a>
            <a href="?page= <?=$totalPages?>">
                <div class="pagebtn btn5 <?= $page==$totalPages ? 'disabled': ''?>">
                    <i class="fa-solid fa-angles-right"></i>
                </div>
            </a>
        </div>
    </div>
</div>
