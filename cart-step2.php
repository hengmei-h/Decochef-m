<?php
include './parts/db-connect.php';
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
  }
$title = '選擇配送與填寫資料';
$pageName = 'cart-step2';


// 優惠券
$cp_sql = "SELECT coupon_status.*, coupon.name, coupon.description,coupon.duration,coupon.function 
FROM coupon_status INNER JOIN coupon 
ON coupon_status.coupon_sid = coupon.sid
WHERE `od_code` IS NULL AND `member_sid`=".$_SESSION['user']['sid'];
$cp = $pdo->query($cp_sql);
?>

<?php include './parts/html_head.php'?>
<link rel="stylesheet" href="./style/cart.css">
<style>
    input, select{
        font-size: 16px;
        color: #A58E7C ;
    }
    select{
        height: 27px;
    }
    .rec_address{
        width: 260px;
    }
    
    .fa-solid.fa-square-check{
        display: none;
    }
    .fixheight{
    height: 220px;
    overflow: hidden;
    }
    .pd-name{
        width: 300px;
    }
    .edit-member{
        position: relative;
    }
    .form-text{
      font-size: 10px;
      color: red;
      position: absolute;
      bottom: 3px;
      right: 3px;
    }
    .selected{
        background-color: #A24D38;
        color: #fff;
    }
    .status{
        cursor: pointer;
    }
    .steps a{
        color: #A58E7C;
    }
    .card_code{
        width: 50px;
        margin: 5px;
    }
    .card_date{
        width: 30px;
        margin: 5px;
    }
    .card_cs{
        width: 50px;
        margin: 5px;
    }
    .card_name{
        width: 228px;
        margin: 5px;
    }
    .hidden{
        display: none;
    }
    .btn1, i, .showless, .showless{
        cursor: pointer;
    }
</style>
<?php include './parts/navbar.php'?>

