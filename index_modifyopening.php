<?php
include './parts/db-connect.php';
$title = '首頁';
$pageName = 'index_.php';

?>

<?php include './parts/html_head.php' ?>
<link rel="stylesheet" href="./style/index_.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
<!-- kk -->
<!-- css-link -->
<link rel="stylesheet" href="../Decochef/style/opening.css">
<!-- slick -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
 <!-- google font -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Great+Vibes&family=Lobster&family=Noto+Serif+JP:wght@200;300;400;500;600;700;900&display=swap" rel="stylesheet">
<!-- kk -->
<!-- nn -->

<style>
  .opening{
    height: 100vh;
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    overflow: hidden;
    z-index: 5000000;
    clear: both;
  }
  .clearall{
    clear: both;
  }
  header{
    display: none;
  }


</style>
<!-- nn -->
<?php include './parts/navbar.php' ?>

<!-- kk -->
<section class="opening">
  <div class="wrapallsection">
  <div class="circlelarge">
      <span  style="--clr:#FFB6C1;--i:18px;--d:2.5s;"></span>
      <span  style="--clr:#DEB887;--i:13px;--d:4s;"></span>
      <span  style="--clr:#66CDAA;--i:15px;--d:6s;"></span>
      <span  style="--clr:#40E0D0;--i:20px;--d:8s;"></span>
  </div>
    <!-- type -->
  <section>
    <div class="logo">
      <a href="./index_.php">
        <h2 class="sectionh2">
          <span class="sectionh2span">D</span>
          <span class="sectionh2span">e</span>
          <span class="sectionh2span">c</span>
          <span class="sectionh2span">o</span>
          <span class="sectionh2span">C</span>
          <span class="sectionh2span">h</span>
          <span class="sectionh2span">e</span>
          <span class="sectionh2span">f</span>  
        </h2>
        <div class="sub">
          <h3 class="sectionh3">
          <span class="sectionh3span">結</span>
          <span class="sectionh3span">合</span>
          <span class="sectionh3span">美</span>
          <span class="sectionh3span">感</span>
          <span class="sectionh3span">與</span>
          <span class="sectionh3span">實</span>
          <span class="sectionh3span">用</span>
          <span class="sectionh3span">&#130;</span>
          <span class="sectionh3span">打</span>
          <span class="sectionh3span">造</span>
          <span class="sectionh3span">高</span>
          <span class="sectionh3span">品</span>
          <span class="sectionh3span">質</span>
          <span class="sectionh3span">的</span>
          <span class="sectionh3span">餐</span>
          <span class="sectionh3span">廚</span>
          <span class="sectionh3span">餐</span>
          <span class="sectionh3span">生</span>
          <span class="sectionh3span">活</span>
          <span class="sectionh3span">夢</span>
          <span class="sectionh3span">&#9702;</span>
          </h3>
        </div>

        <div class="sub-m">
          <h5 class="sectionh5-m">
          <span class="sectionh5span-m">結</span>
          <span class="sectionh5span-m">合</span>
          <span class="sectionh5span-m">美</span>
          <span class="sectionh5span-m">感</span>
          <span class="sectionh5span-m">與</span>
          <span class="sectionh5span-m">實</span>
          <span class="sectionh5span-m">用</span>
          <span class="sectionh5span-m">&#130;</span>
          </h5>
          <h5 class="sectionh5-m">
          <span class="sectionh5span-m">打</span>
          <span class="sectionh5span-m">造</span>
          <span class="sectionh5span-m">高</span>
          <span class="sectionh5span-m">品</span>
          <span class="sectionh5span-m">質</span>
          <span class="sectionh5span-m">的</span>
          <span class="sectionh5span-m">餐</span>
          <span class="sectionh5span-m">廚</span>
          <span class="sectionh5span-m">餐</span>
          <span class="sectionh5span-m">生</span>
          <span class="sectionh5span-m">活</span>
          <span class="sectionh5span-m">夢</span>
          <span class="sectionh5span-m">&#9702;</span>
          </h5>
        </div>
      </a>
    </div>
  </section>
  <div class="clearall">

  </div>
</div>
</section>

<!-- kk -->
<section class="frontpage_video">
  <video autoplay loop  src="imgs/video/DecoChef-HS-1920x1080.mov" class="hs-video">
  </video>
  <button class="pause"><i class="fa-solid fa-pause"></i></button>
  <button class="volume"><i class="fa-solid fa-volume-high"></i></button>
