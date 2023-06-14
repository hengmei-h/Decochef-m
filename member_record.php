<?php
include './parts/db-connect.php';
if(! isset($_SESSION['user'])){
  header("Location: index_.php");
  exit;
}
$title = '會員記錄';
$pageName = 'member_record';

// $sql = "SELECT * FROM `order` WHERE `member_sid`=".$_SESSION['user']['sid']." ORDER BY `order_date` DESC";
// $order = $pdo->query($sql)->fetchAll(); 

// tryy
$perPage = 8;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// if($page < 1){
//     header("Location: activity.php");
//     exit;
// }
$totalPages = 0; #總頁數的預設值
$rows = []; # 分頁資料

$t_sql = "SELECT COUNT(1) FROM `order` WHERE member_sid=". $_SESSION['user']['sid'];
//計算總筆數
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

// 如果有資料
if ($totalRows > 0){
//計算總頁數
$totalPages = ceil($totalRows/$perPage);
if($page > $totalPages) {
    // header("Location: list.php?page={$totalPages}");
    // exit;
}


// 商品
$sql = sprintf("SELECT * FROM `order` WHERE `member_sid` =" .$_SESSION['user']['sid']." ORDER BY `order_date` DESC LIMIT %s, %s", ($page-1)*$perPage, $perPage);
$order = $pdo->query($sql)->fetchAll(); 
}
// tryy


?>

