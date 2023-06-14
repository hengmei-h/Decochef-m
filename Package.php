<?php
require "./parts/db-connect.php";
$title = '選擇包裝';
$pageName = 'Package';
?>

<?php include './parts/html_head.php' ?>
<link rel="stylesheet" href="./style/Package.css">
<?php include './parts/navbar.php' ?>
<section class="Package">
    <div class="co containere">
        <h5>包裝紙挑選</h5>
        <div class="img-demo">

            <img src="./imgs/kimi/white.png" alt="" />
        </div>
        <div class="img-bg">
            <div class="img-wrap">
                <div class="img-outwrap">
                    <form name="form" novalidate style="display: flex;">
                        <img class="img-row" src="./imgs/kimi/package_01.png" alt="" onclick="addToPackage(event)" />
                        <img class="img-row" src="./imgs/kimi/package_02.png" alt="" onclick="addToPackage(event)" />
                        <img class="img-row" src="./imgs/kimi/package_03.png" alt="" onclick="addToPackage(event)" />
                        <img class="img-row" src="./imgs/kimi/package_04.png" alt="" onclick="addToPackage(event)" />
                        <img class="img-row" src="./imgs/kimi/package_05.png" alt="" onclick="addToPackage(event)" />


                </div>
            </div>
        </div>
        <div class="prevPageArea">
            <button type="button" class="btnPrev"> > </button>
        </div>
        <div class="nextPageArea">
            <button type="button" class="btnNext">
                < </button>
        </div>
    </div>
   
    <button type="button" onclick="checkForm(event),customizeWindowEvent()"  class="btn1 btn-m pktbtn ">完成</button>
    </form>
    <div id="window-contain">
        <div id="window-p">
            <div class="window-conte">
                <span class="finis">您的包裝已挑選完成</span>
                <div class="finish_car"><img src="imgs/kimi/Group 14217.svg" alt=""></div>
                <button class="bec btn1 btns "><a href="./cart-step2.php#card_done">繼續結帳</a> </button>
            </div>
        </div>
    </div>
</section>
<?php include './parts/footer.php' ?>
<?php include './parts/scripts.php' ?>
<script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
<script>
    function customizeWindowEvent() {
        var popup_window = document.getElementById("window-contain");

        popup_window.style.display = "block";

        window.onclick = function close(e) {
            if (e.target == popup_window) {
                popup_window.style.display = "none";
            }
        }
    }


    let package_src = '';
    // 讀取localStorage的資料 getItem(key)
    let package = window.localStorage.getItem('cardPackage');

    function checkForm(event) {
        event.preventDefault();
        const ust = new URLSearchParams({
            'package': package_src,


        });

        localStorage.setItem('package', package_src);

        /*
        fetch("add-packageapi.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: ust.toString()
            })
            // .then(r => console.log(r))
            .then(r => r.json())
            .then(data => {
                console.log(data);
                if (data) {
                    alert('包裝紙選購完成');
                    // location.href = 'cart-step3.php';
                }
            })
            */
    }
    // 抓取使用者所選的 sticker圖片名稱
    function addToPackage(e) {
        console.log(e.target.src);
        let package_img = e.target.src.split('/');
        package_src = package_img[package_img.length - 1];
        console.log(package_src);
    }


    function changeImgDemo(e) {
        const imgSrc = $(e.target).attr('src');
        $('.img-demo img').attr('src', imgSrc)
    }
    $('.img-row ').click(changeImgDemo)


    let page = 0;

    $('.slider-dots li').mouseenter(function(e) {
        page = $(e.target).index();
        movePage()
    })
    $('.nextPageArea').click(function(e) {
        if (page < 5) {
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
        const movement = page * -130;
        $('.img-outwrap').css('transform', `translateX(${movement}px)`)
        $('.slider-dots li').eq(page).css('background', '#fff').siblings().css('background', 'transparent')
    }
</script>