</section>

<section class="frontpage_iphone_video">
  <video autoplay loop src="imgs/video/DecoChef-HS-Mobile.mov" class="mo-video">
  </video>
</section>

<section class="herosection">
  <div class="container">
    <div class="rectangle">
      <div class="life">
        <h1>LifeStyle</h1>
        <p>品味誌<br />精選的文章，<br />尋找你的生活靈感！</p>
        <a href="">
          <div type="button" class="btn1 btn-s gobtn">前往探索&nbsp;></div>
        </a>
      </div>
      <div class="re"><img src="imgs/kimi/Rectangle 653.png" alt="" /></div>
    </div>

    <div class="chef">
      <!-- <div class="ing"> -->
      <div class="ing_box">
        <img class="pi" src="imgs/kimi/food1.png" alt="" />
        <div class="svg_outbox">
          <div class="svg_videotest">
            <div class="fork"><a href=""><img src="imgs/front page-T/fork.svg" alt=""></div>
            <p class="food_liked">食譜</p></a>
          </div>
        </div>

      </div>

      <div class="ing_box ">
        <img class="pi" src="imgs/kimi/food2.png" alt="" />
        <div class="svg_outbox">
          <div class="svg_videotest">
            <div class="video"><a href=""><img src="imgs/front page-T/video.svg" alt=""></div>
            <p class="food_liked">影音</p></a>
          </div>
        </div>
      </div>

      <div class="ing_box">
        <img class="pi" src="imgs/kimi/foof3.png" alt="" />
        <div class="svg_outbox">
          <div class="svg_videotest">
            <div class="fave"><a href=""><img class="testing" src="imgs/front page-T/fave.svg" alt=""></div>
            <p class="food_liked">好物推薦</p></a>
          </div>
        </div>

      </div>



      <!-- </div> -->

      <!-- <div class="ing"> -->
      <!-- <div class="ing_box">
          <div class="svg_box"><img src="imgs/首頁桌機/影音桌.svg" alt="">
          </div>
          <p class="food_liked">影音</p>
        </div>
        <div class="pi_image"><img class="pi" src="imgs/Group 14196.png" alt="" /></div> -->
      <!-- </div> -->

      <!-- <div class="ing"> -->
      <!-- <div class="ing_box">
          <div class="svg_box"><img class="food_recommend" src="imgs/首頁桌機/推薦桌.svg" alt="">
          </div>
          <p class="food_liked">好物推薦</p>
        </div>
        <div class="pi_image"><img class="pi" src="imgs/Group 14199 (1).png" alt="" /></div> -->
      <!-- </div> -->

    </div>

  </div>
  <div class="color-bg"></div>
</section>

<section class="bestseller">


  <div class="pa-card pa1-img pa1">
    <a href="">
      <div class="pa-text "></div>
    </a>
    <div class="best">
      <h1>Bestseller</h1>
      <p>Choose your best cooker</p>
    </div>
  </div>
  <div class="pa-card pa2-img pa2">
    <a href="">
      <div class="pa-text"></div>
    </a>
  </div>
  <div class="pa-card pa3-img pa3">
    <a href="">
      <div class="pa-text"> </div>
    </a>
  </div>
  <div class="pa-card pa4-img pa4">
    <a href="">
      <div class="pa-text"></div>
    </a>
  </div>
  <div class="pa-card pa5-img pa5">
    <a href="">
      <div class="pa-text"></div>
    </a>
  </div>
  <div class="pa-card pa6-img pa6">
    <a href="">
      <div class="pa-text"></div>
    </a>
  </div>
  <div class="pa-card pa7-img pa7">
    <a href="">
      <div class="pa-text"></div>
    </a>
  </div>
  <div class="pa-card pa8-img pa8">
    <a href="">
      <div class="pa-text"></div>
    </a>
  </div>
  <div class="pa-card pa9-img pa9">
    <a href="">
      <div class="pa-text"></div>
    </a>
  </div>
  <div class="pa-card pa10-img pa10">
    <a href="">
      <div class="pa-text"></div>
    </a>
  </div>
  <div class="pa-card pa11-img pa11">
    <a href="">
      <div class="pa-text"></div>
    </a>
  </div>
  <div class="pa-card pa12-img pa12">
    <a href="">
      <div class="pa-text"></div>
    </a>
  </div>
  <div class="pa-card pa13-img pa13">
    <a href="">
      <div class="pa-text"></div>
    </a>
  </div>


  </div>