<section class="mainsec">
    <div class="container">
        <!-- steps -->
        <div class="row spc-evenly steps">
        <a href="./cart-step1.php">
            <div class="step row">
                <div class="circle"><h6>1</h6></div>
                <p>購物車</p>
            </div>
            </a>
            <div class="step row">
                <div class="circle active"><h6>2</h6></div>
                <p>選擇配送及付款</p>
            </div>
            <div class="step row">
                <div class="circle"><h6>3</h6></div>
                <p>完成訂單</p>
            </div>
        </div>

        <!-- 填寫頁面-->
        <div class="my-orders">
            <!--  配送方式  -->
            <!-- prd-only -->
            <form name="orderInfo" class="orderInfo" novalidate onsubmit="checkForm(event)">
                <div class="item delievery">
                    <h6>選擇配送方式</h6>
                    <div class="row">
                        <div class="shipping status btn-m" data-val="宅配到府">宅配到府</div>
                        <div class="shipping status btn-m" data-val="門市取貨">門市取貨</div>
                    </div>
                </div>
                <!-- 商品細節 -->
                <div class="item products">
                    <div class="">
                        <div class="row spc-between">
                            <h6>商品資訊</h6>
                            <div class="row showmore">
                                顯示全部商品<i class="fa-solid fa-caret-down"></i>
                            </div>
                            <div class="row showless">
                                收回商品清單<i class="fa-solid fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="item">
                        <div class="short-view fixheight">
                        <?php foreach ($_SESSION['cart'] as $item) : 
                        $img = explode(',',$item['pictures'])[0];
                        ?>
                            <div class="product-detail row m-wrap">
                                <div class="img-wrap">
                                    <img class="w100"  src="./imgs/products-imgs/<?=$img?>" alt="">
                                </div>
                                <div class="product-info">
                                    <div class="row spc-evenly m-wrap">
                                        <div class="pd-name">
                                                <p><?= $item['brand'],$item['pdName'] ?></p>
                                                <p class="pm">型號:<?= $item['model'] ?></p>
                                                <p class="pm"><?= $item['color'] ?></p>
                                        </div>
                                        <div class="pd-price">
                                            <p>價格: $<span class="price" data-val="<?= $item['price'] ?>"></span></p>
                                            <p class="quantity" data-val="<?= $item['quantity'] ?>">數量:<?= $item['quantity'] ?> </p>
                                        </div>
                                        <div class="total">
                                            <p>小計: $<span class="subTotal"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                            <div class="showless">
                                <div class="row sl2">
                                收回商品清單<i class="fa-solid fa-caret-up"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 訂購人資訊 -->
                <div class="item">
                    <div class="order-pic">
                        <h6>訂購人資訊</h6>
                            <p >姓名:<span class="odname"> <?=$_SESSION['user']['name']?></span></p>
                            <p>電話:<span class="odmobile"> <?=$_SESSION['user']['mobile']?></span></p> 
                    </form>
                    </div>
                </div>  
                <!-- 收件人資訊 -->
                <!-- prd-only -->
                    <div class="item order-receiver">
                        <h6>客製化禮物</h6>
                        <p>送禮物:<i onclick="show()" class="gift-yes fa-regular fa-square"></i>
                                            <i onclick="hide()" class="gift-no fa-solid fa-square-check"></i></p>
                        <div class="gift-select">
                            <p>客製卡片</p>
                            <a href="./gift-1.php"><button class="btn-s btn1 makecard">製做卡片</button></a>
                            <p>客製包裝</p>
                            <a href="./package.php"><button class="btn-s btn1 chosepackage">選擇包裝</button></a>
                        </div>
                    </div>
                    <div class="item order-receiver">
                        <h6>收件人資訊</h6>
                        <p>
                            <i class="notMb fa-regular fa-square"></i>
                            <i class="sameAsMb fa-solid fa-square-check"></i>
                            同會員資料
                        </p>
                        <div class="row">
                            <div class="">
                                <div>
                                <p>姓名:<input class="input rec_name" type="text" name="rec_name"></p>
                                    <div class="form-text"></div>
                                </div>
                                <div>
                                <p>電話:<input class="input rec_mobile" type="text" name="rec_mobile"></p>
                                    <div class="form-text"></div>
                                </div>
                                <div>
                                <p>地址:<input class="input rec_address" type="text" name="rec_address"></p>
                                    <div class="form-text"></div>
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
                            <p>商品小計: $</p>
                            <p>折扣: $</p>
                            <p>運費: $</p>
                            <h6>總計: $</h6>
                        </div>
                        <div class="price-value">
                            <p><select class="discount" name="discount" id="adiscount">
                            <option value="0">無</option>
                            <?php foreach ($cp as $c):?>
                            <option data-val="<?= $c['sid'] ?>" value="<?= $c['function'] ?>"><?= $c['name'] ?></option>
                            <?php endforeach ?>
                            </select></p> 
                            <p><span class="ProdTotalPrice"></span></p>
                            <p><span class="discountamount"></span></p>
                            <p><span class="shippingfee" data-val="100"></span></p>
                            <h6><span class="finalprice" data-val=""></span></h6>
                        </div>
                    </div>
                </div>
                <!-- 付款資訊 -->
                <div class="item">
                    <div class="paymentway">
                        <h6>選擇付款</h6>
                        <div class="row">
                            <div class="payment status btn-m pb_credit" data-val="信用卡付款">信用卡付款</div>
                            <div class="payment status btn-m pb_line" data-val="linepay">linepay</div>
                            <div class="payment status btn-m pb_store" data-val="門市付款">門市付款</div>
                        </div>
                    </div>
                </div>

                <div class="item credit-card hidden">
                    <h6>信用卡資訊</h6>
                    <div class="row">
                        <div class="">
                            <div>
                                <p>持卡人姓名:<input class="input card_name" type="text" name="card_name"></p>
                                <div class="form-text"></div>
                            </div>
                        <div>
                            
                        <div class="row">
                            <p onclick="autocredit()">信用卡卡號:</p>
                            <input class="input card_code cc1" type="text" name="card_code"></p>
                            <input class="input card_code cc2" type="text" name="card_code"></p>
                            <input class="input card_code cc3" type="text" name="card_code"></p>
                            <input class="input card_code cc4" type="text" name="card_code"></p>
                        </div>
                    </div>
                <div>              
                                
                    <div class="row">
                        <p>有效日期(mm/yy):</p>
                        <input class="input card_date cdm" type="text" name="card_date_mm"> 
                            /<input class="input card_date cdy" type="text" name="card_date_yy">
                    </div>
                </div>
                    <div>
                    <p>卡片安全碼:<input class="input card_cs" type="text" name="card_cs"></p>
                        <div class="form-text"></div>
                    </div>
                    
                    
                </div>
            </div>
        </div>  
                        <!-- 回上一頁 -->
                <div class="row spc-center">
                    <a href="./cart-step1.php"><button class="btn-m btn5 back">回上一步</button></a>
                    <button type="submit" onclick="checkForm(event)"class="btn-m btn1 next">下一步</button>
                </div>
            </form>  
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
    $('.short-view').removeClass('fixheight')
})
$('.showless').click(function(){
    $('.showless').css('display','none')
    $('.showmore').css('display','block')
    $('.short-view').addClass('fixheight')
})

