<?php
include './parts/db-connect.php';

$perPage = 9;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header("Location: news_main_content.php"); //設定回應頁面
    //Location 做轉向
    exit;
}

$totalPages  = 0; # 總頁數預設值
$row = []; # 分頁資料

$t_sql = "SELECT COUNT(1) FROM news";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
if ($totalRows > 0) {
    $totalPages = ceil($totalRows / $perPage);
    if ($page > $totalPages) {
        header("Location: news_main_content.php?page={$totalPages}"); //設定回應頁面
        //Location 做轉向
        exit;
    }
    $sql = sprintf("SELECT * FROM `news`  ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $row = $pdo->query($sql)->fetchAll();
}



// echo json_encode([
//     '$totalRows' => $totalRows ,
//     '$totalPages'=> $totalPages,
//     '$page'=> $page,
//     '$row'=>$row
// ]); 

// $sql = "SELECT * FROM news LIMIT 9 "; //sql部分獨立出來
// $newsContent = $pdo->query($sql)->fetchAll(); //選取全部的內容
?>
<!-- <style>

</style> -->



<?php foreach ($row as $r) : ?>
    <div class="newsCard">
        <div class="newsimgs">
            <img src="imgs/news1/newsCard/<?= $r['news_imgs'] ?>" alt="" />
        </div>
        <a href="news2.php?sid=<?= $r['sid'] ?>">
            <div class="newstext" style="color:white">
                <div>
                    <h6> <?= $r['news_time'] ?> </h6>
                    <br>
                    <p> <?= $r['news_title'] ?> </p>
                </div>
                <div class="btn">
                    <img src="imgs/news1/button.png" alt="">
                </div>
            </div>
        </a>
    </div>
<?php endforeach ?>


<div class="muibox_root">
    <a href="?page=<?= $page - 1 ?>" class="muibox_icon <?= $i == 1 ? 'disabled' : '' ?>">
        <i class="fa-solid fa-angle-left"></i>
    </a>

    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
        <button class="muibox_form <?= $i == $page ? 'active' : '' ?>" onclick="loadnewsContent(<?= $i ?>)"><?= $i ?></button>
    <?php endfor ?>


    <a href="?page=<?= $page + 1 ?>" class="muibox_icon <?= $i == $totaPages ? 'disabled' : '' ?>">
        <i class="fa-solid fa-angle-right"></i>
    </a>
</div>