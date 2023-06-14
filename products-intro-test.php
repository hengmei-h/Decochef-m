<?php
include './parts/db-connect.php';
// if(isset($_SESSION['user'])){
//   header("Location: index_.php");
//   exit;
// }
$title = '商品詳細內容';
$pageName = 'products-intro';

///// -->
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;   //指定參數



//如果沒有回到前一頁
if (!$sid) {
    header('Location: products-list.php');
    exit;
}

//----------------------------
$sql = "SELECT * FROM products_view WHERE sid = $sid "; //sql部分獨立出來
$i = $pdo->query($sql)->fetch(); //選取指定的內容

$img = explode(',', $i['pictures']);
// $img1 = explode(',', $i['pictures'])[1]
// echo json_encode($img); 

$imgd = explode(',', $i['details']);
?>


<?php include './parts/html_head.php' ?>

<link rel="stylesheet" href="./style/products-intro.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
<style>


</style>
<?php include './parts/navbar.php' ?>

<div class="intro-item" data-pid="<?= $i['sid'] ?>">
<!--商品內容 top -->
<div class="wrapper-products-intro">
    <div class="container">
        <!--商品內容 top 左側 麵包屑、商品圖-->
        <section class="wrapper-pi-aside">

            <!-- 麵包屑 -->
            <div class="breadscrumb">
                <div><a href=".index_.php"><i class="fa-solid fa-house"></i></a></i><i class="fa-solid fa-angle-right"></i> <a href="./products-list.php">商品總覽</a> <i class="fa-solid fa-angle-right"></i> <a href="">電烤盤</a>
                </div>
            </div>
            <!-- 麵包屑 -->

            <div class="aside-picture >">
                       
              <div class="img-demo"><img src="imgs/products-imgs/<?= $img[0] ?>" alt=""></div>
                <div class="container ">
                <div class="aside-picture-b ">
                        <?php for($k=0; $k<6; $k++): ?>
                        <div class="aside-picture-item">
                            <div  class="aside-picture-item-row">
                            <img src="imgs/products-imgs/<?= $img[$k] ?>" alt="">
                            </div>
                          
                        </div>
                        <?php endfor; ?>
                        <!-- <div class="aside-picture-item">
                           <img src="imgs/products-imgs/<?= $i['pictures'][3] ?>" alt="">
                        </div>
                        <div class="aside-picture-item">
                           <img src="imgs/products-imgs/<?= $i['pictures'][4] ?>" alt="">
                        </div> -->
                        
                    </div>
                </div>
              
            </div>


        </section>
        <!--商品內容 top 左側 麵包屑、商品圖-->
        <!--商品內容 top 右側 商品描述 -->
        <section class="wrapper-pi-content">
            <div class="<?= $i['sid'] ?>">
                <h6><?= $i['brand'] ?> <?= $i['pdName'] ?> - <?= $i['color'] ?></h6>
                <h6><i class="fa-solid fa-dollar-sign"></i><?= $i['price'] ?></h6>


                <p class="wrapper-pi-content-disc">
                    <?= $i['feature'] ?>
                    <!-- - 內附章魚燒電烤盤、平板烤盤及兩用木匙 <br>
                - 無段火力，最高溫度250度 <br>
                - 鑄鐵材質，堅固耐用 <br>
                - 耐高溫不沾塗層烤盤 <br>
                - 導熱快、 清洗方便 <br>
                - 分離式電源，方便使用好收納 -->
                </p>

                <div class="order-web">
                    <div class="drop-pi-content">
                        <div class="dropbt-pi-content">
                            <a class="">
                                選擇商品數量
                            </a>
                        </div>

                        <div class="dropbox-pi-content">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                        </div>
                        
                    </div>

                    <div class="order-btn">
                        <div class="cart" onclick="addToCart(event)">
                                <a href="#" class="order-btn-1">加入購物車</a>
                            </div>
                            <div class="cart" onclick="addToCart(event)">
                                <a href="./cart-step1.php" class="order-btn-2">直接購買</a>
                            </div>
                        
                        
                    </div>
                </div>



                <div class="feedback-icon">
                    <p>客戶評分 <i class="fa-solid fa-star"></i></p>
                    <p>追蹤 <i class="fa-regular fa-heart"></i></p>
                </div>

                <div class="order-notice">
                    <a href=""> 運送說明</a>
                    <a href="">購物須知</a>
                </div>

                <div class="discount">
                    <h6>優惠活動</h6>
                    <p>- 免運優惠來囉！新會員 於7 天內至 DecoChef APP 下單， <br>
                       - DecoChef 幫你付運費，最高可折抵運費 NT$ 100<br>
                       -【Spring Festival】04/01-04/10指定商品滿$3,000免運！ <br>
                       - 獎勵任務進行中，週週送D coins <a href="" style="color: #A24D38
                        ">簽到領取獎勵</a> </p>
                </div>

            </div>

        </section>
        <!--商品內容 top 右側 商品描述 -->
    </div>
</div>
<!--商品內容 top -->