</section>

<!-- <section class="bestsellered">
    <div class="bestone">
      <h1>Bestseller</h1>
      <p>Choose your best cooker</p>
    </div>

    <div class="ceek">
      <div class="pa-carded pa14">

      </div>


      <div class="deve">
        <div class="pa-carded pa2"></div>
        <div class="pa-card pa3"></div>
        <div class="pa-card pa4"></div>
        <div class="pa-card pa5"></div>
        <div class="pa-card pa6"></div>
        <div class="pa-card pa7"></div>
</div>
    </div>

    <div class="debe">
      <div class="dede">
        <div class="pa-card pa8"></div>
        <div class="pa-card pa9"></div>
        <div class="pa-card pa10"></div>
        <div class="pa-card pa11"></div>
        <div class="pa-card pa12"></div>
      </div>
      <div class="pa-card pa13"></div>
    </div>
  </section> -->

<section class="brand">
  <div class="container">
    <h2 class="brands_title">Brands</h2>


    <div class="slider-window ">
      <ul class="img-wrap">
        <li><img src="imgs/kimi/aladdin.png" alt=""></li>
        <li><img src="imgs/kimi/iris.png" alt=""></li>
        <li><img src="imgs/kimi/balmuda.png" alt=""></li>
        <li><img src="imgs/kimi/gia.png" alt=""></li>
        <li><img src="imgs/kimi/mosh.png" alt=""></li>
        <li><img src="imgs/kimi/recolte.png" alt=""></li>
        <li><img src="imgs/kimi/siroca.png" alt=""></li>
        <li><img src="imgs/kimi/bruno.png" alt=""></li>
        <li><img src="imgs/kimi/toffy.png" alt=""></li>
      </ul>
      <div class="prevPageArea">
        <button class="btnPrev"> > </button>
      </div>
      <div class="nextPageArea">
        <button class="btnNext"> < </button>
      </div>


      <!-- <div class="slider-windowe ">
        <ul class="img-wrape">
          <li><img src="imgs/kimi/aladdin.png" alt=""></li>
          <li><img src="imgs/kimi/iris.png" alt=""></li>
          <li><img src="imgs/kimi/balmuda.png" alt=""></li>
          <li><img src="imgs/kimi/gia.png" alt=""></li>
          <li><img src="imgs/kimi/mosh.png" alt=""></li>
          <li><img src="imgs/kimi/recolte.png" alt=""></li>
          <li><img src="imgs/kimi/siroca.png" alt=""></li>
          <li><img src="imgs/kimi/bruno.png" alt=""></li>
          <li><img src="imgs/kimi/toffy.png" alt=""></li>
        </ul>
        <div class="prevPageAreae">
      <button class="btnPrevee">&lt;</button>
  </div>
  <div class="nextPageAreae">
      <button class="btnNexte">&gt;</button>
  </div> -->
    </div>

    <div class="rectangle_little">
      <div class="retangle_border">
        <p class="pl ">
          一個專為懂得品味生活的大人而誕生的品牌<br>
          「多變」與「樂趣」的Bruno style<br>
          改變熱愛聚會、熱愛料理的人們的生活方式。
        </p>
        <a href="">
          <div type="button" class="btn1 btn-s seebtn">查看商品</div>
        </a>
      </div>
      <img class="brands_retabgle" src="imgs/kimi/glass-s.png" alt="">
    </div>




</section>

