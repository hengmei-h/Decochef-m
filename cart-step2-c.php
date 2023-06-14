<?php
include './parts/db-connect.php';
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
  }
$title = '選擇配送與填寫資料';
$pageName = 'cart-step2';


// 優惠券
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
                <!-- 商品細節 -->
                <div class="item products">
                    <div class="">
                        <div class="row spc-between">
                            <h6>課程資訊</h6>
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
                        <?php foreach ($_SESSION['class_cart'] as $item) : 
                        ?>
                            <div class="product-detail row m-wrap">
                                <div class="img-wrap">
                                    <img class="w100"  src="<?=$item['pic']?>" alt="">
                                </div>
                                <div class="product-info">
                                    <div class="row spc-evenly m-wrap">
                                        <div class="pd-name">
                                                <p><?= $item['brand'],$item['title'] ?></p>
                                                <p class="pm"><?= $item['teacher_name'] ?></p>
                                                <p class="pm">$<?= $item['cost'] ?>/位</p>
                                        </div>
                                        <div class="pd-price">
                                            <p>價格: $<span class="price" data-val="<?= $item['cost'] ?>"></span></p>
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
                <!-- 確認費用 -->
                <div class="fianl-price m-wrap item">
                    <h6>金額確認</h6>
                    
                    
                    <div class="row">
                        <div class="">
                        <!-- prd-only -->
                            <h6>$<span class="finalprice" data-val=""></span></h6>
                        </div>
                    </div>
                </div>
                <!-- 付款資訊 -->
                <div class="item">
                    <div class="paymentway">
                        <h6>選擇付款</h6>
                        <div class="row">
                            <div class="payment status btn-m pb_credit " data-val="信用卡付款">信用卡付款</div>
                            <div class="payment status btn-m pb_line " data-val="linepay">linepay</div>
                            <div class="payment status btn-m  pb_store" data-val="門市付款">門市付款</div>
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
        // const prccal = document.querySelector('.price-value')
        // const discount = $('.discount').find(":selected").val()
        // const shipping = $('.shippingfee').attr('data-val')
        const finaltotalVal = $('.finalprice').attr('data-val')
        const finaltotal = document.querySelector('.finalprice')
        
        // 商品總計
        let ProdTotalPrice = document.querySelector('.finalprice')
        ProdTotalPrice.innerHTML = total;
        console.log(total)
        // 最終價格
        finaltotal.innerHTML = total.toLocaleString();
        $('.finalprice').attr('data-val',total);
       }

        // 偵測優惠券選項
        // $('.discount').change(function(){
        //     const discount = $('.discount').find(":selected").val()
        //     calcTotal();
        // })
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
        const finalprice = $('.finalprice').attr('data-val')
        const paymentMT = $('.paymentway').find('.selected').attr('data-val')
        const odname = $('.order-pic').find(".odname").text()
        const odmobile = $('.order-pic').find(".odmobile").text()
        
        const fd = {
            "amount": finalprice,
            "od_name": odname,
            "od_mobile": odmobile,
            "payment_method":paymentMT,            
            "order_code":'CT<?=date("ymdHi").str_pad(rand(000,100),2,'0',STR_PAD_LEFT);?>',    
            // "package_":coupon,
        };
        console.log(fd)
        const usp = new URLSearchParams(fd);
        // 將資訊轉換成fd(form-data)物件
        fetch("class-order-api.php", {
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
            alert('購買成功!');
            $oid = data.oid
            location.href = "cart-step3-c.php?oid="+$oid;
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