function show(){
    $('.gift-select').css('display','block')
    $('.gift-yes').css('display','none')
    $('.gift-no').css('display','inline-block')
}
function hide(){
    $('.gift-select').css('display','none')
    $('.gift-yes').css('display','inline-block')
    $('.gift-no').css('display','none')
}



// 同會員資料
$('.notMb').click(function(){
    $('.sameAsMb').css('display','inline-block')
    $('.notMb').css('display','none')
    $('.rec_name').val('<?=$_SESSION['user']['name']?>')
    $('.rec_mobile').val('<?=$_SESSION['user']['mobile']?>')
    $('.rec_address').val('<?=$_SESSION['user']['address']?>')

})

$('.sameAsMb').click(function(){
    $('.sameAsMb').css('display','none')
    $('.notMb').css('display','inline-block')
    $('.rec_name').val("")
    $('.rec_mobile').val("")
    $('.rec_address').val("")
})


// / 計算小計和總計
    const dollarCommas = function(n) {
    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };

    function calcTotal(){
        const items = document.querySelectorAll('.product-detail');
        let total = 0;

        for(let it of items) {
            const price = +it.querySelector('.price').getAttribute('data-val');
            const quantity = +it.querySelector('.quantity').getAttribute('data-val');

            it.querySelector('.price').innerHTML = dollarCommas(price);
            it.querySelector('.subTotal').innerHTML = dollarCommas(price*quantity);
            total += price*quantity;
        };

        // prccal = price caculation
        const prccal = document.querySelector('.price-value')
        const discount = $('.discount').find(":selected").val()
        const shipping = $('.shippingfee').attr('data-val')
        const finaltotalVal = $('.finalprice').attr('data-val')
        
        // 商品總計
        let ProdTotalPrice = document.querySelector('.ProdTotalPrice')
        ProdTotalPrice.innerHTML = dollarCommas(total);
        
        // 優惠選項
        prccal.querySelector('.discountamount').innerHTML = dollarCommas(discount);
        
        // 運費
        prccal.querySelector('.shippingfee').innerHTML = dollarCommas(shipping);
        
        // 最終價格
        finaltotal = (Number(total) + Number(discount) + Number(shipping));
        prccal.querySelector('.finalprice').innerHTML = dollarCommas(finaltotal);
        $('.finalprice').attr('data-val',finaltotal);
       }

        // 偵測優惠券選項
        $('.discount').change(function(){
            const discount = $('.discount').find(":selected").val()
            calcTotal();
        })
        calcTotal();

        //   select btn
        $('.shipping').click(function(e){
            $(e.target).toggleClass('selected').siblings().removeClass('selected')
        })
        $('.payment').click(function(e){
            $(e.target).toggleClass('selected').siblings().removeClass('selected')
        })