<!-- 原本map -->
<!-- <section class="map">
    <div class="container">
      <div class="stbp">
        <div class="">
          <h2 class="store">Stores</h2>
        </div>
        <div class="smp">
          <p class="pms">
          <div>北部</div>
          <div>中部</div>
          <div>南部</div>
          <div>東部</div>
          </p>
        </div>

        <div class="ppa">
          <div><img src="imgs/首頁桌機/Vector.svg " alt="">體驗店</div>
          <div><img src="imgs/首頁手機/旗艦店.svg" alt="">旗艦店</div>
          <div><img src="imgs/首頁手機/維修.svg" alt="">維修站</div>
        </div>

        <div class="adress">
        <h6>信義門市<img src="imgs/首頁桌機/淺色.svg" alt=""><img src="imgs/首頁手機/個別維修.svg" alt=""></h6>
        <p>地址：台北市信義區信義路五段170號<br>電話：02-2490-0333</p>
        <h6>信義門市<img src="imgs/首頁桌機/淺色.svg" alt=""><img src="imgs/首頁手機/個別維修.svg" alt=""></h6>
        <p>地址：台北市信義區信義路五段170號<br>電話：02-2490-0333</p>
        <h6>信義門市<img src="imgs/首頁桌機/淺色.svg" alt=""><img src="imgs/首頁手機/個別維修.svg" alt=""></h6>
        <p>地址：台北市信義區信義路五段170號<br>電話：02-2490-0333</p>
        </div>
      </div>
    </div>
  </section> -->
<!-- 原本map結束 -->

