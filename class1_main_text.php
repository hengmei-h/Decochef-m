<?php

include './parts/db-connect.php';
$title = '體驗課程';
$pageName = 'class';

// section2-本月推薦top6---------
$sql = "SELECT * FROM class LIMIT 6 "; //sql部分獨立出來
$popularClass = $pdo->query($sql)->fetchAll(); //選取全部的內容
// echo json_encode($popularClass); 


//section3-課程表---------------

#取得分類資料
$c_sql = " SELECT * FROM `class_type` WHERE 3";
$cates = $pdo->query($c_sql)->fetchAll();

?>

<?php include './parts/html_head.php' ?>
<link rel="stylesheet" href="./style/class1.css">
<style>

</style>
<?php include './parts/navbar.php' ?>



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
  <div class="container_poCard">
    <?php foreach ($popularClass as $i) : ?>
      <div class="poCard poCard_<?= $i['sid'] ?> <?= $i['sid'] == '1' ? 'poCard__active' : '' ?>">
        <a href="class2.php?sid=<?= $i['sid'] ?>">
          <div class="poimgs">
            <img src="<?= $i['pic'] ?>" alt="" />
          </div>
        </a>
        <div class="potext">
          <h5>NO.<?= $i['sid'] ?></h5>
          <div class="pm">製作<?= $i['title'] ?>課程</div>
        </div>
      </div>
    <?php endforeach ?>
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
  <input class="poCardinput" type="radio" id="carousel-1" name="carousel" checked="checked" />
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
        <div class="btntitle" data-vall='0'>
          <a href="javascript:">
            <h5>All</h5>
          </a>
        </div>
        <?php foreach ($cates as $c) : ?>
          <div class="btntitle" data-vall=<?= $c['sid'] ?>>
            <a href="javascript:">
              <h5><?= $c['class_type_name'] ?></h5>
            </a>
          </div>
        <?php endforeach ?>
      </div>
      <div class="btntitle_search">
        <form class="search-form">
          <input type="text" class="search-input" placeholder="輸入關鍵字" />
          <button type="submit" class="search-button">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
    </div>

    <div class="class_content">
     <!-- 內容在class1_main_content.php     -->

    </div>


  </div>

</section>

<?php include './parts/footer.php' ?>

<?php include './parts/scripts.php' ?>
<!-- js/jq script 的架構貼這邊 -->
<script>
  //點擊Top-6本月推薦


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



  //section3卡片內頁------------------------
  const class_content = $('.class_content');
  let typeBtnVal = 1;


  const btntitles = $('.btntitle');
  console.log(btntitles)

  btntitles.click(function() {
    btntitles.removeClass('active');
    $(this).addClass('active');
    typeBtnVal = $(this).attr('data-vall');
    console.log(typeBtnVal)

    typeContent(typeBtnVal);
  });

  function typeContent(type_sid, page = 1) {
    console.log(`type_sid: ${type_sid}`)

    fetch(`class1_main_content.php?cate=${type_sid}&page=${page}`)
      .then(r => r.text())
      .then(txt => {
        class_content.html(txt);

      })

  }
  $('.btntitle').eq(0).click()

  //add to cart
  function addToClass(event){
        const btn = event.currentTarget;
        const item = btn.closest('.classCard');
        const pid = item.getAttribute('data-pid');
        const quantity = 1;

        console.log({pid, quantity})

        fetch(`class_cart_api.php?cmd=add&pid=${pid}&quantity=${quantity}`)
        
        .then(r=>r.json())
        .then(class_cart=>{
          console.log(class_cart);
          calcCartItems(class_cart.data);
          alert ('課程已加入購物車')
        })
    }

</script>
<?php include './parts/html_foot.php' ?>