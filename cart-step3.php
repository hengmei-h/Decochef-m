<?php
include './parts/db-connect.php';
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
  }

$title = '訂單完成';
$pageName = 'cart-step3';

// 優惠券
$cp_sql = "SELECT coupon_status.*, coupon.name, coupon.description,coupon.duration,coupon.function 
FROM coupon_status INNER JOIN coupon 
ON coupon_status.coupon_sid = coupon.sid
WHERE 1";
$cp = $pdo->query($cp_sql);

// 商品
$oid = $_GET['oid'];
$sql = "SELECT order_details.*, `order`.* ,`gift`.*, products.sid,products.model,products.pdName,products.price,products.pictures,color.color,brand.brand,member.name, member.mobile FROM `order_details`
INNER JOIN `products` ON  products.sid = product_sid 
INNER JOIN `order` ON  order_details.order_code = `order`.order_code
JOIN `brand` ON  products.brand_sid = brand.sid
JOIN `color` ON  products.color_sid = color.sid
JOIN `member` on `order`.member_sid = member.sid
JOIN `gift` on `order`.order_code = gift.order_code
WHERE `order`.`order_code` = '$oid'";
$od = $pdo->query($sql)->fetchAll();
$pd = $pdo->query($sql)->fetch();

$cp_sql = "SELECT * FROM coupon_status
JOIN `coupon` ON coupon_status.coupon_sid = coupon.sid";
$cp = $pdo->query($cp_sql)->fetch();
?>


<?php include './parts/html_head.php'?>
<link rel="stylesheet" href="./style/cart.css">
<style>
    .fa-solid.fa-square-check{
        display: none;
    }
    .fixheight{
    height: 220px;
    overflow: hidden;
    }
    .yes{
        background-color: #A24D38;
    }
    .giftwrap{
        width: 300px;
        height: 200px;
        overflow: hidden;
    }
    .giftwrap img, .sticker img{
        width: 100%;
        height: 100%;
        object-fit: fill;
    }
    .gc {
        position: relative;
        margin: 5px;
    }
    .sticker{
        position: absolute;
        top: 85px;
        left: 115px;
        width: 60px;
        height: 60px;
    }

    .words{
        position: absolute;
        top: 50px;
        left: 50px;
    }

    .none{
        display: none;
    }
    @media (max-width: 375px){
        .giftwrap{
        width: 250px;
        height: 170px;
        overflow: hidden;
    }
    .sticker{
        top: 74px;
        left: 103px;
        width: 40px;
        height: 40px;
    }
    .gc {
        margin: 3px;
    }

    .words{
        position: absolute;
        top: 35px;
        left: 35px;
    }
    .mo-w{
        flex-wrap: wrap;
    }

    }
</style>
<?php include './parts/navbar.php'?>

