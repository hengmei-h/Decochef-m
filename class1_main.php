<?php

include './parts/db-connect.php';

$sql = "SELECT * FROM class LIMIT 25"; //sql部分獨立出來
$row = $pdo->query($sql)->fetchAll(); //選取全部的內容

// echo json_encode($row); //顯示內容



$title = 'class1_main';
// $pageName = '體驗課程';
?>

<?php include './parts/html_head.php'?>
<link rel="stylesheet" href="./style/class1.css">
<style>

</style>
<?php include './parts/navbar.php'?>

    <!-- section1-主視覺----------------------->
    <div class="bgcontainer">
        <span></span>
    </div>

    <!-- section2-本月課程推薦排名------------->
    <section class="popular_class">
      <div class="class_text">
        <h2>Popular Class</h2>
        <h5>本月推薦</h5>
      </div>
           <!-- 推薦名次卡片 -->
           <div class="container_poCard container">
        <div class="poCard poCard_1 poCard__active">
          <div class="poimgs">
            <img src="imgs/class1/pocard.png" alt="" />
          </div>
          <div class="potext">
            <h6>No.1</h6>
            <div class="pm">免費課程體驗 免費課程體驗 1</div>
          </div>
        </div>

        <div class="poCard poCard_2">
          <div class="poimgs">
            <img src="imgs/class1/pocard.png" alt="" />
          </div>
          <div class="potext">
            <h6>No.2</h6>
            <div class="pm">
              免費課程體驗 免費課程體驗免費課程體驗 免費課程體驗 2
            </div>
          </div>
        </div>

        <div class="poCard poCard_3">
          <div class="poimgs">
            <img src="imgs/class1/pocard.png" alt="" />
          </div>
          <div class="potext">
            <h6>No.3</h6>
            <div class="pm">免費課程體驗 免費課程體驗 3</div>
          </div>
        </div>

        <div class="poCard poCard_4">
          <div class="poimgs">
            <img src="imgs/class1/pocard.png" alt="" />
          </div>
          <div class="potext">
            <h6>No.4</h6>
            <div class="pm">免費課程體驗 免費課程體驗4</div>
          </div>
        </div>

        <div class="poCard poCard_5">
          <div class="poimgs">
            <img src="imgs/class1/pocard.png" alt="" />
          </div>
          <div class="potext">
            <h6>No.5</h6>
            <div class="pm">免費課程體驗 免費課程體驗5</div>
          </div>
        </div>

        <div class="poCard poCard_6">
          <div class="poimgs">
            <img src="imgs/class1/pocard.png" alt="" />
          </div>
          <div class="potext">
            <h6>No.6</h6>
            <div class="pm">免費課程體驗 免費課程體驗6</div>
          </div>
        </div>
      </div>
      <ul class="carousel-indicators">
        <li>
          <label for="carousel-1" class="carousel-bullet">●</label>
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
        <li>
          <label for="carousel-5" class="carousel-bullet">●</label>
        </li>
        <li>
          <label for="carousel-6" class="carousel-bullet">●</label>
        </li>
      </ul>
      <input
        class="poCardinput"
        type="radio"
        id="carousel-1"
        name="carousel"
        checked="checked"
      />
      <input class="poCardinput" type="radio" id="carousel-2" name="carousel" />
      <input class="poCardinput" type="radio" id="carousel-3" name="carousel" />
      <input class="poCardinput" type="radio" id="carousel-4" name="carousel" />
      <input class="poCardinput" type="radio" id="carousel-5" name="carousel" />
      <input class="poCardinput" type="radio" id="carousel-6" name="carousel" />
    </section>

    <!-- section3-課程表----------------------->
    <section class="class">
      <div class="class_container">
        <div class="titlebtnAll">
          <div class="btntitle3">
            <div class="btntitle">
              <a href=""><h5>All</h5></a>
            </div>
            <div class="btntitle">
              <a href=""><h5>中日料理</h5></a>
            </div>
            <div class="btntitle">
              <a href=""><h5>西式饗宴</h5></a>
            </div>
          </div>
          <div class="btntitle_search">
            <form class="search-form">
              <input
                type="text"
                class="search-input"
                placeholder="輸入關鍵字"
              />
              <button type="submit" class="search-button">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </form>
          </div>
        </div>
        <div class="class_content">
          <div class="classCard">
            <div class="classimgs">
              <img src="imgs/class1/pocard.png" alt=""/>
            </div>
            <div class="classtext">
              <h6 style="color: #a24d38">2023.04.25 (二) 14:00-16:00</h6>
              <h6>五香蒜香松阪豬＆豬軟骨四神湯</h6>
              <h6>剩餘名額 : 10</h6>
              <div class="cost">
                <div style="color: #a24d38">
                  <i class="fa-solid fa-heart"></i>
                </div>
                <div><h6>＄1,280</h6></div>
                <div class="btn2 btn-s">
                  <i class="fa-solid fa-cart-plus"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="classCard">
            <div class="classimgs">
              <img src="imgs/class1/pocard.png" alt="" />
            </div>
            <div class="classtext">
              <h6 style="color: #a24d38">2023.04.25 (二) 14:00-16:00</h6>
              <h6>五香蒜香松阪豬＆豬軟骨四神湯</h6>
              <h6>剩餘名額 : 10</h6>
              <div class="cost">
                <div style="color: #a24d38">
                  <i class="fa-solid fa-heart"></i>
                </div>
                <div><h6>＄1,280</h6></div>
                <div class="btn2 btn-s">
                  <i class="fa-solid fa-cart-plus"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="classCard">
            <div class="classimgs">
              <img src="imgs/class1/pocard.png" alt="" />
            </div>
            <div class="classtext">
              <h6 style="color: #a24d38">2023.04.25 (二) 14:00-16:00</h6>
              <h6>五香蒜香松阪豬＆豬軟骨四神湯</h6>
              <h6>剩餘名額 : 10</h6>
              <div class="cost">
                <div style="color: #a24d38">
                  <i class="fa-solid fa-heart"></i>
                </div>
                <div><h6>＄1,280</h6></div>
                <div class="btn2 btn-s">
                  <i class="fa-solid fa-cart-plus"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="classCard">
            <div class="classimgs">
              <img src="imgs/class1/pocard.png" alt="" />
            </div>
            <div class="classtext">
              <h6 style="color: #a24d38">2023.04.25 (二) 14:00-16:00</h6>
              <h6>五香蒜香松阪豬＆豬軟骨四神湯</h6>
              <h6>剩餘名額 : 10</h6>
              <div class="cost">
                <div style="color: #a24d38">
                  <i class="fa-solid fa-heart"></i>
                </div>
                <div><h6>＄1,280</h6></div>
                <div class="btn2 btn-s">
                  <i class="fa-solid fa-cart-plus"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="classCard">
            <div class="classimgs">
              <img src="imgs/class1/pocard.png" alt="" />
            </div>
            <div class="classtext">
              <h6 style="color: #a24d38">2023.04.25 (二) 14:00-16:00</h6>
              <h6>五香蒜香松阪豬＆豬軟骨四神湯</h6>
              <h6>剩餘名額 : 10</h6>
              <div class="cost">
                <div style="color: #a24d38">
                  <i class="fa-solid fa-heart"></i>
                </div>
                <div><h6>＄1,280</h6></div>
                <div class="btn2 btn-s">
                  <i class="fa-solid fa-cart-plus"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="classCard">
            <div class="classimgs">
              <img src="imgs/class1/pocard.png" alt="" />
            </div>
            <div class="classtext">
              <h6 style="color: #a24d38">2023.04.25 (二) 14:00-16:00</h6>
              <h6>五香蒜香松阪豬＆豬軟骨四神湯</h6>
              <h6>剩餘名額 : 10</h6>
              <div class="cost">
                <div style="color: #a24d38">
                  <i class="fa-solid fa-heart"></i>
                </div>
                <div><h6>＄1,280</h6></div>
                <div class="btn2 btn-s">
                  <i class="fa-solid fa-cart-plus"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
           <!-- 換頁選取----->
           <div class="muibox_root">
        <a href="" class="muibox_icon">
          <i class="fa-solid fa-angle-left"></i>
        </a>
        <form action="">
          <input type="text" class="muibox_form" placeholder=" 1 " />
        </form>
        <a href="" class="muibox_icon">
          <i class="fa-solid fa-angle-right"></i>
        </a>
        <span>共10頁</span>
      </div>
    </section>
 
