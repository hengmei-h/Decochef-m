<?php
include './parts/db-connect.php';

$perPage = 12;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header("Location: ?page=1");
    exit;
}
$params = [];

// $category_sid = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
#$color_sid = isset($_GET['color']) ? intval($_GET['color']) : 0;
// $brand_sid = isset($_GET['brand']) ? intval($_GET['brand']) : 0;



$where = ' WHERE 1 ';

if (!empty($_GET['categories'])) {
    $where .= sprintf(" AND `category_sid` IN  (%s)", implode(',', $_GET['categories']));
}
if (!empty($_GET['colors'])) {
    $where .= sprintf(" AND `color_sid` IN  (%s)", implode(',', $_GET['colors']));
}
if (!empty($_GET['brands'])) {
    $where .= sprintf(" AND `brand_sid` IN  (%s)", implode(',', $_GET['brands']));
}

if (!empty($_GET['price'])) {
    switch ($_GET['price']) {
        case 1:
            $where .= " AND (price>=0 AND price<1000 ) ";
            break;
        case 2:
            $where .= " AND (price>=1000 AND price<3000 ) ";
            break;
        case 3:
            $where .= " AND (price>=3000 AND price<5000 ) ";
            break;
        case 4:
            $where .= " AND (price>=5000 AND price<7000 ) ";
            break;
        case 5:
            $where .= " AND price>=7000 ";
            break;
    }
}

$t_sql = "SELECT COUNT(1) FROM products_view $where";

$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];


//////
if ($totalRows > 0) {
    // 計算總頁數
    $totalPages = ceil($totalRows / $perPage); #資料筆數
    if ($page > $totalPages) {
        header("Location: products-list-demo1.php?page={$totalPages}");
        exit;
    }


    //////

    $sql = sprintf("SELECT * FROM products_view $where LIMIT %s, %s", ($page - 1) * $perPage, $perPage); #資料筆數
    // echo $sql;
    $products = $pdo->query($sql)->fetchAll();
}

// 商品收藏
$sp_sql = "SELECT * FROM `saved_product` WHERE member_sid =".$_SESSION['user']['sid']; 
$sp_rows = $pdo->query($sp_sql)->fetchAll();

?>

<div class="products-list-wrap">
    <?php foreach ($products as $r) :
        $img = explode(',', $r['pictures'])[0]
    ?>

        <div class="item" data-pid="<?= $r['sid'] ?>">
            <!-- <div class="item-save"><i class="fa-regular fa-heart"></i></div> -->
            <div class="item-save">
                <a href="javascript: tosaved(<?= $r['sid'] ?>)">
                    <i class="<?= in_array($r['sid'], array_column($sp_rows, 'product_sid')) ? "fa-solid" : "fa-regular" ?> fa-heart"></i>
                </a>
            </div>

            <a href="products-intro.php?sid=<?= $r['sid'] ?>">
                <div class="img-wrap">
                    <img src="imgs/products-imgs/<?= $img ?>" alt="">
                </div>
            </a>
            <div class="item-function">
                <div class="row spc-between">
                    <div class="item-info">
                        <p class="pm"><?= $r['brand'] ?> - <?= $r['pdName'] ?>(<?= $r['color'] ?>)</p>
                        <p class="ps"><i class="fa-solid fa-dollar-sign"></i><?= $r['price'] ?></p>
                    </div>
                    <div class="cart" onclick="addToCart(event)">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach ?>

</div>
<div class="pages">
    <div>
        <div class="row">
            <ul class="page-item-f">
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="fa-solid fa-angles-left"></i>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="javascript: getProductData(<?= $page - 1 ?>)">
                        <i class="fa-solid fa-angle-left"></i>
                    </a>
                </li>

                <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
                    if ($i >= 1 and $i <= $totalPages) :
                        $p = $params; #複製
                        $p['page'] = $i; #把頁碼加進來
                ?>
                        <li class="page-item">
                            <a class="page-link" href="javascript: getProductData(<?= $i ?>)"><?= $i ?></a>
                        </li>
                <?php endif;
                endfor; ?>

                <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                    <a class="page-link" href="javascript: getProductData(<?= $page + 1 ?>)">
                        <i class="fa-solid fa-angle-right"></i>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="fa-solid fa-angles-right"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>

<script>
    $('.page-item a.page-link').each(function() {

        if ($(this).text() == currentPage) {
            $(this).css({
                textDecoration: 'underline 2px #CBAC8D',
                color: '#CBAC8D',
            })
        }

    })
</script>