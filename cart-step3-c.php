<?php
include './parts/db-connect.php';
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
  }

$title = '訂單完成';
$pageName = 'cart-step3';

// 商品
$oid = $_GET['oid'];
$sql = "SELECT order_class_details.*, `order`.* ,`class`.* FROM `order_class_details`
INNER JOIN `class` ON  class.sid = class_sid 
INNER JOIN `order` ON  order_class_details.order_code = `order`.order_code
WHERE `order`.`order_code` = '$oid'";
$od = $pdo->query($sql)->fetchAll();
$pd = $pdo->query($sql)->fetch();
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
                <h6 class="mw100">訂單編號:<?= $_GET['oid']?></h6>
                <p class="mw100">購買日期:<?= $pd['order_date']?></p>
                <p class="code-1">總金額:$<?= number_format($pd['amount'])?></p>
                </div>
            </div>
        </div> 
        <div class="item">
            <div class="order-status">
                <h6>訂單狀態:</h6>
                <div class="row">
                    <div class="status btn-m <?= $pd['status'] == '確認中' ? 'active' : '' ?>">確認中</div>
                    <div class="status btn-m <?= $pd['status'] == '已完成' ? 'active' : '' ?>">已完成</div>
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
                                ?>
                            <div class="product-detail row m-wrap">
                                <div class="img-wrap">
                                    <img class="w100"  src="<?=$o['pic']?>" alt="">
                                </div>
                                <div class="product-info">
                                    <div class="row spc-evenly m-wrap">
                                        <div class="pd-name">
                                            <p><?= $o['title'] ?></p>
                                            <p class="pm"><?= $o['teacher_name'] ?></p>
                                        </div>
                                        <div class="pd-price">
                                            <p>價格: $<?= number_format($o['cost']) ?></p>
                                            <p>人數: <?= $o['quantity'] ?></p>
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
                                <p><?= $o['od_name'] ?></p>
                                <p><?= $o['od_number'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>  
            <!-- 收件人資訊 -->
            <!-- 確認費用 -->
            <div class="fianl-price m-wrap item">
                <h6>金額確認</h6>
                <div class="row">
                    <div class="">
                    <!-- prd-only -->
                        <p> 總計:$<?= number_format($pd['amount'])?></p>
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