<?php
// include './parts/db-connect.php';
// if(isset($_SESSION['user'])){
//   header("Location: index_.php");
//   exit;
// }
$title = '登入';
$pageName = 'login';
?>

<?php include './parts/html_head.php'?>
<link rel="stylesheet" href="./style/cart.css">
<style>
section{
    height: 100vh;
}

.myslides{
    display: none;
}

.mySlides img{
    width: 100%;
    vertical-align: middle;
}

.mySlide a{
    color: white;
}

.slideshow-container{
    max-width: 80%;
    position: relative;
    margin:auto;
}

.prev, .next{
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: #3A2D27;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;

}
.prev{
    left: -50px;
}
.next{
    right: -50px;
    border-radius:3px 0 0 3px;
}
.prev:hover, .next:hover{
background-color: rgb(0, 0, 0, 0.8);

}

.text{
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    width: 100%;
    text-align: center;
    bottom: 8px;
}

section{
    height: 100vh;
}

.numbertext{
    columns: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
}

.active{
    background-color: #717171;
}

.fade{
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1.5s;
    animation: fade;
    animation-duration: 1.5s;
}
@-webkit-keyframes fade{
    from{opacity:.4}
    to{opacity:1}
}

@keyframes fade{
    from{opacity:.4}
    to{opacity:1}
}


</style>
<?php include './parts/navbar.php'?>
<section>
<div class="container">
        <div class="row">
        <div class="slideshow-container">
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <div class="row m-wrap mySlides fade">
                <div class="rec-item">
                    <i class="fa-solid fa-heart"></i>
                    <div class="img-wrap">
                        <img class="w100"src="./imgs/product.jpg" alt="">
                    </div>
                    <div class="item-info">
                        <p class="pm">111</p>
                        <p class="ps">$2,000</p>
                        <button class="btn-s btn1">加入購物車</button>
                    </div>
                </div>
                <div class="rec-item">
                    <i class="fa-solid fa-heart"></i>
                    <div class="img-wrap">
                        <img class="w100"src="./imgs/product.jpg" alt="">
                    </div>
                    <div class="item-info">
                        <p class="pm">bruno氣炸鍋</p>
                        <p class="ps">$2,000</p>
                        <button class="btn-s btn1">加入購物車</button>
                    </div>
                </div>
                <div class="rec-item">
                    <i class="fa-solid fa-heart"></i>
                    <div class="img-wrap">
                        <img class="w100"src="./imgs/product.jpg" alt="">
                    </div>
                    <div class="item-info">
                        <p class="pm">bruno氣炸鍋</p>
                        <p class="ps">$2,000</p>
                        <button class="btn-s btn1">加入購物車</button>
                    </div>
                </div>
                <div class="rec-item">
                    <i class="fa-solid fa-heart"></i>
                    <div class="img-wrap">
                        <img class="w100"src="./imgs/product.jpg" alt="">
                    </div>
                    <div class="item-info">
                        <p class="pm">bruno氣炸鍋</p>
                        <p class="ps">$2,000</p>
                        <button class="btn-s btn1">加入購物車</button>
                    </div>
                </div>
            </div>
            <div class="row m-wrap mySlides fade">
                <div class="rec-item">
                    <i class="fa-solid fa-heart"></i>
                    <div class="img-wrap">
                        <img class="w100"src="./imgs/product.jpg" alt="">
                    </div>
                    <div class="item-info">
                        <p class="pm">222</p>
                        <p class="ps">$2,000</p>
                        <button class="btn-s btn1">加入購物車</button>
                    </div>
                </div>
                <div class="rec-item">
                    <i class="fa-solid fa-heart"></i>
                    <div class="img-wrap">
                        <img class="w100"src="./imgs/product.jpg" alt="">
                    </div>
                    <div class="item-info">
                        <p class="pm">bruno氣炸鍋</p>
                        <p class="ps">$2,000</p>
                        <button class="btn-s btn1">加入購物車</button>
                    </div>
                </div>
                <div class="rec-item">
                    <i class="fa-solid fa-heart"></i>
                    <div class="img-wrap">
                        <img class="w100"src="./imgs/product.jpg" alt="">
                    </div>
                    <div class="item-info">
                        <p class="pm">bruno氣炸鍋</p>
                        <p class="ps">$2,000</p>
                        <button class="btn-s btn1">加入購物車</button>
                    </div>
                </div>
                <div class="rec-item">
                    <i class="fa-solid fa-heart"></i>
                    <div class="img-wrap">
                        <img class="w100"src="./imgs/product.jpg" alt="">
                    </div>
                    <div class="item-info">
                        <p class="pm">bruno氣炸鍋</p>
                        <p class="ps">$2,000</p>
                        <button class="btn-s btn1">加入購物車</button>
                    </div>
                </div>
            </div>
            <div class="row m-wrap mySlides fade">
                <div class="rec-item">
                    <i class="fa-solid fa-heart"></i>
                    <div class="img-wrap">
                        <img class="w100"src="./imgs/product.jpg" alt="">
                    </div>
                    <div class="item-info">
                        <p class="pm">333</p>
                        <p class="ps">$2,000</p>
                        <button class="btn-s btn1">加入購物車</button>
                    </div>
                </div>
                <div class="rec-item">
                    <i class="fa-solid fa-heart"></i>
                    <div class="img-wrap">
                        <img class="w100"src="./imgs/product.jpg" alt="">
                    </div>
                    <div class="item-info">
                        <p class="pm">bruno氣炸鍋</p>
                        <p class="ps">$2,000</p>
                        <button class="btn-s btn1">加入購物車</button>
                    </div>
                </div>
                <div class="rec-item">
                    <i class="fa-solid fa-heart"></i>
                    <div class="img-wrap">
                        <img class="w100"src="./imgs/product.jpg" alt="">
                    </div>
                    <div class="item-info">
                        <p class="pm">bruno氣炸鍋</p>
                        <p class="ps">$2,000</p>
                        <button class="btn-s btn1">加入購物車</button>
                    </div>
                </div>
                <div class="rec-item">
                    <i class="fa-solid fa-heart"></i>
                    <div class="img-wrap">
                        <img class="w100"src="./imgs/product.jpg" alt="">
                    </div>
                    <div class="item-info">
                        <p class="pm">bruno氣炸鍋</p>
                        <p class="ps">$2,000</p>
                        <button class="btn-s btn1">加入購物車</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


    <script src="./tryjs.js"></script>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlides(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides")
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length){ slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0 ; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i =0 ; i < dots.length; i++){
                dots[i].className = dots[i].className.replace("active","");
            }
            slides[slideIndex - 1].style.display = "flex";
            dots[slideIndex - 1].className +="active";
        }
    </script>


<?php include './parts/footer.php'?>

<?php include './parts/scripts.php'?>
<!-- js/jq script 的架構貼這邊 -->
<script>

</script>
<?php include './parts/html_foot.php'?>