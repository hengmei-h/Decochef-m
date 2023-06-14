<?php
include './parts/db-connect.php';
// if(isset($_SESSION['user'])){
//   header("Location: index_.php");
//   exit;
// }
$title = '體驗課程';
$pageName = 'class';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;   //指定參數

// echo json_encode($sid) ; 

//如果沒有回到前一頁
if (!$sid) {
    header('Location: class1_main_text.php');
    exit;
}

//section1-課程資訊-----------------------------
$sql = "SELECT * FROM class WHERE sid = $sid "; //sql部分獨立出來
$i = $pdo->query($sql)->fetch(); //選取指定的內容


if (empty($i)) {
    header('Location: class1_main_text.php');
    exit;
}

// echo json_encode($i);

//section3-名人推薦----------------------------
$sql = "SELECT * FROM people_message LIMIT 10 "; //sql部分獨立出來
$people_message = $pdo->query($sql)->fetchAll(); //選取指定的內容

// echo json_encode($people_message) ; 
?>

<?php include './parts/html_head.php' ?>
<link rel="stylesheet" href="./style/class2.css">
<style>
    .container-nh {
        width: 1096px;
        margin: auto;
    }

    @media (max-width:375px) {
        .container-nh {
            width: 355px;
        }
    }
</style>
<?php include './parts/navbar.php' ?>


<!-- section1-課程資訊----------- -->
<section class="class_introduce container-nh">
    <div class="class_intro" data-pid="<?= $i['sid'] ?>">
        <div class="title_all">
            <a href="class1_main_text.php">
                <div class="class_title pl white">ALL</div>
            </a>
            <h4>></h4>
            <h4 class="title_h4">產品體驗課程</h4>
        </div>
        <div class="class_content">
            <div class="food_pic <?= $i['sid'] ?>">
                <div class="food_img">
                    <img src="<?= $i['pic'] ?>" alt="">
                </div>
                <div class="food_icon">
                    <div class="star_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="heart_icon">
                        <i class="fa-solid fa-heart"></i>
                        50
                    </div>
                </div>
            </div>
            <div class="text">
                <h5><?= $i['title']?> <span> 料理課程 </span></h5>
                <div class="p">
                    課程時間 ｜ <?= $i['time'] ?> <br><br>
                    報名截止 ｜ <?= $i['deadline'] ?> <br><br>
                    課程費用 ｜ $<?= number_format( $i['cost'])?> ，購買指定商品免費報名 <br><br>
                    剩餘名額 ｜ <?= $i['max'] ?> <br><br>
                    上課地點 ｜ <?= $i['location'] ?> <br><br>
                    使用產品 ｜ <a href="<?= $i['product_sid'] ?>" style="color:#AAAAAA;">烤箱SR-PG501</a>
                </div>
                <a class="btn-l btn5 btn-ll class_cart" onclick="addToClass(event)" >加入購物車</a>
            </div>
        </div>
    </div>
</section>

<!-- section2-師資介紹------------->
<section class="teacher">
    <div class="container">
        <div class="teach_btnn">
            <div class=" tcBtn tcBtn__teacher tcBtn__active">
                <h6>師資介紹</h6>
            </div>
            <div class=" tcBtn tcBtn__class ">
                <h6>課堂需知</h6>
            </div>
        </div>

        <div class="teachabout primary-light ">
            <div class="teachimg">
                <img src="imgs/class2/cooker/<?= $i['teacher_pic'] ?>" alt="">
            </div>
            <div class="">
                <h5><?= $i['teacher_name'] ?></h5>
                <div class="teachintro pl">
                    <?= $i['teacher_introduce'] ?>
                </div>
            </div>
        </div>
        <div class="classabout primary-light hidden ">
            <div class="classaboutimg">
                <img src="imgs/class2/起司貝果雙饗.jpg" alt="">
            </div>
            <div class="classaboutText">
                <h5>CLASS ABOUT</h5>
                <div class="classaboutintro pl">
                    <?= $i['class_content'] ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- section3-名人推薦------------------>