<!-- 商品詳細內容分頁 三欄  https://www.wfublog.com/2021/07/tab-menu-pure-css-flexbox.html-->
<div>
    <div class="container">
        <div class="tab_css">
            <!-- TAB1 打包區塊 start -->
            <input id="tab1" type="radio" name="tab" checked="checked" />
            <label for="tab1">商品介紹</label>
            <div class="tab_content">
                       <?php for($m=0; $m<5; $m++): ?>
                        <div class="">
                           <img src="imgs/products-imgs/<?= $imgd[$m] ?>" alt="">
                        </div>
                        <?php endfor; ?>
               
                <!-- <img src="imgs/products-imgs/11f5ebb9d00242ac110003.jpg" alt="">
                <img src="imgs/products-imgs/115cebb9d00242ac110003.jpg" alt="">
                <img src="imgs/products-imgs/118beb9d670242ac110003.jpg" alt="">
                <img src="imgs/products-imgs/4a4a0d8e90.jpg" alt="">
                <img src="imgs/products-imgs/1177eb9df30242ac110006.jpg" alt=""> -->
            </div>
            <!-- TAB1 打包區塊 end -->

            <!-- TAB2 打包區塊 start -->
            <input id="tab2" type="radio" name="tab" />
            <label for="tab2">商品規格</label>
            <div class="tab_content">

                <table class="table-spec">
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>顏色: </th>
                        <td> <?= $i['color'] ?></td>
                    </tr>
                    <tr>
                        <td>尺寸:</th>
                        <td> <?= $i['size'] ?></td>
                    </tr>
                    <tr>
                        <td>重量:</th>
                        <td> <?= $i['weight'] ?></td>
                    </tr>
                    <tr>
                        <td>電壓:</th>
                        <td> <?= $i['size'] ?></td>
                    </tr>
                    <tr>
                        <td>材質:</th>
                        <td> <?= $i['material'] ?></td>
                    </tr>
                    <tr>
                        <td>配件:</th>
                        <td> <?= $i['accessories'] ?></td>
                    </tr>
                </table>

            </div>
            <!-- TAB2 打包區塊 end -->

            <!-- TAB3 打包區塊 start -->
            <input id="tab3" type="radio" name="tab" />
            <label for="tab3">購買評價</label>
            <div class="tab_content">
                <div>
                    <div class="comment-select">
                        <a href="">所有評價(32)</a>
                        <a href="">5星(22)</a>
                        <a href="">4星(6)</a>
                        <a href="">3星(3)</a>
                        <a href="">2星(1)</a>
                        <a href="">1星(0)</a>
                    </div>

                    <div class="comment-content">
                        <div class="comment-content-item">
                            <div class="avatar">
                                <img src="imgs/products-imgs/5b6c359dcddc7.jpg" alt="">
                            </div>
                            <div class="comment-content-disc">
                                <p>c*****1020</p>
                                <p>星等</p>
                                <p>2021-05-31 22:12</p>
                                <p>商品和照片都一致，很好的商品品質，雖然因過年的關係，出貨速度拖了點，但cp值很高哦，希望有機會能再次交易，謝謝。</p>
                            </div>
                        </div>

                        <div class="comment-content-item">
                            <div class="avatar">
                                <img src="imgs/products-imgs/5b6c359dcddc7.jpg" alt="">
                            </div>
                            <div class="comment-content-disc">
                                <p>c*****1020</p>
                                <p>星等</p>
                                <p>2021-05-31 22:12</p>
                                <p>商品和照片都一致，很好的商品品質，雖然因過年的關係，出貨速度拖了點，但cp值很高哦，希望有機會能再次交易，謝謝。</p>
                            </div>
                        </div>

                        <div class="comment-content-item">
                            <div class="avatar">
                                <img src="imgs/products-imgs/5b6c359dcddc7.jpg" alt="">
                            </div>
                            <div class="comment-content-disc">
                                <p>c*****1020</p>
                                <p>星等</p>
                                <p>2021-05-31 22:12</p>
                                <p>商品和照片都一致，很好的商品品質，雖然因過年的關係，出貨速度拖了點，但cp值很高哦，希望有機會能再次交易，謝謝。</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <!-- TAB3 打包區塊 end -->
        </div>
    </div>
</div>
</div>



<!-- 商品詳細內容分頁 三欄 -->


