<?php
// include './parts/db-connect.php';
// if(isset($_SESSION['user'])){
//   header("Location: index_.php");
//   exit;
// }
$title = '搜尋結果';
$pageName = 'result';
?>

<?php include './parts/html_head.php'?>
<link rel="stylesheet" href="./style/cart.css">
<style>
.class-result, .article-result{
    display: none;
}
</style>
<?php include './parts/navbar.php'?>

<section class="result-main">
    <div class="container">
        <div class="row">
            <div class="sidelist">
                <ul class="li"><a href="">首頁</a></ul>
                <ul class="li"><a href="">關於我們</a></ul>
                <ul class="li"><a href="">最新消息</a></ul>
                <ul class="li"><a href="">商品列表</a></ul>
                <ul class="li"><a href="">品味誌</a></ul>
            </div>
            <div class="result-side">
                <h6>搜尋 氣炸 結果共50筆</h6>
                <div class="switch">
                    <div class="row flex-s m-wrap">
                        <div class="btn-m btn1 active" id="product-btn">商品搜尋結果(10)</div>
                        <div class="btn-m btn1" id="class-btn">課程搜尋結果(10)</div>
                        <div class="btn-m btn1" id="article-btn">文章搜尋結果(10)</div>
                    </div>
                </div>

                <!-- 結果區域 -->
                <div class="result-items">
                    <!-- product -->
                    <div class="product-result">
                        <div class="row">
                            <div class="rec-item product">
                                <i class="fa-solid fa-heart"></i>
                                <div class="img-wrap">
                                    <img class="w100"src="./imgs/product.jpg" alt="">
                                </div>
                                <div class="item-info">
                                    <p class="pm">bruno氣炸鍋</p>
                                    <p class="ps">$2,000</p>
                                    <button class="btn-s btn1">加入購物車</button>
                                </div>
                            </div>
                            <div class="rec-item  product">
                                <i class="fa-solid fa-heart"></i>
                                <div class="img-wrap">
                                    <img class="w100"src="./imgs/product.jpg" alt="">
                                </div>
                                <div class="item-info">
                                    <p class="pm">bruno氣炸鍋</p>
                                    <p class="ps">$2,000</p>
                                    <button class="btn-s btn1">加入購物車</button>
                                </div>
                            </div>
                            <div class="rec-item  product">
                                <i class="fa-solid fa-heart"></i>
                                <div class="img-wrap">
                                    <img class="w100"src="./imgs/product.jpg" alt="">
                                </div>
                                <div class="item-info">
                                    <p class="pm">bruno氣炸鍋</p>
                                    <p class="ps">$2,000</p>
                                    <button class="btn-s btn1">加入購物車</button>
                                </div>
                            </div>
                            <div class="rec-item  product">
                                <i class="fa-solid fa-heart"></i>
                                <div class="img-wrap">
                                    <img class="w100"src="./imgs/product.jpg" alt="">
                                </div>
                                <div class="item-info">
                                    <p class="pm">bruno氣炸鍋</p>
                                    <p class="ps">$2,000</p>
                                    <button class="btn-s btn1">加入購物車</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- class -->
                    <div class="class-result">
                        <div class="row ">
                            <div class="rec-item class">
                                <i class="fa-solid fa-heart"></i>
                                <div class="img-wrap">
                                    <img class="w100"src="./imgs/product.jpg" alt="">
                                </div>
                                <div class="item-info">
                                    <p class="pm">終極職人燒烤課程</p>
                                    <p class="ps">課程日期:2023-5-1</p>
                                    <p class="ps">$500/人</p>
                                    <a href=""><button class="btn-s btn1">查看內容</button></a>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <!-- product -->
                    <div class="article-result">
                        <div class="row">
                            <div class="rec-item article">
                                <i class="fa-solid fa-heart"></i>
                                <div class="img-wrap">
                                    <img class="w100"src="./imgs/product.jpg" alt="">
                                </div>
                                <div class="item-info">
                                    <p class="pm">最好的聖誕節禮物清單</p>
                                    <p class="ps">2022-11-30</p>
                                    <p class="ps">作者:靠那邊</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include './parts/footer.php'?>

<?php include './parts/scripts.php'?>
<!-- js/jq script 的架構貼這邊 -->
<script>
    $('.options .btn-m').click(function(e){
    $(e.target).addClass('active').siblings().removeClass('active')
    })

    $('#product-btn').click(function(){
    $('.product-result').css('display','block').siblings().css('display','none')})
    $('#class-btn').click(function(){
    $('.class-result').css('display','block').siblings().css('display','none')})
    $('#article-btn').click(function(){
    $('.article-result').css('display','block').siblings().css('display','none')})

</script>
<?php include './parts/html_foot.php'?>