<?php include './parts/html_head.php'?>
<style>
    body{
        background-color: #F1ECE6;
        color:#A58E7C;
    }

    .mainsec{
        padding-top: 100px;
        min-height: 100vh;
    }
    .subtitle, .collections,.options{
        margin-top: 30px;
    }

    .pages{
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .flex-s{
        justify-content: flex-start;
    }
    .btn1{
        margin: 5px;
    }
    .options .btn1{
        width: 20%;
    }

    .pagebtn{
        width: 40px;
        height: 40px;
    }

    .pages .row{
        align-items: center;
        justify-content: center;
    }
    
    .options .active{
        background-color: #A58E7C;
    }

    .order-item, .coupon-item{
        background-color: #fff;
        position: relative;
        border-radius: 10px;
    }
    .pagebtn.active{
        background-color: #CBAC8D;
        color: #fff;
    }

    /* coupon */
    .coupon-item{
    height: 180px;
    width: 48%;
    margin: 8px;
    padding: 30px 50px;
    justify-content: center;
    position: relative;
    }

    .coupon-pic{
    font-size: 120px;
    margin-right: 50px;
    }

    .coupon-info{
    flex-grow: 2;
    z-index: 1;
    }
    .my-coupons{
        display: none;
    }
    .valied{
        background-color: #A48374;
        color: #F1ECE6;
    }
    .invalied{
        background-color:#ddd8d2;
        color:#544f49;
    }

    .stamp{
        color: #F1ECE6;
        position: absolute;
        top: 5px;
        right: 5px;
        width: 170px;
        height: 170px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        border: #F1ECE6 8px solid;
        opacity: 0.9;
        outline: 2px solid #F1ECE6;
        outline-offset: -15px;
        transform:rotate(-30deg)
    }

    .order-item{
    height: 70px;
    width: 100%;
    margin: 8px;
    padding: 0px 10px;
    }

    button{
        border: 0px;
    }

    
    @media (max-width: 375px){
        .mainsec{
        padding-top: 80px;
        }

        .subtitle, .collections,.options{
            margin-top: 15px;
        }

        .pages{
            margin-bottom: 15px;
        }

        .options .btn1{
            width: 30%;
        }

        .m-wrap{
        flex-wrap: wrap;
        }
        .coupon-item{
            width: 100%;
            margin: 5px 0;
            height: 140px;
            justify-content: flex-start;
            padding: 20px;
        }
        .coupon-pic{
        font-size: 60px;
        margin-right: 20px;
        }

        .stamp{
        width: 130px;
        height: 130px;
        border: #F1ECE6 8px solid;
        opacity: 0.9;
        outline: 2px solid #F1ECE6;
        outline-offset: -15px;
    }
        .m-wrap.spc-evenly{
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }
        .order-item{
            height: 90px;
        }
    }

</style>
<?php include './parts/navbar.php'?>

<section class="mainsec">
    <div class="container">
        <div class="row spc-between">
            <h3>會員紀錄</h3>
            <a class="pm" href="./member_center.php"><i class="fa-solid fa-chevron-left"></i>返回會員中心</a>
        </div>
        <div class="options">
            <div class="row flex-s m-wrap">
            <div class="btn-l btn1 active" id="my-orders-btn">歷史訂單</div>
            <div class="btn-l btn1" id="my-coupon-btn">我的優惠券</div>
            </div>
        </div>
    </div>
    <div class="container">     
        <!-- 歷史訂單 -->
        <div class="my-orders">
            <h4 class="subtitle">歷史訂單</h4>
            <div class="collections">
                <div class="row wrap">
                    <?php foreach($order as $o): ?>
                    <div class="order-item">
                        <div class="row m-wrap spc-evenly" >
                            <p>訂單編號:<?= $o['order_code'] ?></p>
                            <p>購買日期:20<?= date('y-m-d',strtotime($o['order_date'])) ?></p>
                            <p>訂單狀態:<?= $o['status'] ?></p>
                            <p>總金額:$<?= number_format($o['amount']) ?></p>
                            <a href="order_details.php?oid=<?= $o['order_code'] ?>">
                            <div class="btn1 btn-s">查看訂單</div>
                            </a>
                        </div>
                    </div>
                    <?php endforeach ?>
                    
                </div>
            </div>
        </div>
        <!-- 我的優惠券收藏 -->
        <div class="my-coupons">
            <h4 class="subtitle">我的優惠券</h4>
            <div class="collections">
                <div class="row wrap">
                    <!-- valied -->
                    <div class="coupon-item valied">
                        <div class="row">
                            <div class="coupon-pic">
                            <i class="fa-solid fa-cake-candles"></i>
                            </div>
                            
                            <div class="coupon-info">
                                <h5>生日禮</h5>
                                <p class="pm"><br>使用期限:2023-5-5</p>
                                <p class="pm">優惠內容:全館滿千折價100元</p>
                            </div>
                        </div>
                    </div>                  
                    <div class="coupon-item valied">
                        <div class="row spc-center">
                            <div class="coupon-pic">
                            <i class="fa-solid fa-gift"></i>
                            </div>
                            
                            <div class="coupon-info">
                                <h5>會員升級禮</h5>
                                <p class="pm"><br>使用期限:2023-10-5</p>
                                <p class="pm">優惠內容:全館滿千折價200元</p>
                            </div>
                        </div>
                    </div>                  
                    <!-- in-valied -->
                    <div class="coupon-item invalied">
                        <div class="row spc-center">
                            <div class="stamp">
                                <h3>已過期</h3>
                            </div>
                            <div class="coupon-pic">
                            <i class="fa-solid fa-child-reaching"></i>
                            </div>
                            <div class="coupon-info">
                                <h5>加入會員禮</h5>
                                <p class="pm"><br>使用期限:2022-3-10</p>
                                <p class="pm">優惠內容:單筆訂單折價50元</p>
                            </div>
                        </div>
                    </div>                  
                    <div class="coupon-item invalied">
                        <div class="row spc-center">
                            <div class="stamp">
                                <h3>已使用</h3>
                            </div>
                            <div class="coupon-pic">
                            <i class="fa-solid fa-cake-candles"></i>
                            </div>
                            
                            <div class="coupon-info">
                                <h5>生日禮</h5>
                                <p class="pm"><br>使用期限:2022-5-5</p>
                                <p class="pm">優惠內容:全館滿千折價100元</p>
                            </div>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- 頁碼 -->
    <!-- <div class="pages">
        <div class="container">
            <div class="row">
                <div class="pagebtn btn5"><i class="fa-solid fa-angles-left"></i></i></div>
                <div class="pagebtn btn5"><i class="fa-solid fa-angle-left"></i></div>
                <div class="pagebtn btn5">1</div>
                <div class="pagebtn btn5">2</div>
                <div class="pagebtn btn5">3</div>
                <div class="pagebtn btn5"><i class="fa-solid fa-angle-right"></i></div>
                <div class="pagebtn btn5"><i class="fa-solid fa-angles-right"></i></div>
            </div>
        </div>
    </div> -->
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
            <a class="page-link" href="?page=<?= $i ?>">
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
</section>
<?php include './parts/footer.php'?>

<?php include './parts/scripts.php'?>
<!-- js/jq script 的架構貼這邊 -->
<script>
  
    $('.options .btn-l').click(function(e){
    $(e.target).addClass('active').siblings().removeClass('active')
    })

    $('#my-coupon-btn').click(function(){
    $('.my-coupons').css('display','block').siblings().css('display','none')})

    $('#my-orders-btn').click(function(){
    $('.my-orders').css('display','block').siblings().css('display','none')})
// 
const whenHashChange = function(){
        console.log(location.hash);

        if(location.hash=='#cops'){
        $('#my-coupon-btn').click();
        } else{
            $('#my-orders-btn').click();
        }}

window.addEventListener('hashchange', whenHashChange);
whenHashChange();

</script>
<?php include './parts/html_foot.php'?>