//    表單送出
    function checkForm(event) {
        event.preventDefault();
        const rec_name = $('.rec_name').val()
        const rec_mobile = $('.rec_mobile').val()
        const rec_address = $('.rec_address').val()
        const finalprice = $('.finalprice').attr('data-val')
        const shipping = $('.delievery').find('.selected').attr('data-val')
        const paymentMT = $('.paymentway').find('.selected').attr('data-val')
        const coupon = $('.discount').find(":selected").attr('data-val')
        const odname = $('.order-pic').find(".odname").text()
        const odmobile = $('.order-pic').find(".odmobile").text()
        const card_name = localStorage.getItem('cardReceiver')
        const card_content = localStorage.getItem('cardContent')
        const sticker = localStorage.getItem('sticker')
        const package = localStorage.getItem('package')
        const giftSid = ($('.gift-yes').css('display','none') ? "1" : "") 
        
        const fd = {
            "amount": finalprice,
            "gift_sid": giftSid,
            "od_name": odname,
            "od_mobile": odmobile,
            "rec_name": rec_name,
            "rec_mobile": rec_mobile,
            "rec_address": rec_address,
            "shipping": shipping,
            "payment_method":paymentMT,            
            "coupon_sid":coupon,
            "order_code":'DC<?=date("ymdHi").str_pad(rand(000,100),2,'0',STR_PAD_LEFT);?>',    
            "card_name":card_name,
            "card_content":localStorage.cardContent,
            "card_sticker":sticker,
            "package": package
        };
        console.log(fd)
        const usp = new URLSearchParams(fd);
        // 將資訊轉換成fd(form-data)物件
        fetch("order-api.php", {
            method: 'POST',
            body: usp.toString(),
             // 將資訊轉換成string物件
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        })
        .then(r2 => r2.json())
        .then(data=>{
            if(data.success){
            localStorage.clear();
            alert('購買成功!');
            $oid = data.oid
            location.href = "cart-step3.php?oid="+$oid;
        } else {
            alert(data.error || '無法購買，請聯繫客服');
        }
        });

        
    // 驗證資料
    // let isPass = true;

    // [...document.orderInfo.elements].forEach(el => {
    //   if (el.tagName !== 'INPUT') return;
    //   el.style.border = "0px";
    //   el.nextElementSibling.innerHTML = '';
    // })
    
    // const odpname = document.orderInfo.odpname;
    // if (odpname.value.length < 2) {
    //     odpname.style.border = "1px solid red";
    //     odpname.nextElementSibling.innerHTML = '請輸入正確的姓名';
    //   isPass = false;
    // }

    // const odpmobile = document.orderInfo.odpmobile;
    // if (! odpmobile.value){
    //     odpmobile.style.border = "1px solid red";
    //     odpmobile.nextElementSibling.innerHTML = '*必填';
    //   isPass = false;
    // }else{
    //   if (! validateMobile(odpmobile.value)) {
    //     odpmobile.style.border = "1px solid red";
    //     odpmobile.nextElementSibling.innerHTML = '請輸入正確的手機號碼';
    //     isPass = false;
    //   }
    // }

    // const rec_name = document.orderInfo.rec_name;
    // if (rec_name.value.length < 2) {
    //     rec_name.style.border = "1px solid red";
    //     rec_name.nextElementSibling.innerHTML = '暱稱需大於2字';
    //   isPass = false;
    // }

    // const rec_mobile = document.orderInfo.rec_mobile;
    // if (! rec_mobile.value){
    //     rec_mobile.style.border = "1px solid red";
    //     rec_mobile.nextElementSibling.innerHTML = '*必填';
    //   isPass = false;
    // }else{
    //   if (! validateMobile(mobileFi.value)) {
    //     mobileFi.style.border = "1px solid red";
    //     mobileFi.nextElementSibling.innerHTML = '請輸入正確的手機號碼';
    //     isPass = false;
    //   }
    // }

    // const rec_address = document.orderInfo.rec_address;
    // if (! validateMobile(rec_address.value)) {
    //     rec_address.style.border = "1px solid red";
    //     rec_address.nextElementSibling.innerHTML = '*必填';
    //     isPass = false;
    //   }
    // }

    // if (!isPass) {
    //   return;
    }

//   表單送出結束

        // 偵測卡片與包裝製作
        const cardandpkg = function(){
        console.log(location.hash);

        if(localStorage.cardReceiver || localStorage.package != null || undefined){
        $('.gift-yes').click();}

        if(localStorage.cardReceiver != null || undefined){
        $('.makecard').css('background-color','#A24D38').html('<i class="fa-solid fa-check"></i>卡片已製作')
        }
        
        if(localStorage.package != null || undefined){
        $('.chosepackage').css('background-color','#A24D38').html('<i class="fa-solid fa-check"></i>包裝已選擇')
        }
        }
        // window.addEventListener('hashchange', whenHashChange);
        cardandpkg();

    $('.pb_credit').click(function(){
        $('.credit-card').toggleClass('hidden')
    });

    $('.pb_line').click(function(){
        $('.credit-card').addClass('hidden')
    });
    $('.pb_store').click(function(){
        $('.credit-card').addClass('hidden')
    });
    function autocredit(){
        $('.card_name').val('文同珢');
        $('.cc1').val('4703');
        $('.cc2').val('5323');
        $('.cc3').val('0013');
        $('.cc4').val('1230');
        $('.cdm').val('08');
        $('.cdy').val('29');
        $('.card_cs').val('036')
    }
</script>
<?php include './parts/html_foot.php'?>