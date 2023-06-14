<?php

include './parts/db-connect.php';
$title = '最新消息';
$pageName = 'news';

// $perPage = 9;
// $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// $t_sql = "SELECT COUNT(1) FROM news";
// $totalRows = $pdo ->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
// $totalPages = ceil($totalRows/$perPage);

// echo json_encode([
//     '$totalRows' => $totalRows ,
//     '$totalPages'=> $totalPages,

// ]); 
// exit;
// $sql = "SELECT * FROM news LIMIT 9 "; //sql部分獨立出來
// $newsContent = $pdo->query($sql)->fetchAll(); //選取全部的內容
?>

<?php include './parts/html_head.php' ?>
<link rel="stylesheet" href="./style/news1.css">
<style>

</style>
<?php include './parts/navbar.php' ?>

<!-- section1-kv輪播牆------------>
<!--yutobe輪播牆-->
<section class="newsKv">
    <div class="newsKvcontent">
        <div class="newsKvtitle">
            <h2>HOT!!!最新消息</h2>
        </div>
        <ul class="slides">
            <input type="radio" id="control-1" name="control" checked>
            <input type="radio" id="control-2" name="control">
            <input type="radio" id="control-3" name="control">
            <li class="slide">
                <div class="slideCard">
                    <h5>Giaretti 10L蒸氣烤箱 - 米亮登場</h5>
                    <p>Decochef春季新品 蒸氣烘焙烤箱 上市！Giaretti 蒸氣烘焙烤箱 - 米色 亮麗登場 ~ 療癒放鬆的心 ~ </p>
                </div>
            </li>
            <li class="slide">
                <div class="slideCard">
                    <h5>年度最佳優良企業-Decochef</h5>
                    <p>我們非常榮幸地宣布，Decochef公司榮獲【年度最佳優良企業】的殊榮！這是對我們團隊不懈努力和卓越成就的極高肯定。
                   </p>
                </div>
            </li>
            <li class="slide">
                <div class="slideCard">
                    <h5>陽光健跑體驗活動-廚房小家電好禮大方送</h5>
                    <p>您是否渴望融入健康的生活方式，同時還能享受驚喜好禮？現在，我們誠摯邀請您參加我們精心策劃的晨跑體驗活動！在這個活動中，您不僅可以感受到早晨的清新氛圍和運動的快樂，還有機會贏得令人興奮的家電好禮！</p>
                </div>
            </li>
            <div class="controls-visible">
                <label for="control-1"></label>
                <label for="control-2"></label>
                <label for="control-3"></label>
            </div>
        </ul>
    </div>
</section>

<!-- section2-新聞頁面------------->
<section class="news bg-section">
    <div class="content">
        <h2 class="newstitle white">NEWS</h2>
        <div class="newscontent ">
            <!-- <div class="newsCard">
                <div class="newsimgs">
                    <img src="imgs/class1/pocard.png" alt="" />
                </div>
                <div class="newstext " style="color:white">
                    <h6>2021-06-23</h6>
                    <p>Plaid 厚燒格子三明治機 花紋/微笑款 限定上市</p>
                    <div class="btn">
                        <img src="imgs/news1/button.png" alt="">
                    </div>
                </div>
            </div>
            <div class="newsCard">
                <div class="newsimgs">
                    <img src="imgs/class1/pocard.png" alt="" />
                </div>
                <div class="newstext " style="color:white">
                    <h6>HI,How are you!</h6>
                    <p>We Can’t Let Parents and Teachers Be Pitted Against Each Other In Debate Over School Reopenings</p>
                    <div class="btn">
                        <img src="imgs/news1/button.png" alt="">
                    </div>
                </div>
            </div>
            <div class="newsCard">
                <div class="newsimgs">
                    <img src="imgs/class1/pocard.png" alt="" />
                </div>
                <div class="newstext " style="color:white">
                    <h6>HI,How are you!</h6>
                    <p>We Can’t Let Parents and Teachers Be Pitted Against Each Other In Debate Over School Reopenings</p>
                    <div class="btn">
                        <img src="imgs/news1/button.png" alt="">
                    </div>
                </div>
            </div>
            <div class="newsCard">
                <div class="newsimgs">
                    <img src="imgs/class1/pocard.png" alt="" />
                </div>
                <div class="newstext " style="color:white">
                    <h6>HI,How are you!</h6>
                    <p>We Can’t Let Parents and Teachers Be Pitted Against Each Other In Debate Over School Reopenings</p>
                    <div class="btn">
                        <img src="imgs/news1/button.png" alt="">
                    </div>
                </div>
            </div>
            <div class="newsCard">
                <div class="newsimgs">
                    <img src="imgs/class1/pocard.png" alt="" />
                </div>
                <div class="newstext " style="color:white">
                    <h6>HI,How are you!</h6>
                    <p>We Can’t Let Parents and Teachers Be Pitted Against Each Other In Debate Over School Reopenings</p>
                    <div class="btn">
                        <img src="imgs/news1/button.png" alt="">
                    </div>
                </div>
            </div>
            <div class="newsCard">
                <div class="newsimgs">
                    <img src="imgs/class1/pocard.png" alt="" />
                </div>
                <div class="newstext " style="color:white">
                    <h6>HI,How are you!</h6>
                    <p>We Can’t Let Parents and Teachers Be Pitted Against Each Other In Debate Over School Reopenings</p>
                    <div class="btn">
                        <img src="imgs/news1/button.png" alt="">
                    </div>
                </div>
            </div>
            <div class="newsCard">
                <div class="newsimgs">
                    <img src="imgs/class1/pocard.png" alt="" />
                </div>
                <div class="newstext " style="color:white">
                    <h6>HI,How are you!</h6>
                    <p>We Can’t Let Parents and Teachers Be Pitted Against Each Other In Debate Over School Reopenings</p>
                    <div class="btn">
                        <img src="imgs/news1/button.png" alt="">
                    </div>
                </div>
            </div>
            <div class="newsCard">
                <div class="newsimgs">
                    <img src="imgs/class1/pocard.png" alt="" />
                </div>
                <div class="newstext " style="color:white">
                    <h6>HI,How are you!</h6>
                    <p>We Can’t Let Parents and Teachers Be Pitted Against Each Other In Debate Over School Reopenings</p>
                    <div class="btn">
                        <img src="imgs/news1/button.png" alt="">
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>

<?php include './parts/footer.php' ?>

<?php include './parts/scripts.php' ?>


<!-- js/jq script 的架構貼這邊 -->
<script>
    //導入新聞內容
    const newsContent = $('.newscontent');

    function loadnewsContent(page = 1) {
        const url = `news_main_content.php?page=${page}`;

        newsContent.load(url, function(response, status, xhr) {
            if (status === "success") {
                // 載入成功後的處理程式碼
                console.log("Content loaded successfully!");
            } else {
                // 載入失敗時的處理程式碼
                console.log("Failed to load content.");
            }
        });
    }

    // 使用範例
    loadnewsContent(1);


</script>
<?php include './parts/html_foot.php' ?>