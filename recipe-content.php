<?php
include './parts/db-connect.php';
// if(isset($_SESSION['user'])){
//   header("Location: index_.php");
//   exit;
// }



$st_sql = "SELECT * FROM `recipe_steps`"; 
$steps = $pdo->query($st_sql)->fetchAll();


?>

<?php include './parts/html_head.php'?>

<!-- css-link -->
<link rel="stylesheet" href="./style/recipe-content.css">
<!-- slick -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />


<style> 
</style>
<?php include './parts/navbar.php'?>



<div class="wrapallsection  col">
    <!----- section1 ------->
    
    
        <section class="section1">
    <!-- block1 -->
          <div class="recipeblock1">
            <div class="recipemainpic">
              <!-- box2 -->
              <div class="rerwd_slider_container_wrapper">
                <div class="rerwd_slider_container">
                  <div class="reslider_container" >
                    <div>
                      <img class="rere-sliderimg" src="./imgs/recipe_imgs/recipe-content-01.png" />
                    </div>
                    <div>
                      <img class="rere-sliderimg" src="./imgs/recipe_imgs/recipe-content-02.png"  />
                    </div>
                    <div>
                      <img class="rere-sliderimg" src="./imgs/recipe_imgs/recipe-content-03.png"/>
                    </div>
                    <div>
                      <img class="rere-sliderimg" src="./imgs/recipe_imgs/recipe-content-04.png"  />
                    </div>
                    <div>
                      <img class="rere-sliderimg" src="./imgs/recipe_imgs/recipe-content-05.png" />
                    </div>
                  </div><!-- end of .pure_slider_container -->
                </div><!-- end of .embed-responsive -->
              </div><!-- end of .embed-responsive-box -->
            </div>
          </div>



    
    <!-- block2 -->
    
          <div class="recipeblock2">
            <div class="recipemainvedio">
              <iframe src="./imgs/recipe_imgs/recipe_video.mp4" frameborder="0" class="iframe-style" sandbox=""></iframe>
            </div>
            <div class="recipemainintro container primary white">
              <div>
                <img class="recipemainicon" src="./imgs/recipe_icon/icons_save_3.svg" alt="">
              </div>
              <h3>日式氣炸鮪⿂可樂餅</h3>
              <h5>香酥味濃的可樂餅可是日本的經典家常菜之一
                混合著新東陽鮪魚罐頭、靈魂馬鈴薯
                豐滿的口感，夾層流淌著多汁的餡料
                滿足正餐或是餐間的口腹之慾。
                </h5>
            </div>
          </div>
    
         
        </section>
    
      
    <!----- section2 ------->
        <section class="section2-w">
              <!-- btn -->
              <div class="recipepreparebtn-w container">
                <ul class="row">
                      <li class="recipetype-w" id="tabbtnw-0" onclick="changeListyle(event)">
                      <h5 class="recipetypeh5-w">準備</h5>
                      </li>
                      <li class="recipetype-w" id="tabbtnw-1"
                      onclick="changeListyle(event)">
                      <h5 class="recipetypeh5-w">食材</h5>   
                      </li>
                      <li class="recipetype-w" id="tabbtnw-2"
                      onclick="changeListyle(event)">
                      <h5 class="recipetypeh5-w">調味料</h5>  
                      </li>
                </ul>
              </div>
              <!-- content -->
              <div class="recipepreparecontent-w container">
                <div class="recipepreparecontentData-w contentboxall-w" style="display: flex;">
          
            
                      <div id="re-tab01-w" class="contentbox1-w content-w primary white">
                          <h3>份量 <span class="spanstyle1">2人份</span></h3>
                          <h3>時間 <span class="spanstyle1">45分鐘</span></h3>
                      </div>


                      <div id="re-tab02-w" class="contentbox2-w content-w primary white">
                      <h3>食材</h3>
                      <h5>鮪⿂1罐、⾺鈴薯600g、⾺鈴薯600g、麵粉酌量、 <br> 雞蛋2顆、⽟⽶粒2⼤匙、洋蔥丁1/4顆</h5>
                      </div>
                      
                      
                      <div id="re-tab03-w" class="contentbox3-w content-w primary white">
                        <h5>調味料</h5>
                        <h5>⿊胡椒20g</h5>
                        <h5>海鹽20g</h5>
                      </div>


                    
                
                </div>
                  
              </div>
      


            
        
        </section>
    
        <section class="section2-m">
          <!-- btn -->
          <div class="recipepreparebtn-m container">
            <ul class="row">
                  <li class="recipetype-m" id="tabbtnm-0" onclick="changeListyle(event)">
                  <h5 class="recipetypeh5-m">準備</h5>
                  </li>
                  <li class="recipetype-m" id="tabbtnm-1"
                  onclick="changeListyle(event)">
                  <h5 class="recipetypeh5-m">食材</h5>   
                  </li>
                  <li class="recipetype-m" id="tabbtnm-2"
                  onclick="changeListyle(event)">
                  <h5 class="recipetypeh5-m">調味料</h5>  
                  </li>
            </ul>
          </div>
          <!-- content -->
          <div class="recipepreparecontent-m container">
            <div class="recipepreparecontentData-m contentboxall-m" style="display: flex;">
      
        
                  <div id="re-tab01-m" class="contentbox1-m content-m primary white">
                      <h3>份量 <span class="spanstyle1">2人份</span></h3>
                      <h3>時間 <span class="spanstyle1">45分鐘</span></h3>
                  </div>


                  <div id="re-tab02-m" class="contentbox2-m content-m primary white">
                    <h5>食材</h5>
                    <h5>鮪⿂1罐</h5>
                    <h5>⾺鈴薯600g</h5>
                    <h5>麵粉酌量</h5>
                    <h5>麵包粉酌量</h5>
                    <h5> 雞蛋2顆</h5>
                    <h5>⽟⽶粒2⼤匙</h5>
                    <h5>洋蔥丁1/4顆</h5>
                  </div>
                  
                  
                  <div id="re-tab03-m" class="contentbox3-m content-m primary white">
                    <h5>調味料</h5>
                    <h5>⿊胡椒20g</h5>
                    <h5>海鹽20g</h5>
                  </div>


                
             
            </div>
              
          </div>
  


         
    
        </section>
    
    <!----- section3 ------->  
        <section class="section3-m">
            <!-- stepes -->
            <div class="cookstepsall-m">

              <div class="cookstep1-m">
                <div class="cookstep1number-m secondary-dark white">
                        <h3>1</h3>
                </div>
                <details class="resp-dropdown-m">

                  <summary class="summary-m" role="button">
                  <div class="cookstep1pic-m resp-button-m">
                      <img src="./imgs/recipe_imgs/1_001.jpg" alt="">
                    </div>  
                  </summary>

                  <div class="cookstep1text-m white resp-dropdown-content-m">
                      <h5 class="cookstep1texth5-m">1.將馬鈴薯蒸熟後打成泥，放涼備⽤。提⽰：能使⽤筷⼦嘗試，若能戳透即代表蒸熟。</h5>
                    </div>
                </details>


                    
              </div>

              <div class="cookstep2-m">
                <div class="cookstep1number-m secondary-dark white">
                    <h3>2</h3>
                </div>
                <details class="resp-dropdown-m">

                  <summary class="summary-m" role="button">
                    <div class="cookstep1pic-m resp-dropbtn-m">
                      <img src="./imgs/recipe_imgs/1_002.jpg" alt="">
                    </div>   
                  </summary>

                  <div class="cookstep1text-m white resp-dropdown-content-m">
                    <h5 class="cookstep1texth5-m">2.將鮪⿂、⽟⽶粒、洋蔥丁、⿊胡椒、鹽以無油⼩⽕拌炒至湯汁收乾。 提⽰：將鮪⿂罐頭瀝乾。</h5>
                  </div>
                </details>
              </div>

              <div class="cookstep3-m">
                <div class="cookstep1number-m secondary-dark white">
                      <h3>3</h3>
                </div>
                <details class="resp-dropdown-m">
                  <summary class="summary-m" role="button">
                    <div class="cookstep1pic-m resp-dropbtn-m">
                      <img src="./imgs/recipe_imgs/1_003.jpg" alt="">
                    </div>  
                  </summary>

                  <div class="cookstep1text-m white resp-dropdown-content-m">
                    <h5 class="cookstep1texth5-m">3.將餡料放入⾺鈴薯泥拌勻。</h5>
                  </div>
                </details>
              </div>

              <div class="cookstep4-m">
                <div class="cookstep1number-m secondary-dark white">
                      <h3>4</h3>
                </div>
                <details class="resp-dropdown-m">
                  <summary class="summary-m" role="button">
                    <div class="cookstep1pic-m resp-dropbtn-m">
                      <img src="./imgs/recipe_imgs/1_004.jpg" alt="">
                    </div>  
                  </summary>

                  <div class="cookstep1text-m white resp-dropdown-content-m">
                    <h5 class="cookstep1texth5-m">4.捏成圓形後靜置10分鐘。</h5>
                  </div>
                </details>
              </div>

              <div class="cookstep5-m">
                <div class="cookstep1number-m secondary-dark white">
                      <h3>5</h3>
                </div>
                <details class="resp-dropdown-m">
                  <summary class="summary-m" role="button">
                    <div class="cookstep1pic-m resp-dropbtn-m">
                      <img src="./imgs/recipe_imgs/1_005.jpg" alt="">
                    </div>  
                  </summary>

                  <div class="cookstep1text-m white resp-dropdown-content-m">
                    <h5 class="cookstep1texth5-m">5.按順序裹上麵粉、蛋液、麵包粉。</h5>
                  </div>
                </details>
              </div>

              <div class="cookstep6-m">
                <div class="cookstep1number-m secondary-dark white">
                      <h3>6</h3>
                </div>
                <details class="resp-dropdown-m">
                  <summary class="summary-m" role="button">
                    <div class="cookstep1pic-m resp-dropbtn-m">
                      <img src="./imgs/recipe_imgs/1_006.jpg" alt="">
                    </div> 
                  </summary>

                  <div class="cookstep1text-m white resp-dropdown-content-m">
                    <h5 class="cookstep1texth5-m">6.送入氣炸烤箱以180度烤15分鐘。</h5>
                  </div>
                </details>
              </div>
              

    
 
            </div>
        </section>


        <section class="section3-w ">
            <!-- stepes -->
            <div class="cookstepsall-w">

              <div class="cookstep1-w">
                <div class="cookstep1number-w secondary-dark white">
                    <h3>1</h3>
                </div>
                <div class="cookstep1pic-w">
                    <img src="./imgs/recipe_imgs/1_001.jpg" alt="">
                </div> 

                <div class="cookstep1text-w white">
                  <h5 class="cookstep1texth5-w">1.將馬鈴薯蒸熟後打成泥，放涼備⽤。提⽰：能使⽤筷⼦嘗試，若能戳透即代表蒸熟。</h5>
                </div>
                  
              </div>

              <div class="cookstep2-w">
                <div class="cookstep1number-w secondary-dark white">
                    <h3>2</h3>
                </div>
                <div class="cookstep1pic-w">
                      <img src="./imgs/recipe_imgs/1_002.jpg" alt="">
                </div>
                <div class="cookstep1text-w white">
                    <h5 class="cookstep1texth5-w">2.將鮪⿂、⽟⽶粒、洋蔥丁、⿊胡椒、鹽以無油⼩⽕拌炒至湯汁收乾。 提⽰：將鮪⿂罐頭瀝乾。</h5>
                </div>  

              </div>

              <div class="cookstep3-w">
                <div class="cookstep1number-w secondary-dark white">
                      <h3>3</h3>
                </div>
                <div class="cookstep1pic-w">
                      <img src="./imgs/recipe_imgs/1_003.jpg" alt="">
                    </div>
                <div class="cookstep1text-w white">
                <h5 class="cookstep1texth5-w">3.將餡料放入⾺鈴薯泥拌勻。</h5>
                </div>

              </div>

              <div class="cookstep4-w">
                <div class="cookstep1number-w secondary-dark white">
                      <h3>4</h3>
                </div>
                <div class="cookstep1pic-w">
                      <img src="./imgs/recipe_imgs/1_004.jpg" alt="">
                    </div>
                <div class="cookstep1text-w white">
                  <h5 class="cookstep1texth5-w">4.捏成圓形後靜置10分鐘。</h5>
                </div> 

              </div>

              <div class="cookstep5-w">
                <div class="cookstep1number-w secondary-dark white">
                      <h3>5</h3>
                </div>
                <div class="cookstep1pic-w">
                      <img src="./imgs/recipe_imgs/1_005.jpg" alt="">
                </div>
                <div class="cookstep1text-w white">
                    <h5 class="cookstep1texth5-w">5.按順序裹上麵粉、蛋液、麵包粉。</h5>
                </div>  
              </div>

              <div class="cookstep6-w">
                <div class="cookstep1number-w secondary-dark white">
                      <h3>6</h3>
                </div>
                <div class="cookstep1pic-w">
                      <img src="./imgs/recipe_imgs/1_006.jpg" alt="">
                </div>
                <div class="cookstep1text-w white">
                    <h5 class="cookstep1texth5-w">6.送入氣炸烤箱以180度烤15分鐘。</h5>
                  </div> 
              </div>
              

    
 
            </div>
        </section>
    
    
    <!----- section4 ------->
      <section class="section4">
          <!-- <div class="title black">
              <h4>評論留言 Leave Message<hr class="hr3">
              </h4>               
          </div> -->

          <div class="container">
                  <!-- login -->
            <div class="leaveblock1">
              <div class="leaveblockcover">
                    <div class="rank row">
                      <h5>排序</h5>
                      <div class="rankbtn btn3 btn-l">
                        <h5>最新</h5>
                      </div>
                    </div>
            
                    <div class="logincomments row">
                      <div class="logincommentspic"></div>
                      <div class="logincommentstext"></div>
                    </div>
            
                <!-- messeage number -->
                    <div class="commentscount row">
                      <div><img class="headpic" src="./imgs/recipe_icon/icon_login.svg" alt=""></div>
                      <h6>10則留言</h6>
                      <div><img class="arrowupdown" src="./imgs/recipe_icon/icon_arrowdown.svg" alt=""></div>
                    </div>
              </div>
            </div>
    
    
    
            <div class="leaveblock2">
                <!-- email -->
                <div class="emailbox">
                  <div class="btn3 btn-xl emailarea">email</div>
                  <div class="btn1 btn-xl sbarea">訂閱</div>
                  <h6 class="gray">訂閱 留下Ｅmail，隨時掌握最新消息！</p>
                    <div class="followicons row">
                      <div><img class="followicon1" src="./imgs/recipe_icon/icon_sent_2.svg" alt=""></div>
                      <div><img class="followicon2" src="./imgs/recipe_icon/icon_facebook.svg" alt=""></div>
                      <div><img class="followicon3" src="./imgs/recipe_icon/icon_tweet.svg" alt=""></div>
                      <div><img class="followicon4" src="./imgs/recipe_icon/icon_line.svg" alt=""></div>
          
                    </div>
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
 <script src="./scripts/recipe-content.js"></script>

<script>

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