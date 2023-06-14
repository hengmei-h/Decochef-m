<?php
include './parts/db-connect.php';
// if(isset($_SESSION['user'])){
//   header("Location: index_.php");
//   exit;
// }
$title = '品味誌';
$pageName = 'lifeStyle';
?>

<?php include './parts/html_head.php'?>

<!-- css-link -->
<link rel="stylesheet" href="../Decochef/style/recipe-lifestyle.css">
<!-- slick -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />





<style> 
</style>
<?php include './parts/navbar.php'?>




<div class="wrapallsection  col">
    <!----- section1 ------->
    <section class="section1">
      <div class="wrapper white ">
        <div class="box1 ">
            <div class="box1text1"><h6 class="box1text1h6">藝術設計</h6></div>
            <img class="iconplay1" src="./imgs/recipe_icon/icon_play.svg" alt="">
        </div>
        <div class="box2">
            <div class="box2text1"><h6 class="box2text1h6">生活選物</h6></div>
            <img class="iconplay2" src="./imgs/recipe_icon/icon_play.svg" alt="">
        </div>
        <div class="box3">
            <div class="box3text1"><h6 class="box3text1h6">人氣美食</h6></div>
            <img class="iconplay3" src="./imgs/recipe_icon/icon_play.svg" alt="">
        </div>
        <div class="box4">
            <div class="box4text1"><h6 class="box4text1h6">藝術設計</h6></div>
            <img class="iconplay4" src="./imgs/recipe_icon/icon_play.svg" alt="">
        </div>
        <div class="box5">
            <div class="box5text1"><h6 class="box5text1h6">科技家電</h6></div>
            <img class="iconplay5" src="./imgs/recipe_icon/icon_play.svg" alt="">
        </div>
        <div class="box6">
            <div class="box6text1"><h6 class="box6text1h6">生活選物</h6></div>
            <img class="iconplay6" src="./imgs/recipe_icon/icon_play.svg" alt="">
        </div>
        <div class="box7">
            <div class="box7text1"><h6 class="box7text1h6">科技家電</h6></div>
            <img class="iconplay7" src="./imgs/recipe_icon/icon_play.svg" alt="">
        </div>
        <div class="box8">
          <div class="box8text1"><h6 class="box8text1h6">科技家電</h6></div>
          <img class="iconplay8" src="./imgs/recipe_icon/icon_play.svg" alt="">
        </div>
        <div class="box9">
          <div class="box9text1"> <h6 class="box9text1h6">藝術設計</h6></div>
          <img class="iconplay9" src="./imgs/recipe_icon/icon_play.svg" alt="">
        </div>
        <div class="box10">
          <div class="box10text1"> <h6 class="box10text1h6">生活選物</h6></div>
          <img class="iconplay10" src="./imgs/recipe_icon/icon_play.svg" alt="">
        </div>
        <div class="box11">
          <div class="box11text1"> <h6 class="box11text1h6">人氣美食</h6></div>
          <img class="iconplay11" src="./imgs/recipe_icon/icon_play.svg" alt="">
      </div>
    </div>
    </section>

  
  <!----- section2 ------->
      <section class="section2 primary">
        <div class="container">
          <div class="title white ">
              <h4>熱門食譜 Popular Recipes</h4>
              <p class="hr1"></p>               
          </div>
          <!-- recipe -->
        <div class="recipewrap">  
          <div class="slider">
  
              <div class="item">          
                <img class="recipeimg" src="./imgs/recipe_imgs/recipe_01.jpg" alt="">
                
              </div>

              <div class="item">
                <img class="recipeimg" src="./imgs/recipe_imgs/recipe_02.jpg" alt="">
        
              </div>
              <div class="item">
                
                <img class="recipeimg" src="./imgs/recipe_imgs/recipe_03.jpg" alt="">
              
              </div>
              <div class="item">
                
                <img class="recipeimg" src="./imgs/recipe_imgs/recipe_04.jpg" alt="">
              
              </div>
              <div class="item">
                
                <img class="recipeimg" src="./imgs/recipe_imgs/recipe_05.jpg" alt="">
              
              </div>
              <div class="item">
                
                <img class="recipeimg" src="./imgs/recipe_imgs/recipe_06.jpg" alt="">
              
              </div>
              <div class="item">
                
                <img class="recipeimg" src="./imgs/recipe_imgs/recipe_07.jpg" alt="">
                
              </div>
              <div class="item">
          
                <img class="recipeimg" src="./imgs/recipe_imgs/recipe_08.jpg" alt="">
        
              </div>
              <div class="item">
              
                <img class="recipeimg" src="./imgs/recipe_imgs/recipe_09.jpg" alt="">
              
              </div>

              <div class="item">
                
                <img class="recipeimg" src="./imgs/recipe_imgs/recipe_10.jpg" alt="">
            
              </div>
              <div class="item">
            
                <img class="recipeimg" src="./imgs/recipe_imgs/recipe_11.jpg" alt="">
          
              </div>
              
            
          </div>

          <div class="item-intro white">
            <h5>看食譜找靈感！</h5>
            <p class="pl">料理是一件幸福的事，分享食譜則是分享幸福給更多的人。你可以尋找喜愛的食譜，也可以驕傲分享自己的食譜!</p>
            <div class="btn4  recipebtn"> <a href="./recipe-main.php" target="_blank" class="recipeabtn"> 前往搜尋</a></div>
          </div>

        </div>
        </div>


      </section>

  <!----- section3 ------->  
      <section class="section3">

          <div class="title black">
              <h4>最多人閱讀 Most Popular</h4>
              <p class="hr2"></p>                       
          </div>
          <!-- cards -->
          <div class="carousel">
          <div class="carousel-inner ">
              <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
          <!--page1-->
              <div class="carousel-item">
                  <div class="cardpopularall">
                      <div class="cardpopular1  row">
                        <div class="number1 secondary-dark white">
                          <h3>1</h3>
                        </div>
                        <div class="cardpopular2 primary row">
                          <div class="pic1">
                            <img class="cardpopularimg" src="./imgs/recipe_imgs/mostpopular_01.png" alt="">
                          </div>
                          <div class="text1 white">
                            <h6>領養不棄養！4個浪浪故事!</h6>
                            <div class="btnpopular"><p>生活選物</p></div>
                          </div>
                        </div>

                      
                      </div>

                      <div class="cardpopular1  row">
                        <div class="number1 secondary-dark white">
                          <h3>2</h3>
                        </div>
                        <div class="cardpopular2 primary row">
                          <div class="pic1">
                            <img class="cardpopularimg" src="./imgs/recipe_imgs/mostpopular_02.png" alt="">
                          </div>
                          <div class="text1 white">
                            <h6>藍染魅力！6間藍染療癒!</h6>
                            <div class="btnpopular"><p>藝術設計</p></div>
                          </div>
                        </div>
                  
                      </div>

                      <div class="cardpopular1  row">
                        <div class="number1 secondary-dark white">
                          <h3>3</h3>
                        </div>
                        <div class="cardpopular2 primary row">
                          <div class="pic1">
                            <img class="cardpopularimg" src="./imgs/recipe_imgs/mostpopular_03.png" alt="">
                          </div>
                          <div class="text1 white">
                            <h6>Hong Kong！3種新玩法!</h6>
                            <div class="btnpopular"><p>人氣美食</p></div>
                          </div>
                        </div>
                        
                      </div>
            

            
                    </div>
              </div>
              <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
          <!--page2-->
              <div class="carousel-item">
                  <div class="cardpopularall col">
                      <div class="cardpopular1  row">
                        <div class="number1 secondary-dark white">
                          <h3>4</h3>
                        </div>
                        <div class="cardpopular2 primary row">
                          <div class="pic1">
                            <img class="cardpopularimg" src="./imgs/recipe_imgs/mostpopular_04.png" alt="">
                          </div>
                          <div class="text1 white">
                            <h6>露營新手！必備總整理!</h6>
                            <div class="btnpopular"><p>生活選物</p></div>
                          </div>
                        </div>

                        
                      </div>

                      <div class="cardpopular1 row">
                        <div class="number1 secondary-dark white">
                          <h3>5</h3>
                        </div>
                        <div class="cardpopular2 primary row">
                          <div class="pic1">
                            <img class="cardpopularimg" src="./imgs/recipe_imgs/mostpopular_05.png" alt="">
                          </div>
                          <div class="text1 white">
                            <h6>House音樂！一次搞清!</h6>
                            <div class="btnpopular"><p>藝術設計</p></div>
                          </div>
                        </div>

                      </div>

                      <div class="cardpopular1 row">
                        <div class="number1 secondary-dark white">
                          <h3>6</h3>
                        </div>
                        <div class="cardpopular2 primary row">
                          <div class="pic1">
                            <img class="cardpopularimg" src="./imgs/recipe_imgs/mostpopular_06.png" alt="">
                          </div>
                          <div class="text1 white">
                            <h6>法式甜點禮盒！精選20 款！</h6>
                            <div class="btnpopular"><p>人氣美食</p></div>
                          </div>
                        </div>

                        
                      </div>
            

            
                    </div>
              </div>
              <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
          <!--page3-->
              <div class="carousel-item">
                  <div class="cardpopularall col">
                      <div class="cardpopular1 row">
                        <div class="number1 secondary-dark white">
                          <h3>7</h3>
                        </div>
                        <div class="cardpopular2 primary row">
                          <div class="pic1">
                            <img class="cardpopularimg" src="./imgs/recipe_imgs/mostpopular_07.png" alt="">
                          </div>
                          <div class="text1 white">
                            <h6> 15 款雨衣推薦！舒適有型!</h6>
                            <div class="btnpopular"><p>生活選物</p></div>
                          </div>
                        </div>
                        
                      </div>

                      <div class="cardpopular1 row">
                        <div class="number1 secondary-dark white">
                          <h3>8</h3>
                        </div>
                        <div class="cardpopular2 primary row">
                          <div class="pic1">
                            <img class="cardpopularimg" src="./imgs/recipe_imgs/mostpopular_08.png" alt="">
                          </div>
                          <div class="text1 white">
                            <h6>日本東京夜幕攝影！捕捉霓光!</h6>
                            <div class="btnpopular"><p>藝術設計</p></div>
                          </div>
                        </div>
                        
                      </div>

                      <div class="cardpopular1 row">
                        <div class="number1 secondary-dark white">
                          <h3>9</h3>
                        </div>
                        <div class="cardpopular2 primary row">
                          <div class="pic1">
                            <img class="cardpopularimg" src="./imgs/recipe_imgs/mostpopular_09.png" alt="">
                          </div>
                          <div class="text1 white">
                            <h6>草莓蛋糕！甜又酸讓人受不了！</h6>
                            <div class="btnpopular"><p>人氣美食</p></div>
                          </div>
                        </div>
                        
                      </div>

            

            
                    </div>
              </div>
              <div class="container"><p class="hrbottom"></p>   </div>    
          <!--dot-->
              <ol class="carousel-indicators">
                  <li>
                      <label for="carousel-1" class="carousel-bullet"></label>
                  </li>
                  <li>
                      <label for="carousel-2" class="carousel-bullet"></label>
                  </li>
                  <li>
                      <label for="carousel-3" class="carousel-bullet"></label>
                  </li>
              </ol>

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
                  
                            <h5 class="ar-label">精選文章</h5>
                        
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






  <!----- section5 ------->
  <section class="section5">
    <!-- <div class="container">
      <div class="title black">
          <h4>異業結合</h4>
          <p class="hr4"></p>               
      </div> -->
    <!-- adcarousel -->
      <div class="adbox">
      <!-- Panels -->
        <div class="swipe">
        
          <div class="panel">
          <a href="https://icook.tw/" target="_blank">
          <img class="adboximg" src="./imgs/recipe_imgs/adbox_01.jpg" alt="123">
          </a></div>
          <div class="panel">
          <a href="https://icook.tw/" target="_blank">
          <img class="adboximg" src="./imgs/recipe_imgs/adbox_02.png" alt="">
          </a></div>
          <div class="panel">
          <a href="https://icook.tw/" target="_blank">
          <img class="adboximg" src="./imgs/recipe_imgs/adbox_03.png" alt="">
          </a></div>
          <div class="panel">
          <a href="https://icook.tw/" target="_blank">
          <img class="adboximg" src="./imgs/recipe_imgs/adbox_04.png" alt="">
          </a></div>
          <div class="panel">
          <a href="https://icook.tw/" target="_blank">
          <img class="adboximg" src="./imgs/recipe_imgs/adbox_05.png" alt="">
          </a></div>
        </div>
      <!-- btn -->
        <div class="info">
          <div class="inner">
          </div>
          <div class="buttons row">
            <button class="btn-prev" disabled>&larr;</button>
            <button class="btn-next">&rarr;</button>
          </div>
        </div>
    </div>
    </div>
  </section>



</div>












<?php include './parts/footer.php'?>

<?php include './parts/scripts.php'?>

<!-- slick -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
 <!-- js link -->
<script src="./scripts/recipe-lifestyle.js"></script>

<?php include './parts/html_foot.php'?>