<section class="goodMessage">
    <h4 class="bigtitle">名人推薦</h4>
    <div class="goodcontent">
        <?php foreach ($people_message as $b) : ?>
            <div class="poCard">
                <div class="poimgs">
                    <img src="imgs/class2/people_imgs/<?= $b['avatar'] ?>" alt="">
                </div>
                <div class="potext pm">
                    <?= $b['avatar_message'] ?>
                </div>
            </div>
        <?php endforeach ?>
        <!-- <div class="poCard">
                <div class="poimgs">
                    <img src="imgs/class1/pocard.png" alt="">
                </div>
                <div class="potext pm">
                     費課程體驗 免費課程體驗費課程體驗 2
                </div>
            </div>
            <div class="poCard">
                <div class="poimgs">
                    <img src="imgs/class1/pocard.png" alt="">
                </div>
                <div class="potext pm">
                     費課程體驗 免費課程體驗費課程體驗 3
                </div>
            </div>
            <div class="poCard">
                <div class="poimgs">
                    <img src="imgs/class1/pocard.png" alt="">
                </div>
                <div class="potext pm">
                     費課程體驗 免費課程體驗費課程體驗 4
                </div>
            </div>
            <div class="poCard">
                <div class="poimgs">
                    <img src="imgs/class1/pocard.png" alt="">
                </div>
                <div class="potext pm">
                     費課程體驗 免費課程體驗費課程體驗 5
                </div>
            </div>
            <div class="poCard">
                <div class="poimgs">
                    <img src="imgs/class1/pocard.png" alt="">
                </div>
                <div class="potext pm">
                     費課程體驗 免費課程體驗費課程體驗 6
                </div>
            </div>
            <div class="poCard">
                <div class="poimgs">
                    <img src="imgs/class1/pocard.png" alt="">
                </div>
                <div class="potext pm">
                     費課程體驗 免費課程體驗費課程體驗 7
                </div>
            </div>
            <div class="poCard">
                <div class="poimgs">
                    <img src="imgs/class1/pocard.png" alt="">
                </div>
                <div class="potext pm">
                     費課程體驗 免費課程體驗費課程體驗 8
                </div>
            </div>
            <div class="poCard">
                <div class="poimgs">
                    <img src="imgs/class1/pocard.png" alt="">
                </div>
                <div class="potext pm">
                     費課程體驗 免費課程體驗費課程體驗 9
                </div>
            </div>
            <div class="poCard">
                <div class="poimgs">
                    <img src="imgs/class1/pocard.png" alt="">
                </div>
                <div class="potext pm">
                     費課程體驗 免費課程體驗費課程體驗 10
                </div>
            </div> -->
</section>

<!-- section4-相關課程------------------------ -->
<section class="aboutClass">
    <h4 class="bigtitle">相關課程</h4>

    <div class="abcontent">
        <div class="abCard abCard_1 abCard__active">
            <div class="abimg">
                <img src="http://pmst.panasonic.com.tw/edu/Cooking/assets/recipe/%E7%B6%93%E5%85%B8%E4%B9%9D%E5%AE%AE%E6%A0%BC%E6%AD%90%E5%BC%8F%E9%BA%B5%E5%8C%85(%E7%BE%85%E6%96%87%E6%B3%B0).jpg" alt="">
            </div>
            <div class="abtext primary-light">
                <p>經典九宮格歐式麵包</p>
                <div class="btn2 btn-s"><i class="fa-solid fa-cart-plus"></i></div>
            </div>
        </div>
        <div class="abCard abCard_2">
            <div class="abimg">
                <img src="http://pmst.panasonic.com.tw/edu/Cooking/assets/recipe/%E7%88%86%E6%BC%BF%E4%BC%AF%E7%88%B5%E6%88%9A%E9%A2%A8%E8%9B%8B%E7%B3%95(%E8%A8%B1%E8%A9%A0%E5%BF%83).jpg" alt="">
            </div>
            <div class="abtext primary-light">
                <p>爆漿伯爵戚風蛋糕</p>
                <div class="btn2 btn-s"><i class="fa-solid fa-cart-plus"></i></div>
            </div>
        </div>
        <div class="abCard abCard_3">
            <div class="abimg">
                <img src="http://pmst.panasonic.com.tw/edu/Cooking/assets/recipe/%E8%83%A1%E6%A4%92%E9%A4%85.jpg" alt="">
            </div>
            <div class="abtext primary-light">
                <p>美味豬肉胡椒餅</p>
                <div class="btn2 btn-s"><i class="fa-solid fa-cart-plus"></i></div>
            </div>
        </div>
        <div class="abCard abCard_4">
            <div class="abimg">
                <img src="http://pmst.panasonic.com.tw/edu/Cooking/assets/recipe/%E7%B6%93%E5%85%B8%E4%B9%9D%E5%AE%AE%E6%A0%BC%E5%8F%B0%E5%BC%8F%E9%BA%B5%E5%8C%85.jpg" alt="">
            </div>
            <div class="abtext primary-light">
                <p>經典九宮格台式麵包</p>
                <div class="btn2 btn-s"><i class="fa-solid fa-cart-plus"></i></div>
            </div>
        </div>
    </div>
    <ul class="aboutClass_carousel-indicators">
        <li>
            <label for="carousel-1" class="carousel-bullet">● </label>
        </li>
        <li>
            <label for="carousel-2" class="carousel-bullet">●</label>
        </li>
        <li>
            <label for="carousel-3" class="carousel-bullet">●</label>
        </li>
        <li>
            <label for="carousel-4" class="carousel-bullet">●</label>
        </li>
    </ul>
    <input class="abCardinput" type="radio" id="carousel-1" name="carousel" checked="checked" />
    <input class="abCardinput" type="radio" id="carousel-2" name="carousel" />
    <input class="abCardinput" type="radio" id="carousel-3" name="carousel" />
    <input class="abCardinput" type="radio" id="carousel-4" name="carousel" />
