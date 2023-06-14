<?php
$title = '禮物卡';
$pageName = 'gift2';

// $oid = $_GET['oid'];
// $sql = "SELECT * FROM `gift` WHERE `order_code`= $oid";
// $gift = $pdo->query($sql)->fetch(); 
?>

<?php include './parts/html_head.php' ?>
<link rel="stylesheet" href="./style/gift.css">
<link rel="stylesheet" href="./style/gift-3.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<?php include './parts/navbar.php' ?>

<!-- <dialog open>
  <p>這是 html 的 dialog!!</p>
</dialog> -->

<section class="card-middle">
    <div class="container">
        
        <div class="paper-carded ">
            <a href="">回上一步</a>
            <div class="row">

                <div class="paper_right">
                    
                    <h5 class="black">卡片內容</h5>
                    <div class="stickings">
                        <img class="card_three" src="imgs/kimi/Group 14208.svg" alt="">
                        <div class="inputbox">
                            <input type="text" name="receiver" placeholder="Dear: 請填入姓名" class="dears" id="receiver">
                            <div class="form-text"></div>
                            <br>
                            <input type="text" name="content" class="pleases ps" cols="30" rows="5" id="content" placeholder="請輸入內容"></input>
                        </div>
                    </div>
                </div>

                <div class="paper_left">

                    <h5 class="black">信封</h5>
                    <img src="imgs/kimi/image 59.png" alt="">

                    <img class="finish_stickers" src="imgs/kimi/sticker_04.png" alt="">

                    <div class="btn-fl">
                        <a href="./gift-1.php">
                            <!-- <div type="button" class=" btn1 btn-m intbtn">上一步</div> -->
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="card-end">
    <div class="container">
        <div class="paper-card ">
        <a href="">回上一步</a>
            <div class="row">
                <div class="paper_left">

                    <h5 class="black">內容及貼紙完成區</h5>
                 
                    <div class="stickings">
                        <img class="card_four" src="imgs/kimi/Group 14208.svg" alt="">
                        <div class="inputboxed">
                            <input type="text" name="receiver" placeholder="Dear:請填入姓名" class="deared" id="receiver">
                            <div class="form-text"></div>
                            <br>
                            <input type="text" name="content" class="pleaseed ps" cols="30" rows="5" id="content" placeholder="請輸入內容"></input>
                        </div>
                    </div>
                    <img src="imgs/kimi/image 59.png" style="margin-top: 113px;" alt="">
                    <img class="finish_stickeres" src="imgs/kimi/sticker_04.png" alt="" >
                </div>
            </div>
        </div>
    </div>
</section>



<?php include './parts/footer.php' ?>

<?php include './parts/scripts.php' ?>

<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>


<script>
    function customizeWindowEvent() {
        var popup_window = document.getElementById("window-container");

        popup_window.style.display = "block";

        window.onclick = function close(e) {
            if (e.target == popup_window) {
                popup_window.style.display = "none";
            }
        }
    }

    function customWindowEvent() {
        var popup_window = document.getElementById("window-containe");

        popup_window.style.display = "block";

        window.onclick = function close(e) {
            if (e.target == popup_window) {
                popup_window.style.display = "none";
            }
        }
    }
    $(function() {
        // $( "#draggable" ).draggable({ revert: "valid" });
        $("#draggable, #draggable_sticker_one, #draggable_sticker_two, #draggable_sticker_three, #draggable_sticker_four, #draggable_sticker_five").draggable({
            revert: "invalid"
        });

        $(".stick_check").droppable({
            activeClass: "ui-state-default",
            hoverClass: "ui-state-hover",
            drop: function(event, ui) {
                $(this)
                    .addClass("")
                    .find(".stick_check")
                    .html("");
            }
        });
    });




    $(function() {
        $(".sticker_one,.sticker_two,.sticker_three,.sticker_four,.sticker_five,.sticker_six").draggable();
    });

    function changeImgDemo(e) {
        const imgSrc = $(e.target).attr('src');
        $('.img-demo img').attr('src', imgSrc)
    }
    $('.img-row ').click(changeImgDemo)


    let sticker_src = '';
    // 讀取localStorage的資料 getItem(key)
    let receiver = window.localStorage.getItem('cardReceiver');
    let content = window.localStorage.getItem('cardContent');

    function checkForm(event) {
        event.preventDefault();
        const usp = new URLSearchParams({
            'sticker': sticker_src,
            'receiver': receiver,
            'content': content
        });
        localStorage.setItem('sticker', sticker_src);
        // fetch("add-cardapi.php", {
        //         method: 'POST',
        //         headers: {
        //             'Content-Type': 'application/x-www-form-urlencoded'
        //         },
        //         body: usp.toString()
        //     })
        //     // .then(r => console.log(r))
        //     .then(r => r.json())
        //     .then(data => {
        //         console.log(data);
        //         if (data) {
        //             alert('卡片製作完成');
        //             // location.href = 'cart-step3.php';
        //         }
        //     })
    }

    // 抓取使用者所選的 sticker圖片名稱
    function addToStick(e) {
        console.log(e.target.src);
        let sticker_img = e.target.src.split('/');
        sticker_src = sticker_img[sticker_img.length - 1];
        console.log(sticker_src);
    }

















    let page = 0;

    $('.slider-dots li').mouseenter(function(e) {
        page = $(e.target).index();
        movePage()
    })

    $('.nextPageArea').click(function(e) {
        if (page < 8) {
            page = page + 1;
            movePage()
        }
    })

    $('.prevPageArea').click(function(e) {
        if (page > 0) {
            page = page - 1;
            movePage()
        }
    })

    function movePage() {
        const movement = page * -50;
        $('.img-wrap').css('transform', `translateX(${movement}px)`)
        $('.slider-dots li').eq(page).css('background', '#fff').siblings().css('background', 'transparent')
    }

    // bounceIn()
    // $('.sticker').css({
    //     'width': '35%',
    //     'top': '51px',
    //     'left': '88px',
    // })
</script>