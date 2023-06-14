<?php
include './parts/db-connect.php';
if(! isset($_SESSION['user'])){
  header("Location: index_.php");
  exit;
}
$title = '會員活動';
$pageName = 'member_activity';

$perPage = 4;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// if($page < 1){
//     header("Location: activity.php");
//     exit;
// }
$totalPages = 0; #總頁數的預設值
$rows = []; # 分頁資料

$ar_sql = "SELECT COUNT(1) FROM saved_article WHERE member_sid=". $_SESSION['user']['sid'];
//計算總筆數
$totalRows = $pdo->query($ar_sql)->fetch(PDO::FETCH_NUM)[0];

// 如果有資料
if ($totalRows > 0){
//計算總頁數
$totalPages = ceil($totalRows/$perPage);
if($page > $totalPages) {
    // header("Location: list.php?page={$totalPages}");
    // exit;
}

// 商品
$sql = sprintf("SELECT * FROM `saved_article` 
INNER JOIN `recipe_list` ON recipe_list.sid_id = article_sid 
LIMIT %s, %s", ($page-1)*$perPage, $perPage);

$rows = $pdo->query($sql)->fetchAll();
}
?>

<h4 class="subtitle">文章列表</h4>
            <div class="collections">
                <div class="row wrap">
                <?php foreach($rows as $r):?>
                    <div class="article-item">
                        <div class="remove">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                        <div class="m-wrap noh-row">
                            <div class="img-wrap-col">
                                <img class="w100"  src="./imgs/recipe_imgs/<?= $r['picture']?>" alt="">
                            </div>
                            <div class="article-info">
                                <h6><?= $r['title']?></h6>
                                <p><?= 
                                ((mb_strlen($r['description'], "UTF8")>20) ? mb_substr($r['description'],0,20, "UTF8") : $r['description'])
                                .' '.((mb_strlen($r['description'], "UTF8")>20) ? nl2br(' ...') : nl2br(''))
                                ?></p>
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
                        <a class="page-link" href="javascript: changearticleCollectPage(<?= $i ?>)">
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