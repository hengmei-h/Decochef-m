<?php
require "./parts/db-connect.php";
$title = '禮物卡';
$pageName = 'gift2';
?>
<?php include './parts/html_head.php' ?>
<link rel="stylesheet" href="./style/gift.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<?php include './parts/navbar.php' ?>

<!-- <dialog open>
  <p>這是 html 的 dialog!!</p>
</dialog> -->

<section class="card-middle">
    <div class="container">
        <div class="steps">
            <div class="step_progress">
                <div class="bar_box">
                    <div class="bar" style="width:0%"></div>
                </div>
                <div class="step_content">
                    <div class="step active">
                        <div class="step_num"></div>
                        <div class="step_name">填寫名字及內容</div>
                    </div>
                    <div class="step ">
                        <div class="step_num">
                            <div class="step_littla"></div>
                        </div>
                        <div class="step_name">貼上貼紙</div>
                    </div>
                    <div class="step ">
                        <div class="step_num"></div>
                        <div class="step_name">卡片製作完成</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="paper-card ">
            <div class="row">
                <div class="paper_left">

                    <h5 class="black">卡片製作區</h5>
                    <img src="imgs/kimi/image 59.png" alt="">
                    <div class="stick_check">
                        <p class="pm">stick</p>
                    </div>
                    <div class="btn-fl">
                        <a href="./gift-1.php">
                            <!-- <div type="button" class=" btn1 btn-m intbtn">上一步</div> -->
                        </a>
                        <form name="form" novalidate>

                            <button type="button" onclick="checkForm(event), customizeWindowEvent()" class=" btn1 btn-m ontbtn">完成</button>
                           

                    </div>
                </div>
                <div class="paper_right">
                    <h5 class="black">貼上貼紙</h5>
                    <div class="sticking">
                        <div class="sticker_one" id=draggable><img src="imgs/kimi/sticker_04.png" alt="" onclick="addToStick(event)"></div>
                        <div class="sticker_two" id="draggable_sticker_one"><img src="imgs/kimi/sticker_02.png" alt="" onclick="addToStick(event)"></div>
                        <div class="sticker_three" id="draggable_sticker_two"><img src="imgs/kimi/sticker_05.png" alt="" onclick="addToStick(event)"></div>
                        <div class="sticker_four" id="draggable_sticker_three"><img src="imgs/kimi/sticker_03.png" alt="" onclick="addToStick(event)"></div>
                        <div class="sticker_five" id="draggable_sticker_four"><img src="imgs/kimi/sticker_01.png" alt="" onclick="addToStick(event)"></div>
                        <div class="sticker_six" id="draggable_sticker_five"><img src="imgs/kimi/sticker_06.png" alt="" onclick="addToStick(event)"></div>
                        </form>
                    </div>
                    <div id="window-container">
                        <div id="window-pop">
                            <div class="window-contenr">
                                <span class="finish">您的卡片已製作完成</span>
                                <div class="finish_card"><img  src="imgs/kimi/Group 14217.svg" alt=""></div>
                                <button class="beck btn1 btns "><a href="./cart-step2.php#card_done" class="p white">繼續結帳</a> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="card-end">
    <div class="container">
        <div class="steps">
            <div class="step_progress">
                <div class="bar_box">
                    <div class="bar" style="width:0%"></div>
                </div>
                <div class="step_content">
                    <div class="step active">
                        <div class="step_num"></div>
                        <div class="step_name">填寫名字及內容</div>
                    </div>
                    <div class="step ">
                        <div class="step_num">
                            <div class="step_littla"></div>
                        </div>
                        <div class="step_name">貼上貼紙</div>
                    </div>
                    <div class="step ">
                        <div class="step_num"></div>
                        <div class="step_name">卡片製作完成</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="paper-card ">

            <div class="paper_left">

                <h5 class="black">卡片製作區</h5>
                <img src="imgs/kimi/image 59.png" alt="">
                <div class="img-demo">
                    <img src="./imgs/kimi/sticker_04.png" alt="" />
                </div>
                <div class="stick_bg">

                    <div class="stick-phone">
                        <ul class="img-wrap">
                            <form name="form" novalidate style="display: flex;">
                                <li><img src="imgs/kimi/sticker_04.png" class="img-row" onclick="addToStick(event)" alt=""></li>
                                <li><img src="imgs/kimi/sticker_02.png" class="img-row" onclick="addToStick(event)" alt=""></li>
                                <li><img src="imgs/kimi/sticker_05.png" class="img-row" onclick="addToStick(event)" alt=""></li>
                                <li><img src="imgs/kimi/sticker_03.png" class="img-row" onclick="addToStick(event)" alt=""></li>
                                <li><img src="imgs/kimi/sticker_01.png" class="img-row" onclick="addToStick(event)" alt=""></li>
                                <li><img src="imgs/kimi/sticker_06.png" class="img-row" onclick="addToStick(event)" alt=""></li>
                        </ul>
                        <div class="prevPageArea">
                            <button class="btnPrev" type="button"> > </button>
                        </div>
                        <div class="nextPageArea">
                            <button class="btnNext" type="button">
                                < </button>
                        </div>
                    </div>
                </div>
                <div id="window-containe">
                    <div id="window-po">
                        <div class="window-content">
                            <span class="finishes">您的卡片已製作完成</span>
                            <div class="finish_card_iphone"><img  src="imgs/kimi/Group 14217.svg" alt=""></div>
                            <button class="back btn1 btns"> <a href="./cart-step2.php#card_done">繼續結帳</a></button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn1 btn-m ontbtn" onclick="checkForm(event),customWindowEvent()">完成</button>
                </form>
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