</section>





<?php include './parts/footer.php' ?>

<?php include './parts/scripts.php' ?>


<!-- js/jq script 的架構貼這邊 -->
<script>
    //section2-師資介紹    
    let tcBtn__teacher = document.querySelector('.tcBtn__teacher'); //抓取 師資按鈕
    let tcBtn__class = document.querySelector('.tcBtn__class'); //抓取 課程按鈕

    let teachabout = document.querySelector('.teachabout'); //抓取 師資內容
    let classabout = document.querySelector('.classabout'); //抓取 課程內容


    tcBtn__teacher.addEventListener('click', event => {
        tcBtn__teacher.classList.add('tcBtn__active');
        tcBtn__class.classList.remove('tcBtn__active');
        teachabout.classList.remove('hidden')
        classabout.classList.add('hidden')
    });

    tcBtn__class.addEventListener('click', event => {
        tcBtn__teacher.classList.remove('tcBtn__active');
        tcBtn__class.classList.add('tcBtn__active');
        teachabout.classList.add('hidden')
        classabout.classList.remove('hidden')

    });


    let all_poCard = document.querySelectorAll('.poCard'); //抓取poCard

    all_poCard.forEach(item => {
        console.log(item)

        item.addEventListener('mouseover', () => {
            all_poCard.forEach(element => {
                element.style.animationPlayState = 'paused';
            })
            //item.style.animationPlayState = 'paused';
        });

        item.addEventListener('mouseout', () => {
            //item.style.animationPlayState = 'running';

            all_poCard.forEach(element => {
                element.style.animationPlayState = 'running';
            })
        });

    })

    //section4相關課程
    //點擊4個課程
    let carousel_1 = document.getElementById("carousel-1");
    carousel_1.addEventListener("change", (event) => {
        if (carousel_1.checked) {
            let all_abCard = document.querySelectorAll(".abCard");
            all_abCard.forEach((item) => {
                item.classList.remove("abCard__active");
            });

            let abCard_1 = document.querySelector(".abCard_1");
            abCard_1.classList.add("abCard__active");
        }
    });

    let carousel_2 = document.getElementById("carousel-2");
    carousel_2.addEventListener("change", (event) => {
        if (carousel_2.checked) {
            let all_abCard = document.querySelectorAll(".abCard");
            all_abCard.forEach((item) => {
                item.classList.remove("abCard__active");
            });

            let abCard_2 = document.querySelector(".abCard_2");
            abCard_2.classList.add("abCard__active");
        }
    });

    let carousel_3 = document.getElementById("carousel-3");
    carousel_3.addEventListener("change", (event) => {
        if (carousel_3.checked) {
            let all_abCard = document.querySelectorAll(".abCard");
            all_abCard.forEach((item) => {
                item.classList.remove("abCard__active");
            });

            let abCard_3 = document.querySelector(".abCard_3");
            abCard_3.classList.add("abCard__active");
        }
    });

    let carousel_4 = document.getElementById("carousel-4");
    carousel_4.addEventListener("change", (event) => {
        if (carousel_4.checked) {
            let all_abCard = document.querySelectorAll(".abCard");
            all_abCard.forEach((item) => {
                item.classList.remove("abCard__active");
            });

            let abCard_4 = document.querySelector(".abCard_4");
            abCard_4.classList.add("abCard__active");
        }
    });


    //add to cart
    function addToClass(event) {
        const btn = event.currentTarget;
        const item = btn.closest('.class_intro');
        const pid = item.getAttribute('data-pid');
        const quantity = 1;

        console.log({
            pid,
            quantity
        })

        fetch(`class_cart_api.php?cmd=add&pid=${pid}&quantity=${quantity}`)

            .then(r => r.json())
            .then(class_cart => {
                console.log(class_cart);
                calcCartItems(class_cart.data);
                alert('課程已加入購物車')
            })
    }


</script>
<?php include './parts/html_foot.php' ?>