<!-- nn -->
<section class="map">
  <div class="container">
    <div class="row">
      <div class="mapinfo">
        <h2 class="store">Stores</h2>
        <div class="smp">
          <div class=" north ">
            <h6>北部</h6>
          </div>
          <div class="mid">
            <h6>中部</h6>
          </div>
          <div class="south">
            <h6>南部</h6>
          </div>
          <div class="east">
            <h6>東部</h6>
          </div>
        </div>

        <div class="ppa">
          <div class="row"><img src="imgs/front page-T/Vector.svg" alt=""><a href="">體驗店</a></div>
          <div class="row"><img src="imgs/front page-I/test.svg " alt=""><a href="">旗艦店</a></div>
          <div class="row"><img src="imgs/front page-I/fix.svg" alt=""><a href="">維修店</a></div>
        </div>

        <div class="adress">
          <a href="https://www.google.com.tw/maps/place/110%E5%8F%B0%E5%8C%97%E5%B8%82%E4%BF%A1%E7%BE%A9%E5%8D%80%E4%BF%A1%E7%BE%A9%E8%B7%AF%E4%BA%94%E6%AE%B5170%E8%99%9F/@25.0330088,121.5713156,17z/data=!3m1!4b1!4m5!3m4!1s0x3442abafa511b12b:0x33e0e7f18f6a3d27!8m2!3d25.0330088!4d121.5738905?hl=zh-TW">
            <h6>信義門市
          </a><img src="imgs/front page-I/p-fix.svg" alt=""></h6>
          <p>地址：台北市信義區信義路五段170號<br>電話：02-2490-5748</p>
          <a href="https://www.google.com.tw/maps/place/%E8%99%9F+2+%E6%A8%93,+No.+390%E5%BE%A9%E8%88%88%E5%8D%97%E8%B7%AF%E4%B8%80%E6%AE%B5%E5%A4%A7%E5%AE%89%E5%8D%80%E5%8F%B0%E5%8C%97%E5%B8%82106/@25.0337842,121.5407118,17z/data=!3m2!4b1!5s0x3442abd3799b10c5:0xd096eb3dd7a37f22!4m6!3m5!1s0x3442abd379ae2e41:0x7613daa7e361cec3!8m2!3d25.0337842!4d121.5432867!16s%2Fg%2F11k4x6h9rf?hl=zh-TW">
            <h6>大安門市
          </a><img src="imgs/front page-T/thin.svg" alt=""><img src="imgs/front page-I/p-fix.svg" alt=""></h6>
          <p>地址：台北市復興南路一段390號2樓<br>電話：02-2540-8563</p>
          <a href="https://www.google.com.tw/maps/place/106%E5%8F%B0%E5%8C%97%E5%B8%82%E5%A4%A7%E5%AE%89%E5%8D%80%E4%BF%A1%E7%BE%A9%E8%B7%AF%E4%B8%89%E6%AE%B5153%E8%99%9F10/@25.0337929,121.5400133,17z/data=!3m1!4b1!4m5!3m4!1s0x3442abd482268405:0xc2f2bf73d9147b2c!8m2!3d25.0337929!4d121.5425882?hl=zh-TW">
            <h6>信義門市
          </a><img src="imgs/front page-T/thin.svg" alt=""></h6>
          <p>地址：台北市信義路三段153號10樓<br>電話：02-5420-2541</p>
        </div>


        <div class="adress2">
          <a href="https://www.google.com.tw/maps/place/408%E5%8F%B0%E4%B8%AD%E5%B8%82%E5%8D%97%E5%B1%AF%E5%8D%80%E5%85%AC%E7%9B%8A%E8%B7%AF%E4%BA%8C%E6%AE%B551%E8%99%9F18%E6%A8%93/@24.1505405,120.64845,17z/data=!3m1!4b1!4m6!3m5!1s0x34693d9650422ae1:0x6dc4009b03c630df!8m2!3d24.1505405!4d120.6510249!16s%2Fg%2F11llc61pjp?hl=zh-TW">
            <h6>台中門市
          </a><img src="imgs/front page-T/thin.svg" alt=""><img src="imgs/front page-I/p-fix.svg" alt=""></h6>
          <p>地址：台中市南屯區公益路二段51號18樓<br>電話：04-2490-5748</p>
          <a href="https://www.google.com.tw/maps/place/429%E5%8F%B0%E4%B8%AD%E5%B8%82%E7%A5%9E%E5%B2%A1%E5%8D%80%E7%A5%9E%E6%B8%85%E8%B7%AF163%E8%99%9F/@24.2678279,120.6530177,17z/data=!3m1!4b1!4m6!3m5!1s0x34691124df479e15:0x5fa1f4dd2f7c0991!8m2!3d24.2678279!4d120.6555926!16s%2Fg%2F11c28702xc?hl=zh-TW">
            <h6>台中門市</h6>
          </a>
          <p>地址：台中市神岡區神清路163號<br>電話：04-6690-5757</p>
        </div>

        <div class="adress3">
          <a href="https://www.google.com.tw/maps/place/701%E5%8F%B0%E5%8D%97%E5%B8%82%E6%9D%B1%E5%8D%80%E5%A4%A7%E5%AD%B8%E8%B7%AF%E4%B8%80%E8%99%9F%E9%9B%B2%E5%B9%B3%E5%A4%A7%E6%A8%93+(%E8%A1%8C%E6%94%BF%E5%A4%A7%E6%A8%93)/@22.9988343,120.2145319,17z/data=!3m1!4b1!4m6!3m5!1s0x346e76ed51854b2f:0xb78c6fafcc89141a!8m2!3d22.9988343!4d120.2171068!16s%2Fg%2F1q5bmzc75?hl=zh-TW"></a>
          <h6>台南門市<img src="imgs/front page-I/p-fix.svg" alt=""></h6>
          <p>地址：台南市東區大學路一號<br>電話：07-1454-7485</p>
          <a href="https://www.google.com.tw/maps/place/80147%E9%AB%98%E9%9B%84%E5%B8%82%E5%89%8D%E9%87%91%E5%8D%80%E4%B8%AD%E6%AD%A3%E5%9B%9B%E8%B7%AF211%E8%99%9F8%E8%99%9F%E6%A8%93%E4%B9%8B1/@22.6282249,120.2904633,17z/data=!3m1!4b1!4m6!3m5!1s0x346e047cb59c8831:0x1dab9ce1e55f8b32!8m2!3d22.6282249!4d120.2930382!16s%2Fg%2F11qp_gyvtz?hl=zh-TW"></a>
          <h6>高雄門市<img src="imgs/front page-T/thin.svg" alt=""></h6>
          <p>地址：高雄市中正四路211號8樓之1<br>電話：07-1114-7412</p>
        </div>


        <div class="adress4">
          <a href="https://www.google.com.tw/maps/place/970%E8%8A%B1%E8%93%AE%E7%B8%A3%E8%8A%B1%E8%93%AE%E5%B8%82%E8%A3%95%E7%A5%A5%E8%B7%AF89%E8%99%9F/@23.9974095,121.5967851,17z/data=!3m1!4b1!4m6!3m5!1s0x34689fb3641c7cdb:0x21e7455af5a5ff51!8m2!3d23.9974095!4d121.59936!16s%2Fg%2F11hkjfb_fs?hl=zh-TW">
            <h6>花蓮門市</h6>
          </a>
          <p>地址：花蓮縣花蓮市祥路89號<br>電話：03-2470-5998</p>
          <a href="https://www.google.com.tw/maps/place/971%E8%8A%B1%E8%93%AE%E7%B8%A3%E6%96%B0%E5%9F%8E%E9%84%89%E5%8A%A0%E7%81%A3/@24.0817763,121.6008143,15z/data=!3m1!4b1!4m6!3m5!1s0x34689d75fdea4583:0x651a01b4ae05f895!8m2!3d24.081777!4d121.611114!16s%2Fg%2F1tgjj0m9?hl=zh-TW">
            <h6>花蓮門市</h6>
          </a>
          <p>地址：花蓮縣新城鄉加灣號<br>電話：03-2210-4098</p>
        </div>

        <div class="maparea" id="leafletMap"></div>


      </div>
    </div>