<?php include './parts/footer.php'?>

<?php include './parts/scripts.php'?>
<!-- js/jq script 的架構貼這邊 -->
<script>
    //點擊Top-6本月推薦
    let carousel_1 = document.getElementById("carousel-1");
    carousel_1.addEventListener("change", (event) => {
      if (carousel_1.checked) {
        let all_poCard = document.querySelectorAll(".poCard");
        all_poCard.forEach((item) => {
          item.classList.remove("poCard__active");
        });

        let poCard_1 = document.querySelector(".poCard_1");
        poCard_1.classList.add("poCard__active");
      }
    });

    let carousel_2 = document.getElementById("carousel-2");
    carousel_2.addEventListener("change", (event) => {
      if (carousel_2.checked) {
        let all_poCard = document.querySelectorAll(".poCard");
        all_poCard.forEach((item) => {
          item.classList.remove("poCard__active");
        });

        let poCard_2 = document.querySelector(".poCard_2");
        poCard_2.classList.add("poCard__active");
      }
    });

    let carousel_3 = document.getElementById("carousel-3");
    carousel_3.addEventListener("change", (event) => {
      if (carousel_3.checked) {
        let all_poCard = document.querySelectorAll(".poCard");
        all_poCard.forEach((item) => {
          item.classList.remove("poCard__active");
        });

        let poCard_3 = document.querySelector(".poCard_3");
        poCard_3.classList.add("poCard__active");
      }
    });

    let carousel_4 = document.getElementById("carousel-4");
    carousel_4.addEventListener("change", (event) => {
      if (carousel_4.checked) {
        let all_poCard = document.querySelectorAll(".poCard");
        all_poCard.forEach((item) => {
          item.classList.remove("poCard__active");
        });

        let poCard_4 = document.querySelector(".poCard_4");
        poCard_4.classList.add("poCard__active");
      }
    });

    let carousel_5 = document.getElementById("carousel-5");
    carousel_5.addEventListener("change", (event) => {
      if (carousel_5.checked) {
        let all_poCard = document.querySelectorAll(".poCard");
        all_poCard.forEach((item) => {
          item.classList.remove("poCard__active");
        });

        let poCard_5 = document.querySelector(".poCard_5");
        poCard_5.classList.add("poCard__active");
      }
    });

    let carousel_6 = document.getElementById("carousel-6");
    carousel_6.addEventListener("change", (event) => {
      if (carousel_6.checked) {
        let all_poCard = document.querySelectorAll(".poCard");
        all_poCard.forEach((item) => {
          item.classList.remove("poCard__active");
        });

        let poCard_6 = document.querySelector(".poCard_6");
        poCard_6.classList.add("poCard__active");
      }
    });

</script>
<?php include './parts/html_foot.php'?>