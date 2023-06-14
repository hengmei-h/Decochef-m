<?php
include './parts/db-connect.php';
if(! isset($_SESSION['user'])){
  header("Location: login.php");
  exit;
}
$title = '訂單細節';
$pageName = 'order_details';

$oid = $_GET['oid'];
$sql = "SELECT order_details.*, `order`.* ,`gift`.*,products.sid,products.model,products.pdName,products.price,products.pictures,color.color,brand.brand,member.name, member.mobile FROM `order_details`
INNER JOIN `products` ON  products.sid = product_sid 
INNER JOIN `order` ON  order_details.order_code = `order`.order_code
JOIN `brand` ON  products.brand_sid = brand.sid
JOIN `color` ON  products.color_sid = color.sid
JOIN `member` on `order`.member_sid = `member`.sid
JOIN `gift` on `order`.order_code = gift.order_code
WHERE `order`.`order_code` = '$oid'";
$od = $pdo->query($sql)->fetchAll();
$pd = $pdo->query($sql)->fetch();

$cp_sql = "SELECT * FROM coupon_status
JOIN `coupon` ON coupon_status.coupon_sid = coupon.sid";
$cp = $pdo->query($cp_sql)->fetch();

?>



<?php include './parts/html_head.php'?>
<style>
    body{
        background-color: #F1ECE6;
        color:#A58E7C;
    }

    .mainsec{
        padding-top: 130px;
        min-height: 100vh;
        margin-bottom: 50px;
    }

    .item{
        background-color: #fff;
        position: relative;
        border-radius: 10px;
        width: 100%;
        margin: 10px 8px;
        padding: 10px 20px;
    }

    button{
        border: 0px;
    }

    .img-wrap{
        width: 200px;
        height: 200px;
        overflow: hidden;
        padding: 10px;
        border-radius: 10px;
    }
    img{
        border-radius: 10px;
    }
    .product-info{
        flex-grow: 2;
    }

    .btn-s{
        width: 200px;
    }
    .pd-name {
        width: 300px;
    }

    .pd-price, .total{
        width: 200px;
    }

    .status{
        border: 1px solid #856252;
        border-radius: 5px;
        color: #856252;
    }
    .on-sts{
        border: 1px solid #A24D38;
        border-radius: 5px;
        color: #A24D38;
    }

    .all-view, .showless{
        display: none;
    }

    .all-view{
        animation: ease 5s;
    }


    .back{
        width: 200px;
        margin: auto;
    }

    .fixheight{
    height: 220px;
    overflow: hidden;
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

    @media (max-width: 375px){
        .mainsec{
        padding-top: 80px;
        }

        .btn1{
            width: 30%;
        }

        .m-wrap{
        flex-wrap: wrap;
        justify-content: center;
        }

        .mw100{
            width: 100%;
        }

        .item{
            margin: 8px 0;
        }

        .pd-name, .pd-price, .total{
            width: 250px;
        }
        .product-detail {
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #A58E7C;
        }
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
    <div class="row spc-between">
            <h3>訂單明細</h3>
            <a class="pm" href="./member_record.php"><i class="fa-solid fa-chevron-left"></i>返回歷史訂單</a>
        </div>
        <!-- 歷史訂單 -->
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
                        <div class="status btn-m <?= $pd['status'] == '確認中' ? 'on-sts' : '' ?>">確認中</div>
                        <div class="status btn-m <?= $pd['status'] == '已出貨' ? 'on-sts' : '' ?>">已出貨</div>
                        <div class="status btn-m" <?= $pd['status'] == '已到貨' ? 'on-sts' : '' ?>>已到貨</div>
                        <div class="status btn-m" <?= $pd['status'] == '已完成' ? 'on-sts' : '' ?>>已完成</div>
                    </div>
                </div>
            </div>
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
                                            <p>數量:<?= $o['quantity'] ?></p>
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
                                <div class=" <?= is_null($pd['gift_sid']) ? "none" : "" ?> ">
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
                <div class="fianl-price m-wrap item">
                <h6>金額確認</h6>
                <div class="row">
                    <div class="price-item">
                    <!-- prd-only -->
                    <p> <label for="discount">選擇優惠券:</label></p>
                        <p> 小計:$</p>
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
                <a href="./member_record.php"><button class="btn-m btn1 back">返回上一頁</button></a>
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