<section class="mainsec">
    <div class="container">
        <!-- steps -->
        <div class="row spc-evenly steps">
            <div class="step row">
                <div class="circle"><h6>1</h6></div>
                <p>購物車</p>
            </div>
            <div class="step row">
                <div class="circle"><h6>2</h6></div>
                <p>選擇配送及付款</p>
            </div>
            <div class="step row">
                <div class="circle active"><h6>3</h6></div>
                <p>完成訂單</p>
            </div>
        </div>

        <!-- 填寫頁面-->

        <div class="my-orders">
        <div class="item">
            <div class="order-code">
                <div class="row spc-between m-wrap">
                <h6 class="mw100">訂單編號:<?= $pd['order_code']?></h6>
                <p class="mw100">購買日期:<?= $pd['order_date']?></p>
                <p class="code-1 mw100">總金額:$<?= number_format($pd['amount'])?></p>
                </div>
            </div>
        </div> 
        <div class="item">
            <div class="order-status">
                <h6>訂單狀態:</h6>
                <div class="row">
                    <div class="status btn-m <?= $pd['status'] == '確認中' ? 'active' : '' ?>">確認中</div>
                    <div class="status btn-m <?= $pd['status'] == '已出貨' ? 'active' : '' ?>">已出貨</div>
                    <div class="status btn-m" <?= $pd['status'] == '已到貨' ? 'active' : '' ?>>已到貨</div>
                    <div class="status btn-m" <?= $pd['status'] == '已完成' ? 'active' : '' ?>>已完成</div>
                </div>
            </div>
        </div> 
            <!--  配送方式  -->
            <!-- prd-only -->
            <div class="item delievery">
                <h6>選擇配送方式</h6>
                <div class="row">
                    <div class="status btn-m active">宅配到府</div>
                    <div class="status btn-m">門市取貨</div>
                </div>
            </div>
            <!-- 商品細節 -->
            <div class="item products">
                <div class="">
                    <div class="row spc-between">
                        <h6>商品資訊</h6>
                        <div class="row showmore">
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="row showless">
                            <i class="fa-solid fa-caret-up"></i>
                        </div>
                    </div>
                </div>
                </div>
                <div class="item">
                    <div class="short-view fixheight">
                    <?php foreach ($od as $o) : 
                                $img = explode(',',$o['pictures'])[0];
                                ?>
                            <div class="product-detail row m-wrap">
                                <div class="img-wrap">
                                    <img class="w100"  src="./imgs/products-imgs/<?=$img?>" alt="">
                                </div>
                                <div class="product-info">
                                    <div class="row spc-evenly m-wrap">
                                        <div class="pd-name">
                                            <p><?= $o['brand'],$o['pdName'] ?></p>
                                            <p class="pm">型號:<?= $o['model'] ?></p>
                                            <p class="pm"><?= $o['color'] ?></p>
                                        </div>
                                        <div class="pd-price">
                                            <p>價格: $<?= number_format($o['price']) ?></p>
                                            <p>數量: <?= $o['quantity'] ?></p>
                                        </div>
                                        <div class="total">
                                            <p>小計: $<?= number_format(intval($o['quantity']) * intval($o['price']))?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <div class="showless">
                            <div class="row sl2">
                            <i class="fa-solid fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 訂購人資訊 -->
            <div class="item">
                    <div class="order-pic">
                        <h6>訂購人資訊:</h6>
                        <div class="row">
                            <div class="item-title">
                                <p>姓名:</p>
                                <p>電話:</p>
                            </div>
                            <div class="item-value">
                                <p><?= $o['name'] ?></p>
                                <p><?= $o['mobile'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>  
            <!-- 收件人資訊 -->
            <!-- prd-only -->
                <div class="item">
                    <div class="order-receiver">
                        <h6>收件人資訊:</h6>
                        <div class="row">
                            <div class="item-title">
                                <p>姓名:<?= $o['rec_name'] ?></p>
                                <p>電話:<?= $o['rec_mobile'] ?></p>
                                <p>地址:<?= $o['rec_address'] ?></p>
                                <p>送禮物:<?= is_null($pd['gift_sid']) ? "否" : "是" ?>
                                </p>
                                <div class=" <?= is_null($pd['gift_sid'])? "none" : "" ?> ">
                                    <p>客製卡片:</p>
                                    <div class="">
                                        <div class="row mo-w">
                                            <div class="gc giftcontent">
                                                <div class="giftwrap">
                                                    <img src="./imgs/kimi/Group 14201.png">
                                                </div>
                                                <div class="words">
                                                    <p>Dear <?= $pd['receiver'] ?></ㄣ>
                                                    <p class="pm"><?= $pd['content'] ?></p>
                                                </div>
                                            </div>
                                            <div class="gc packagecontent">
                                                <div class="giftwrap">
                                                    <img src="./imgs/kimi/image 59.png">
                                                </div>
                                                <div class="sticker">
                                                    <img src="./imgs/kimi/sticker_01.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>客製包裝:</p>
                                    <div class="packagewrap">
                                        <img src="./imgs/kimi/<?= !empty($pd['package']) ? $pd['package'] :""?>" alt=""><?= !empty($pd['package']) ? "" : "無"?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            <!-- 確認費用 -->
            <div class="fianl-price m-wrap item">
                <h6>金額確認</h6>
                <div class="row">
                    <div class="price-item">
                    <!-- prd-only -->
                    <p> <label for="discount">選擇優惠券:</label></p>
                        <p> 商品小計:$</p>
                        <p> 折扣:$</p>
                        <p> 運費:$</p>
                        <h6> 總計:$</h6>
                    </div>
                    <div class="price-value">
                        <p><?= $cp['name']?></p>
                        <p> <?= number_format($pd['amount'])?></p>
                        <p> <?= number_format($cp['function'])?></p>
                        <p> 100</p>
                        <h6><?= number_format($pd['amount']+100+$cp['function'])?></h6>
                    </div>
                </div>
            </div>
            <!-- 付款資訊 -->
            <div class="item">
                <div class="delievery">
                    <h6>付款方式</h6>
                    <div class="row">
                        <div class="status btn-m active">信用卡付款</div>
                        <div class="status btn-m">linepay</div>
                        <div class="status btn-m">門市取貨</div>
                    </div>
                </div>
            </div>

                    <!-- 回上一頁 -->
            <div class="row spc-center">
                <a href="./member_record.php"><button class="btn-m btn5 back">查看所有訂單</button></a>
                <a href="./index_.php"><button class="btn-m btn1 next">回首頁</button></a>
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
$('.showmore').click(function(){
    $('.showmore').css('display','none')
    $('.showless').css('display','block')
    $('.all-view').css('display','block')
})
$('.showless').click(function(){
    $('.showless').css('display','none')
    $('.showmore').css('display','block')
    $('.all-view').css('display','none')
})

$('.showmore').click(function(){
    $('.showmore').css('display','none')
    $('.showless').css('display','block')
    $('.short-view').removeClass('fixheight')
})
$('.showless').click(function(){
    $('.showless').css('display','none')
    $('.showmore').css('display','block')
    $('.short-view').addClass('fixheight')
})

</script>
<?php include './parts/html_foot.php'?>