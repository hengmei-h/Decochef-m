<?php
include './parts/db-connect.php';
// if(isset($_SESSION['user'])){
//   header("Location: index_.php");
//   exit;
// }
$title = '食譜';
$pageName = 'Recipe';



$c_sql = "SELECT * FROM category WHERE sid>=1 AND sid<=3"; #=限定
$cates = $pdo->query($c_sql)->fetchAll();


$t_sql = "SELECT * FROM `recipe_types`";
$types = $pdo->query($t_sql)->fetchAll(); 

$r_sql = "SELECT * FROM `recipe_list` WHERE `category_id`=1 AND `type`=1"; #第一項第一種 /從資料庫裡面sql裡面拿
$recipes = $pdo->query($r_sql)->fetchAll();

// print_r($recipes);
// exit;


?>
<?php include './parts/html_head.php'?>

<!-- css-link -->
<link rel="stylesheet" href="../Decochef/style/recipe-main.css">
<!-- slick -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />



<style> 
</style>
<?php include './parts/navbar.php'?>



<div class="wrapallsection  col">
      <!----- section1 ------->
          <section class="section1">
            <div class="recipemainpic">
      
              <!-- box1 -->
                <div class="recipemain-intro white container">
                  <h3>Recipe</h3>
                  <h5>食譜分享</h5>
                  <p class="pm">精選的文章，尋找你的生活靈感！</p>
                </div>
      
              <!-- box2 -->
                <div class="rwd_slider_container_wrapper">
                  <div class="rwd_slider_container">
                    <div class="slider_container" >
                      <div>
                        <img class="re-sliderimg" src="./imgs/recipe_imgs/recipemain_01.png" />
                      </div>
                      <div>
                        <img class="re-sliderimg" src="./imgs/recipe_imgs/recipemain_02.png"  />
                      </div>
                      <div>
                        <img class="re-sliderimg" src="./imgs/recipe_imgs/recipemain_03.png"/>
                      </div>
                      <div>
                        <img class="re-sliderimg" src="./imgs/recipe_imgs/recipemain_04.png"  />
                      </div>
                      <div>
                        <img class="re-sliderimg" src="./imgs/recipe_imgs/recipemain_05.png" />
                      </div>
                    </div><!-- end of .pure_slider_container -->
                  </div><!-- end of .embed-responsive -->
                </div><!-- end of .embed-responsive-box -->
      
      
            </div>
      
    
      
      
      
          </section>
      
      
              <section class="section2-4cover">
                  
                <!----- section2 ------->
                    <section class="section2">
                        
                          <!-- recipe -->
                        <div id="tab-recipecardlarge" class="recipebox">  


                          <!-- tab large -->
                          <div class="recipemenu container">
                              <div class="menubtn-l">
                                <ul class="row tab-title-recipecardlarge">
                                  <div class="menubtn secondary-light white" data-val="1">
                                    <li>
              
        
                                      <label class="menulabel" for=""><img class="menuimg1" src="./imgs/product_icon/property= product,status=air fryer.png" alt=""><h6> 氣炸鍋</h6></label>

                                    </li>
                                  </div>
                                  <div class="menubtn secondary-light white" data-val="2">
                                    <li>

                                      <label class="menulabel" for=""><img class="menuimg2" src="./imgs/product_icon/property= product,status=electric griddle.png" alt=""><h6>電烤盤</h6></label> 
      
                              
                                    </li>
                                  </div>
                                  <div class="menubtn secondary-light white" data-val="4">
                                    <li>
                                        <label class="menulabel" for=""><img class="menuimg3" src="./imgs/product_icon/property= product,status=oven.png" alt=""><h6>烤箱</h6></label> 
 
                                    </li>
                                  </div>
                                </ul>
                              </div>
                          </div>

                      <!-- page1  -->
                          <div id="relg-tab01" class="relg-tab-inner">                       
                              <!-- tab small -->
                              <div id="tab-recipecard">
                                <div class="menubtn-m">
                                  <ul class="row tab-title-recipecard">
                                        <li class="recipestyle" data-val="1">

                                            <label class="recipestylelabel" for=""><h5 class="recipelabelh5">日式</h5></label>    
                                                    
                                        </li>
                                        <li class="recipestyle" data-val="2">
                                    
                                            <label class="recipestylelabel" for=""><h5 class="recipelabelh5">美式</h5></label>
                                        
                                        </li>
                                        <li class="recipestyle" data-val="3">
                                
                                            <label class="recipestylelabel" for=""><h5 class="recipelabelh5">台式</h5></label>
                                    
                                        </li>
                                        <li class="recipestyle" data-val="4">
                                     
                                            <label class="recipestylelabel" for=""><h5 class="recipelabelh5">歐式</h5></label>
                                  
                                        </li>
                                  </ul>
                                </div>

                            <!-- cards -->
                                <div class="recipecardsall primary">
                                    <div class="container">
                                      <!--page1-->
                                      <div id="card-list" class="re-tab-inner cardwrapper">


                                    </div>
                                </div>
                              </div>
                          </div>



                      
        
        
                    </section>
        
                <!----- section3 ------->  
                    <section class="section3">
                      <div class="container">
                        <div class="title black">
                            <h4>最熱門 Most Popular</h4>
                            <p  class="hr2"></p>                 
                        </div>

                        <!-- cards -->
                        <div class="pagecover">
                          <div class="page-content ">
                            <div class="card">
                                <div class="content">
                                    <h3 class="title-h3content">日式食堂炸蝦</h3>
                                    <p class="copy">想吃炸蝦又不想油炸？用點小方法即可烤出美味!
                                    </p><button class="btn">前往食譜</button>
                                </div>
                            </div>
                            <div class="card">
                                <div class="content">
                                  <h3 class="title-h3content">台式炸雞腿飯</h3>
                                  <p class="copy">香酥外皮多汁的台式炸雞腿！撒ㄧ點胡椒鹽更是美味!</p><button class="btn">前往食譜</button>
                                </div>
                            </div>
                            <div class="card">
                                <div class="content">
                                  <h3 class="title-h3content">美式焦糖肉桂捲</h3>
                                  <p class="copy">不甜膩香濃肉桂味的內餡，一點都不困難!</p><button class="btn">前往食譜</button>
                                </div>
                            </div>
                            <div class="card">
                                <div class="content">
                                  <h3 class="title-h3content">歐式核桃麵包</h3>
                                  <p class="copy">簡單的免揉歐式麵包，製作時間5-10分鐘! </p><button class="btn">前往食譜</button>
                                </div>
                            </div>
                        </div>
                  
                        </div>
        
                      </div>
                    </section>
        
        
                <!----- section4 ------->
                    <section class="section4">
                        <div class="container">
                            <div class="title black">
                                <h4>文章列表 Article List</h4>
                                <p  class="hr3"></p>               
                            </div>

                            
                            <!-- list -->
                            <div class="articlelist" id="tab-articlelist">
                              <ul class=" container tab-title-articlelist">

                                      <li class="listyle" id="listyle-0" onclick="changeListyle(event)">
                      
                                          <h5 class="ar-label">你可能喜歡</h5>
                                      
                                      </li>
                                      <li class="listyle" id="listyle-1" onclick="changeListyle(event)">
                                          
                                          <h5 class="ar-label">其他人都在看</h5>
                                  
                                      </li>
                    
                      
                                      <li class="listyle" id="listyle-2" onclick="changeListyle(event)">
                                
                                          <h5 class="ar-label">推薦給你</h5>
                                      
                                      </li>
                                      <li class="listyle" id="listyle-3" onclick="changeListyle(event)">
                              
                                          <h5 class="ar-label">建議收藏</h5>
                                    
                                      </li>

                              </ul>
                            </div>



                              <div class="ar-panels">
                                    <div class="arpanelsData" style="display: flex;">
                                            <!-- page1 -->
                                            <div id="ar-tab01" class="articleboxall container col ar-tab-inner">
                                              <div class="articlebox container col">
                                                  <div class="articlebox1 row">
                                                      <div class="articlepic">
                                                        <img class="articleimg" src="./imgs/recipe_imgs/articlelist_01.png" alt="">
                                                      </div>
                                                      <div class="articletext">
                                                        <h4 class="articleh4">領養不棄養：4個溫暖人心的浪浪故事!</h4>
                                                        <p class="articlep">2013 年，電影《十二夜》在大螢幕上揭開了動物收容所每天的真實日常。紀錄片記錄著收容所內發生的無奈事實：所有關進收容所的動物，如果在 12 天內沒有被領養，生命就只能開始倒數。</p>
                                                      </div>
                                                      <div class="articleiconsall col">
                                                          <div class="articleicon1"><img class="articleicon_save" src="./imgs/recipe_icon/icons_save.svg" alt=""></div>
                                                          <div class="articleicon2"><img class="articleicon_collect " src="./imgs/recipe_icon/icon_allinone.svg" alt=""></div>
                                                      </div>

                                                  </div>
                                              </div>
                                              <div class="articlebox container col">
                                                <div class="articlebox1 row">
                                                    <div class="articlepic">
                                                      <img class="articleimg" src="./imgs/recipe_imgs/articlelist_02.png" alt="">
                                                    </div>
                                                    <div class="articletext">
                                                      <h4 class="articleh4">6 間藍染推薦，用溫柔的藍療癒心情!</h4>
                                                      <p class="articlep">天然藍染是一種傳承古老智慧的技術。不同文化中迥異的藍染植物，皆能轉化為特性不同的靛藍染料，製作出優美的藍染作品。</p>
                                                    </div>
                                                    <div class="articleiconsall col">
                                                      <div class="articleicon1"><img class="articleicon_save" src="./imgs/recipe_icon/icons_save.svg" alt=""></div>
                                                    <div class="articleicon2"><img class="articleicon_collect " src="./imgs/recipe_icon/icon_allinone.svg" alt=""></div>
                                                    </div>

                                                </div>
                                              </div>
                                              <div class="articlebox container col">
                                                  <div class="articlebox1 row">
                                                    <div class="articlepic">
                                                    <img class="articleimg" src="./imgs/recipe_imgs/articlelist_03.png" alt="">
                                                    </div>
                                                    <div class="articletext">
                                                      <h4 class="articleh4"> Hello Hong Kong！3種新玩法給你全新體驗！</h4>
                                                      <p class="articlep">香港是真的到處都好玩!身懷一顆富冒險家精神！打卡拍照的特色景點！故宮、Ｍ＋、維多利亞港等，香港的超新星級著名旅遊大點！連風靡全球的巨星都在這些香港的國際性旅遊勝地!</p>
                                                    </div>
                                                    <div class="articleiconsall col">
                                                    <div class="articleicon1"><img class="articleicon_save" src="./imgs/recipe_icon/icons_save.svg" alt=""></div>
                                                    <div class="articleicon2"><img class="articleicon_collect " src="./imgs/recipe_icon/icon_allinone.svg" alt=""></div>
                                                    </div>

                                                  </div>
                                              </div>
                                            </div>

                                            <!-- page2 -->
                                            <div id="ar-tab02" class="articleboxall container col ar-tab-inner">
                                              <div class="articlebox container col">
                                                <div class="articlebox1 row">
                                                  <div class="articlepic">
                                                  <img class="articleimg" src="./imgs/recipe_imgs/articlelist_04.png" alt="">
                                                  </div>
                                                  <div class="articletext">
                                                  <h4 class="articleh4">麻將規則、麻將花色及算台方式一次搞懂！</h4>
                                                  <p class="articlep">麻將對華人而言，可說是最普遍的全民娛樂了，但對不懂麻將的人來說，光是認牌就需要花費不少功夫，看似艱澀難懂的麻將規則更是令人卻步！</p>
                                                  </div>
                                                  <div class="articleiconsall col">
                                                  <div class="articleicon1"><img class="articleicon_save" src="./imgs/recipe_icon/icons_save.svg" alt=""></div>
                                                  <div class="articleicon2"><img class="articleicon_collect " src="./imgs/recipe_icon/icon_allinone.svg" alt=""></div>
                                                  </div>

                                                  </div>
                                              </div>
                                              <div class="articlebox container col">
                                                <div class="articlebox1 row">
                                                  <div class="articlepic">
                                                  <img class="articleimg" src="./imgs/recipe_imgs/articlelist_05.png" alt="">
                                                  </div>
                                                  <div class="articletext">
                                                  <h4 class="articleh4">這才是12星座真相！「月亮星座」揭開所有內心秘密!</h4>
                                                  <p class="articlep">月亮星座和我們常看的太陽星座不一樣，月亮星座主要是掌管我們內心的情緒、安全感和潛意識，來看看，自己是哪個月亮星座，和各個月亮星座的特質哦！</p>
                                                  </div>
                                                  <div class="articleiconsall col">
                                                  <div class="articleicon1"><img class="articleicon_save" src="./imgs/recipe_icon/icons_save.svg" alt=""></div>
                                                  <div class="articleicon2"><img class="articleicon_collect " src="./imgs/recipe_icon/icon_allinone.svg" alt=""></div>
                                                    </div>

                                                  </div>
                                              </div>
                                              <div class="articlebox container col">
                                                <div class="articlebox1 row">
                                                  <div class="articlepic">
                                                  <img class="articleimg" src="./imgs/recipe_imgs/articlelist_06.png" alt="">
                                                  </div>
                                                  <div class="articletext">
                                                  <h4 class="articleh4">必收!20個情侶耍廢行程攻略！</h4>
                                                  <p class="articlep">情侶耍廢不是罪！想和另一半甜甜蜜蜜約會，但又懶得規劃行程，只想輕鬆又浪漫地度過假日悠閒時光嗎？Pinkoi 整理了20個室內、室外情侶耍廢行程懶人包！</p>
                                                  </div>
                                                  <div class="articleiconsall col">
                                                  <div class="articleicon1"><img class="articleicon_save" src="./imgs/recipe_icon/icons_save.svg" alt=""></div>
                                                  <div class="articleicon2"><img class="articleicon_collect " src="./imgs/recipe_icon/icon_allinone.svg" alt=""></div>
                                                  </div>

                                                  </div>
                                              </div>
                                            </div>

                                            <!-- page3 -->
                                            <div id="ar-tab03" class="articleboxall container col ar-tab-inner">
                                              <div class="articlebox container col">
                                                <div class="articlebox1 row">
                                                  <div class="articlepic">
                                                  <img class="articleimg" src="./imgs/recipe_imgs/articlelist_07.png" alt="">
                                                  </div>
                                                  <div class="articletext">
                                                  <h4 class="articleh4">「買」出綠色生活！365days綠色生活圖鑑!</h4>
                                                  <p class="articlep">「環保」、「永續」是現代人從小就被灌輸的基本常識，它的必要性已是毋庸置疑且超越國界的。但是，除了日常的垃圾分類，我們還能如何去回應這個看似巨大的課題？</p>
                                                  </div>
                                                  <div class="articleiconsall col">
                                                  <div class="articleicon1"><img class="articleicon_save" src="./imgs/recipe_icon/icons_save.svg" alt=""></div>
                                                  <div class="articleicon2"><img class="articleicon_collect " src="./imgs/recipe_icon/icon_allinone.svg" alt=""></div>
                                                  </div>

                                                  </div>
                                              </div>
                                              <div class="articlebox container col">
                                                <div class="articlebox1 row">
                                                  <div class="articlepic">
                                                  <img class="articleimg" src="./imgs/recipe_imgs/articlelist_08.png" alt="">
                                                  </div>
                                                  <div class="articletext">
                                                  <h4 class="articleh4">跳繩好處有哪些？一篇了解跳繩優點、技巧和注意事項!</h4>
                                                  <p class="articlep"> 跳繩是小時候體育課、下課常做的運動，但長大後，大多數人會選擇跑步、瑜珈或健身，來維持身體健康機能。不過，其實跳繩好處非常多，有助於高效燃脂，同時也是器材簡易、方便攜帶，隨時隨地都能做的有氧運動。</p>
                                                  </div>
                                                  <div class="articleiconsall col">
                                                  <div class="articleicon1"><img class="articleicon_save" src="./imgs/recipe_icon/icons_save.svg" alt=""></div>
                                                  <div class="articleicon2"><img class="articleicon_collect " src="./imgs/recipe_icon/icon_allinone.svg" alt=""></div>
                                                    </div>

                                                  </div>
                                              </div>
                                              <div class="articlebox container col">
                                                <div class="articlebox1 row">
                                                  <div class="articlepic">
                                                  <img class="articleimg" src="./imgs/recipe_imgs/articlelist_09.jpg" alt="">
                                                  </div>
                                                  <div class="articletext">
                                                  <h4 class="articleh4"> 以溫度物件傳承文化技藝，打造你的專屬生活味!</h4>
                                                  <p class="articlep">生活在水泥叢林之中，你還記得與自然之間的連結嗎？透過由國立台灣工藝研究發展中心「台灣綠工藝品牌」的多項工藝設計品中體現生活的溫度，跟著源於大地的工藝走入日常。</p>
                                                  </div>
                                                  <div class="articleiconsall col">
                                                  <div class="articleicon1"><img class="articleicon_save" src="./imgs/recipe_icon/icons_save.svg" alt=""></div>
                                                  <div class="articleicon2"><img class="articleicon_collect " src="./imgs/recipe_icon/icon_allinone.svg" alt=""></div>
                                                  </div>

                                                  </div>
                                              </div>
                                            </div>

                                            <!-- page4 -->
                                            <div id="ar-tab04" class="articleboxall container col ar-tab-inner">
                                                  <div class="articlebox container col">
                                                      <div class="articlebox1 row">
                                                          <div class="articlepic">
                                                            <img class="articleimg" src="./imgs/recipe_imgs/articlelist_10.png" alt="">
                                                          </div>
                                                          <div class="articletext">
                                                            <h4 class="articleh4">環保無毒耐用款，你的專屬瑜珈夥伴!</h4>
                                                            <p class="articlep">下定決心要練瑜珈、找回身心平衡，但瑜珈墊百百種，該如何挑選適合自己的瑜珈墊呢？本文提供你瑜珈墊挑選攻略，認識不同瑜珈墊材質特性，以及厚度選購原則！</p>
                                                          </div>
                                                          <div class="articleiconsall col">
                                                            <div class="articleicon1"><img class="articleicon_save" src="./imgs/recipe_icon/icons_save.svg" alt=""></div>
                                                            <div class="articleicon2"><img class="articleicon_collect " src="./imgs/recipe_icon/icon_allinone.svg" alt=""></div>
                                                          </div>

                                                      </div>
                                                  </div>
                                                  <div class="articlebox container col">
                                                      <div class="articlebox1 row">
                                                          <div class="articlepic">
                                                            <img class="articleimg" src="./imgs/recipe_imgs/articlelist_11.png" alt="">
                                                          </div>
                                                          <div class="articletext">
                                                            <h4 class="articleh4">送給城市的一封情書，人們與紐約的偶然邂逅!</h4>
                                                            <p class="articlep"> 有些「美」無需刻意鋪墊，剎那的巧合即是永恆。紐約街拍攝影師 Jonathan Higbee 透過照片告訴我們，影像沒有絕對正確的時間、地點，透過敏銳的直覺、隨機的巧妙記錄下美好的時刻，讓整座城市富含了詩意和幽默的色彩。</p>
                                                          </div>
                                                          <div class="articleiconsall col">
                                                            <div class="articleicon1"><img class="articleicon_save" src="./imgs/recipe_icon/icons_save.svg" alt=""></div>
                                                            <div class="articleicon2"><img class="articleicon_collect " src="./imgs/recipe_icon/icon_allinone.svg" alt=""></div>
                                                          </div>

                                                      </div>
                                                  </div>
                                                  <div class="articlebox container col">
                                                      <div class="articlebox1 row">
                                                          <div class="articlepic">
                                                            <img class="articleimg" src="./imgs/recipe_imgs/articlelist_12.png" alt="">
                                                          </div>
                                                          <div class="articletext">
                                                            <h4 class="articleh4">「台」味歌曲，獨立音樂的本土意識尋根!</h4>
                                                            <p class="articlep">近年來台灣獨立音樂盛行，從草東沒有派對「爆冷門」的在2017年金曲獎上打敗五月天獲得最佳樂團獎後，許多人這才關注。</p>
                                                          </div>
                                                          <div class="articleiconsall col">
                                                            <div class="articleicon1"><img class="articleicon_save" src="./imgs/recipe_icon/icons_save.svg" alt=""></div>
                                                              <div class="articleicon2"><img class="articleicon_collect " src="./imgs/recipe_icon/icon_allinone.svg" alt=""></div>
                                                          </div>
                                                      </div>
                                                  </div>
                                            </div>
                                    </div>
                              </div>
                        </div>
                    </section>

              </section>
      
      
</div>








      <?php include './parts/footer.php'?>

<?php include './parts/scripts.php'?>

<!-- slick -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<!-- js link -->
<script src="../Decochef/scripts/recipe-main.js"></script>

<script>
  const card_list = $('#card-list');
  let cateBtnVal = 1;
  let typeBtnVal = 1;

  //menubtn
const menubtns = $('.menubtn');
const recipestyles = $('.recipestyle');

recipestyles.click(function(){
    recipestyles.removeClass('active');
    $(this).addClass('active');
    typeBtnVal = $(this).attr('data-val');
    getRecipeList();
  });

menubtns.click(function(){
  menubtns.removeClass('active');
  $(this).addClass('active');
  cateBtnVal = $(this).attr('data-val');
  recipestyles.eq(0).click();
});
menubtns.eq(0).click(); 



  //recipestylelabel




  // recipestyles.eq(0).click();

  function getRecipeList(){
    console.log({cateBtnVal, typeBtnVal})

    fetch(`recipe-main-cards.php?cate=${cateBtnVal}&type=${typeBtnVal}`)
    .then(r=>r.text())
    .then(txt=>{
      card_list.html(txt);
      
    })

  }








</script>





<?php include './parts/html_foot.php'?>