</section>
<!-- nn-end -->



<?php include './parts/footer.php' ?>

<?php include './parts/scripts.php' ?>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

<!-- kk -->
  <!-- slick -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
 <!-- js link -->
<script src="./scripts/opening.js"></script>

  <!-- kk -->
<script>
// $(document).click(function(){
//   $(".pause").click(function(){
//     $(".hs-video").stop();
//   });
// });
// $('pause').click(function){
// $('hs-video')
// }


  // 建立 Leaflet 地圖
  const map = L.map("leafletMap");

  // 設定經緯度座標
  map.setView(new L.LatLng(25.0665409, 121.6081298), 5);

  // 設定圖資來源
  let osmUrl = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
  let osm = new L.TileLayer(osmUrl, {
    minZoom: 8,
    maxZoom: 16
  });
  map.addLayer(osm);
  // 設定地標
  const north1 = L.marker([25.0330088, 121.5738905]).addTo(map);
  north1
    .bindPopup(
      "<strong>信義門市</strong><br>台北市信義區信義路五段170號"
    )
    .openPopup();
  const north2 = L.marker([25.0337842, 121.5407118]).addTo(map);
  north2
    .bindPopup(
      "<strong>大安門市</strong><br>台北市復興南路一段390號2樓"
    )
    .openPopup();
  const north3 = L.marker([25.0346856, 121.5657473]).addTo(map);
  north3
    .bindPopup("<strong>信義門市</strong><br>台北市信義路三段153號10樓")
    .openPopup();
  const mid1 = L.marker([24.1505262, 120.6484334]).addTo(map);
  mid1
    .bindPopup("<strong>台中門市</strong><br>台中市南屯區公益路二段51號18樓")
    .openPopup();
  const mid2 = L.marker([24.2678279, 120.6530177]).addTo(map);
  mid2
    .bindPopup("<strong>台中門市</strong><br>台中市神岡區神清路163號")
    .openPopup();
  const south1 = L.marker([22.9988343, 120.2145319]).addTo(map);
  south1
    .bindPopup("<strong>台南門市</strong><br>台南市東區大學路一號")
    .openPopup();
  const south2 = L.marker([22.6282249, 120.2904633]).addTo(map);
  south2
    .bindPopup("<strong>高雄門市</strong><br>高雄市中正四路211號8樓之1")
    .openPopup();
  const east1 = L.marker([23.9974095, 121.5967851]).addTo(map);
  east1
    .bindPopup("<strong>花蓮門市</strong><br>花蓮縣花蓮市裕祥路89號")
    .openPopup();
  const east2 = L.marker([24.0568058, 121.599324]).addTo(map);
  east2
    .bindPopup("<strong>花蓮門市</strong><br>花蓮縣新城鄉加灣號")
    .openPopup();



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
    const movement = page * -200;
    $('.img-wrap').css('transform', `translateX(${movement}px)`)
    $('.slider-dots li').eq(page).css('background', '#fff').siblings().css('background', 'transparent')
  }

  $('.mid').click(function() {
    $('.adress').css('display', 'none')
    $('.adress2').css('display', 'block')
    $('.adress3').css('display', 'none')
    $('.adress4').css('display', 'none')
  })
  $('.north').click(function() {
    $('.adress2').css('display', 'none')
    $('.adress3').css('display', 'none')
    $('.adress4').css('display', 'none')
    $('.adress').css('display', 'block')

  })
  $('.south').click(function() {
    $('.adress2').css('display', 'none')
    $('.adress').css('display', 'none')
    $('.adress4').css('display', 'none')
    $('.adress3').css('display', 'block')

  })
  $('.east').click(function() {
    $('.adress2').css('display', 'none')
    $('.adress').css('display', 'none')
    $('.adress3').css('display', 'none')
    $('.adress4').css('display', 'block')

  })
</script>



<!--LeafletMap  -->
<!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script> -->