<!-- 其他人也在看 -->
<section class="also-like">
    <h6>其他人也在看</h6>
    <div class="">

        <div class="others-scroll ">

            <div class="others-group">
                <div class="others-group-photo ">
                    <div class="others-group-photo-item"><img src="imgs/products-imgs/118beb9d670242ac110003.jpg" alt="" style="height: 100px;"></div>
                    <div class="others-group-photo-item"><img src="imgs/products-imgs/115cebb9d00242ac110003.jpg" alt="" style="height: 100px;"></div>
                    <div class="others-group-photo-item"><img src="imgs/products-imgs/11bfebad2e0242ac110004.jpg" alt="" style="height: 100px;"></div>
                </div>
                <div class="others-group-title">
                    <p>快煮壺</p>
                </div>
            </div>
            <div class="others-group">
                <div class="others-group-photo ">
                    <div class="others-group-photo-item"><img src="imgs/products-imgs/118beb9d670242ac110003.jpg" alt="" style="height: 100px;"></div>
                    <div class="others-group-photo-item"><img src="imgs/products-imgs/115cebb9d00242ac110003.jpg" alt="" style="height: 100px;"></div>
                    <div class="others-group-photo-item"><img src="imgs/products-imgs/11bfebad2e0242ac110004.jpg" alt="" style="height: 100px;"></div>
                </div>
                <div class="others-group-title">
                    <p>電子鍋</p>
                </div>
            </div>
            <div class="others-group">
                <div class="others-group-photo ">
                    <div class="others-group-photo-item"><img src="imgs/products-imgs/118beb9d670242ac110003.jpg" alt="" style="height: 100px;"></div>
                    <div class="others-group-photo-item"><img src="imgs/products-imgs/115cebb9d00242ac110003.jpg" alt="" style="height: 100px;"></div>
                    <div class="others-group-photo-item"><img src="imgs/products-imgs/11bfebad2e0242ac110004.jpg" alt="" style="height: 100px;"></div>
                </div>
                <div class="others-group-title">
                    <p>氣炸鍋</p>
                </div>
            </div>
            <div class="others-group">
                <div class="others-group-photo ">
                    <div class="others-group-photo-item"><img src="imgs/products-imgs/118beb9d670242ac110003.jpg" alt="" style="height: 100px;"></div>
                    <div class="others-group-photo-item"><img src="imgs/products-imgs/115cebb9d00242ac110003.jpg" alt="" style="height: 100px;"></div>
                    <div class="others-group-photo-item"><img src="imgs/products-imgs/11bfebad2e0242ac110004.jpg" alt="" style="height: 100px;"></div>
                </div>
                <div class="others-group-title">
                    <p>快煮壺</p>
                </div>
            </div>

        </div>

    </div>

</section>


<!-- 與此商品相似 -->
<section class="div-recomm-list">
    <div class="">
        <h6>與此商品相似</h6>
        <div class="recomm-list ">

            <div class="recomm-list-item">
                <div class="img_cover">
                    <img src="imgs/products-imgs/7C6D7E2F33-SP-7909829.jpg" alt="">
                </div>
                <div class="save-btn"><i class="fa-regular fa-heart"></i></div>
                <h6>【BRUNO】多功能電烤盤 (白色)</h6>
                <p>$2,980元</p>
            </div>
            <div class="recomm-list-item">
                <div class="img_cover">
                    <img src="imgs/products-imgs/7C6D7E2F33-SP-7909829.jpg" alt="">
                </div>
                <div class="save-btn"><i class="fa-regular fa-heart"></i></div>
                <h6>【BRUNO】多功能電烤盤 (白色)</h6>
                <p>$2,980元</p>
            </div>
            <div class="recomm-list-item">
                <div class="img_cover">
                    <img src="imgs/products-imgs/7C6D7E2F33-SP-7909829.jpg" alt="">
                </div>
                <div class="save-btn"><i class="fa-regular fa-heart"></i></div>
                <h6>【BRUNO】多功能電烤盤 (白色)</h6>
                <p>$2,980元</p>
            </div>

            <div class="recomm-list-item">
                <div class="img_cover">
                    <img src="imgs/products-imgs/7C6D7E2F33-SP-7909829.jpg" alt="">
                </div>
                <h6>【BRUNO】多功能電烤盤 (白色)</h6>
                <p>$2,980元</p>
            </div>
            <div class="recomm-list-item">
                <div class="img_cover">
                    <img src="imgs/products-imgs/7C6D7E2F33-SP-7909829.jpg" alt="">
                </div>
                <h6>【BRUNO】多功能電烤盤 (白色)</h6>
                <p>$2,980元</p>
            </div>



        </div>

    </div>

</section>
<?php include './parts/footer.php' ?>

<?php include './parts/scripts.php' ?>
<!-- js/jq script 的架構貼這邊 -->
<script>

    // 1.綁定五個 img 的 click 事件

    function changeImgDemo(e) {
            // console.log('e.target', e.target);

            // 2.拿到 e.target 圖片的 src
            // console.log('e.target src:', $(e.target).attr('src'));
            const imgSrc = $(e.target).attr('src');

            // 3.拿 e.target 圖片的 src ，去改 .img-demo img 的 src
            $('.img-demo img').attr('src', imgSrc)
        }

        $('.aside-picture-item-row img').click(changeImgDemo)
  
        //add to cart
        function addToCart(event){
        const btn = event.currentTarget;
        const item = btn.closest('.intro-item');
        const pid = item.getAttribute('data-pid');
        const quantity = 1;

        console.log({pid, quantity})

        fetch(`cart-api.php?cmd=add&pid=${pid}&quantity=${quantity}`)
        
        .then(r=>r.json())
        .then(cart=>{
          console.log(cart);
          calcCartItems(cart.data);
        })
    }
</script>
<?php include './parts/html_foot.php' ?>