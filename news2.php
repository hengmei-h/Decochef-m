<?php
include './parts/db-connect.php';

$title = 'news2';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;   //指定參數

// echo json_encode($sid) ; 

//如果沒有回到前一頁
if (!$sid) {
    header('Location: news_main.php');
    exit;
}

//section1-新聞資訊-----------------------------
$sql = "SELECT * FROM news WHERE sid = $sid "; //sql部分獨立出來
$r = $pdo->query($sql)->fetch(); //選取指定的內容
if (empty($r)) {
    header('Location: news_main.php');
    exit;
}
// echo json_encode($r);

?>

<?php include './parts/html_head.php' ?>
<link rel="stylesheet" href="./style/news2.css">
<style>

</style>
<?php include './parts/navbar.php' ?>

    
<!-- section1-新聞內文資訊----------- -->
<section class="news_introduce">
    <div class="news_intro container">
        <div class="title_all">
            <a href="news_main.php">
                <div class="news_title pl white">ALL</div>
            </a>
            <h4>></h4>
            <h4 class="title_h4"><?= $r['news_title'] ?></h4>
        </div>
        <div class="news2_content<?= $r['sid'] ?>">
            <div class="news2_img">
                <img src="imgs/news1/newsCard/<?= $r['news_imgs'] ?>" alt="">
            </div>
            <div class="news_text">
                <p><?= $r['news_time'] ?></p>
                <br>
                <p>
                <?= $r['news_content'] ?>   
                當天我們很榮幸的邀請到日本麗克特社長等貴賓，與我們齊聚同歡。
                另外，我們也特別榮幸的邀請到知名主持人「黃子佼」來為我們主持活動，
                當然也少不了來自日本的知名料理家「江田淳哉」。
                料理會上，江田淳哉為我們示範了6道料理，
                分別使用了【三明治機】、【電烤箱】、【電燒烤盤】、【調理鍋】、【時尚小型調理機】和即將上市的【迷你煎烤盤】。
                Melt迷你煎烤盤 – 厚切培根佐蘆筍
                </p>
            </div>
        </div>
    </div>
</section>

<?php include './parts/footer.php' ?>

<?php include './parts/scripts.php' ?>


<!-- js/jq script 的架構貼這邊 -->
<script>




</script>
<?php include './parts/html_foot.php' ?>