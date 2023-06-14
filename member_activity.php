<?php
include './parts/db-connect.php';
if(! isset($_SESSION['user'])){
  header("Location: index_.php");
  exit;
}
$title = '會員活動';
$pageName = 'member_activity';

?>

<?php include './parts/html_head.php'?>
<style>
    .mainsec a{
        color: #A48374;
    }
    body{
        background-color: #F1ECE6;
        color:#A58E7C;
    }

    .mainsec{
        padding-top: 100px;
        min-height: 112vh;
    }
    .subtitle, .collections,.options{
        margin-top: 30px;
    }
    .pages{
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .flex-s{
        justify-content: flex-start;
    }
    .btn1{
        width: 20%;
        margin: 5px;
    }
    .item{
        width: 24%;
        /* height: 246px; */
        position: relative;
        margin: 0.5%;
    }
    .remove, .cart{
        width: 32px;
        height: 32px;
        background-color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 3px;
        padding: 5px;
    }
    .remove{
        position: absolute;
        top: 5px;
        right: 5px;
        z-index: 5;
        border: 1px solid #CBAC8D;
    }
    .cart{
        background-color:#CBAC8D;
        color: #fff;
    }
    .cart:hover{
        background-color:#A24D38;
    }
    .remove:hover{
        background-color:#EFEFEF;
    }
    .img-wrap{
    width: 100%;
    overflow: hidden;
    }
    .collections .img-wrap{
        width: 240px;
        height: 240px;
        overflow: hidden;
    }
    .collections img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .item-function{
        background-color: #fff;
        border-radius: 0 0 5px 5px;
        padding: 5px;
    }

    .pagebtn{
        width: 40px;
        height: 40px;
    }
    .pages .row{
        align-items: center;
        justify-content: center;
    }
    
    .options .active{
        background-color: #A58E7C;
    }
    .comment-item, .article-item, .review-item{
        background-color: #fff;
        position: relative;
        border-radius: 10px;
    }

    .article-item{
        height: 200px;
        width: 48%;
        margin: 8px;
        padding: 0px 10px;
    }

    .comment-item, .review-item{
        height: 200px;
        width: 100%;
        margin: 8px;
        padding: 0px 10px;
    }

    .img-wrap-col{
        width: 35%;
        overflow: hidden;
        margin-right: 20px;
        position: relative;
    }
    .comment .img-wrap-col, .reviews .img-wrap-col{
    height: 90%;
    }

    .article-item .img-wrap-col{
        width:45%;
        margin-right: 5px;
        padding-right: 5px;
    }
    .editbox{
        display: none;
    }
    .order-info{
        margin-right: 20px;
        width: 250PX;
    }
    .status{
        position: absolute;
        top: 0px;
        right: 0px;
        width: 50px;
        height: 100%;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        border-radius: 0 10px 10px 0;
    }
    .review-done{
        background-color: #CFB89F;
    }
    .review-wait{
        background-color: #A48374;
    }

    .class-collect, .article-collect, .comment, .reviews{
        display: none;
    }
    .reviews-info{
        width: 250px;
    }

    .noh-row{
    display: flex; }

    .noh-row .img-wrap-col{
        width: 280px;
        overflow: hidden;
    }

    .noh-row img{
        object-fit: cover;
       height: 200px;
       width: 100%;
    }
    .article-info{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .item-info .pm{
        height: 52px;
    }
    .pagebtn.active{
        background-color: #CBAC8D;
        color: #fff;
    }
    
    @media (max-width: 375px){
        .mainsec{
        padding-top: 80px;
        }
        .subtitle, .collections,.options{
            margin-top: 15px;
        }
        .pages{
            margin-bottom: 15px;
        }

        .btn1{
            width: 30%;
        }
        .m-wrap{
        flex-wrap: wrap;
    }
    .item{
        width: 48%;
        /* height: 246px; */
        position: relative;
        margin: 10px 1%;
    }

    .article-item{
        height: 310px;
        width: 100%;
        margin: 8px 0px;
        padding: 10px;
    }
    .img-wrap-col, .article-item .img-wrap-col {
        width: 100%;
        margin: 0;
        margin-bottom: 10px;
        padding-right:0px;
    }
    .comment .img-wrap-col, .reviews .img-wrap-col{
    height: 200px;
        margin-bottom: 0px;
    }
    .reviews .img-wrap-col{
        width:88%;
    }

    .comment-item{
        justify-content: flex-start;
        min-height: 350px;
        width: 100%;
        margin: 8px;
        padding: 10px 10px;
    }
    .review-item{
        justify-content: flex-start;
        min-height: 380px;
        width: 100%;
        margin: 8px;
        padding: 0 10px;
    }
    .comment-item .row{
        align-items: flex-start;
    }

    .status{
        width: 40px;
        height: 100%;
    }
    .item-info{
        height: 50px;
    }
    .item-info .pm{
        height: 32px;
    }
    .noh-row .img-wrap-col{
        height: 230px;
    }
    .collections .img-wrap{
        width: 153.4px;
        height: 153.4px;
        overflow: hidden;
    }
    }
</style>
<?php include './parts/navbar.php'?>

<section class="mainsec">
    <div class="container">
        <div class="row spc-between">
            <h3>會員活動</h3>
            <a href="./member_center.php"><i class="fa-solid fa-chevron-left"></i>返回會員中心</a>
        </div>
        <div class="options">
            <div class="row flex-s m-wrap">
                <div class="btn-l btn1 active" id="product-btn">商品收藏</div>
                <div class="btn-l btn1" id="class-btn">課程收藏</div>
                <div class="btn-l btn1" id="article-btn">文章收藏</div>
                <div class="btn-l btn1" id="reviews-btn">我的評價</div>
                <div class="btn-l btn1" id="comment-btn">我的留言</div>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- 商品收藏 -->
        <div class="product-collect" >

        </div>
        <!-- 課程收藏 -->
        <div class="class-collect" >

        </div>

        <!-- 文章收藏 -->
        <div class="article-collect">

        </div>
        <!-- 我的留言 -->
        <div class="comment" >
            <h4 class="subtitle">文章留言列表</h4>
            <div class="collections">
                <div class="row wrap">
                    <div class="comment-item">
                        <div class="row m-wrap">
                            <div class="remove">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            <div class="img-wrap-col">
                                <img class="w100"  src="./imgs/recipe_imgs/mostpopular_01.png" alt="">
                            </div>
                            <div class="article-info">
                                <h6>領養不棄養！4個浪浪故事!</h6>
                                <p class="pm">留言日期: 2023-3-10</p>
                                <p class="pm">留言內容: 
                                    <i class="fa-solid fa-pen"></i>
                                </p>
                                <p class="pm content" >支持領養不棄養</p>
                                <div class="editbox">
                                    <textarea name="editContent" id="editContent" cols="30" rows="4">支持領養不棄養</textarea>
                                    <button class="btn-s btn1 ok">修改</button>
                                </div>
                            </div>
                        </div>
                    </div>          
                    <div class="comment-item">
                        <div class="row m-wrap">
                            <div class="remove">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            <div class="img-wrap-col">
                                <img class="w100"  src="./imgs/recipe_imgs/mostpopular_03.png" alt="">
                            </div>
                            <div class="article-info">
                                <h6>Hong Kong！3種新玩法!</h6>
                                <p class="pm">留言日期: 2023-1-5</p>
                                <p class="pm">留言內容: 
                                    <i class="fa-solid fa-pen"></i>
                                </p>
                                <p class="pm content" >香港美食超讚!推薦太平山纜車。</p>
                                <div class="editbox">
                                    <textarea name="editContent" id="editContent" cols="30" rows="4">香港美食超讚!推薦太平山纜車。</textarea>
                                    <button class="btn-s btn1 ok">修改</button>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="comment-item">
                        <div class="row m-wrap">
                            <div class="remove">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            <div class="img-wrap-col">
                                <img class="w100"  src="./imgs/recipe_imgs/1_000.jpg" alt="">
                            </div>
                            <div class="article-info">
                                <h6>日式氣炸鮪⿂可樂餅</h6>
                                <p class="pm">留言日期: 2023-3-10</p>
                                <p class="pm">留言內容: 
                                    <i class="fa-solid fa-pen"></i>
                                </p>
                                <p class="pm content" >剛剛跟著做，可樂餅太讚了!全家都很喜歡</p>
                                <div class="editbox">
                                    <textarea name="editContent" id="editContent" cols="30" rows="4">剛剛跟著做，可樂餅太讚了!全家都很喜歡</textarea>
                                    <button class="btn-s btn1 ok">修改</button>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="comment-item">
                        <div class="row m-wrap">
                            <div class="remove">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            <div class="img-wrap-col">
                                <img class="w100"  src="./imgs/recipe_imgs/8_000.png" alt="">
                            </div>
                            <div class="article-info">
                                <h6>日式茄子</h6>
                                <p class="pm">留言日期: 2022-12-20</p>
                                <p class="pm">留言內容: 
                                    <i class="fa-solid fa-pen"></i>
                                </p>
                                <p class="pm content" >根本好媳婦頻道!</p>
                                <div class="editbox">
                                    <textarea name="editContent" id="editContent" cols="30" rows="4">根本好媳婦頻道!</textarea>
                                    <button class="btn-s btn1 ok">修改</button>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="pages">
                <div class="container">
                    <div class="row">
                        <div class="pagebtn btn5"><i class="fa-solid fa-angles-left"></i></i></div>
                        <div class="pagebtn btn5"><i class="fa-solid fa-angle-left"></i></div>
                        <div class="pagebtn btn5">1</div>
                        <div class="pagebtn btn5">2</div>
                        <div class="pagebtn btn5">3</div>
                        <div class="pagebtn btn5"><i class="fa-solid fa-angle-right"></i></div>
                        <div class="pagebtn btn5"><i class="fa-solid fa-angles-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 我的評價 -->
        <div class="reviews">
            <h4 class="subtitle">文章留言列表</h4>
            <div class="collections">
                <div class="row wrap">
                    <!-- 未評論 -->
                    <div class="review-item">
                        <div class="status review-done">
                            <h3>未 評 論</h3>
                        </div>
                        <div class="row m-wrap">
                            <div class="img-wrap-col">
                                
                                <img class="w100"  src="./imgs/products-imgs/BR02013-P1.webp" alt="">
                            </div>
                            <div class="order-info">
                                <p class="pm">Bruno - 加大型多功能電烤盤 (紅色)</p>
                                <p class="ps">訂單編號:DC230511110775</p>
                                <p class="ps">購買日期:2020-1-1</p>
                            </div>
                            <div class="reviews-info">
                                <p>評分星等:
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </p>
                                <p>評論內容:</p>
                                <div class="reviewbox">
                                    <textarea name="editContent" id="editContent" cols="30" rows="4" placeholder="趕快來評論~"></textarea>
                                    <button class="btn-s btn1 submit">送出</button>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- 已評論 -->
                <div class="review-item">
                    <div class="status review-wait">
                        <h3>已 評 論</h3>
                    </div>
                    <div class="row m-wrap">
                        <div class="img-wrap-col">
                            <img class="w100"  src="./imgs/products-imgs/BA04071.jpeg" alt="">
                        </div>
                        <div class="order-info">
                            <p class="pm">BALMUDA - The Toaster 蒸氣烤麵包機(綠色)</p>
                            <p class="ps">訂單編號:DC230514070867</p>
                            <p class="ps">購買日期:2019-12-25</p>
                        </div>
                        <div class="reviews-info">
                            <p>評論日期:2020-1-7</p>
                            <p>評分星等:<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
                            <p>評論內容:</p>
                            <p>用一次就愛上了!過年要再買一台回家做裝飾。</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pages">
                <div class="container">
                    <div class="row">
                        <div class="pagebtn btn5"><i class="fa-solid fa-angles-left"></i></i></div>
                        <div class="pagebtn btn5"><i class="fa-solid fa-angle-left"></i></div>
                        <div class="pagebtn btn5">1</div>
                        <div class="pagebtn btn5">2</div>
                        <div class="pagebtn btn5">3</div>
                        <div class="pagebtn btn5"><i class="fa-solid fa-angle-right"></i></div>
                        <div class="pagebtn btn5"><i class="fa-solid fa-angles-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
    
</section>
<?php include './parts/footer.php'?>

<?php include './parts/scripts.php'?>
<!-- js/jq script 的架構貼這邊 -->
<script>
    $('.fa-pen').click(function(e){            
    $( e.target ).parent().next().css( "display", "none" ).next().css( "display", "block" );
})
    $('.ok').click(function(e){            
        $( e.target ).parent().css( "display", "none" ).prev().css( "display", "block" );
    })
    
    $('.options .btn-l').click(function(e){
    $(e.target).addClass('active').siblings().removeClass('active')
    // let index = $(e.target).index()+1;  
    // console.log(index)
    // let box = $('.itsme:nth-child('+index+')')
    // console.log(box)
    // $(box).css('display','block').siblings().css('display','none')
    })

    $('#product-btn').click(function(){
    $('.product-collect').css('display','block').siblings().css('display','none')})

    $('#class-btn').click(function(){
    $('.class-collect').css('display','block').siblings().css('display','none')})
    
    $('#article-btn').click(function(){
    $('.article-collect').css('display','block').siblings().css('display','none')})
    
    $('#reviews-btn').click(function(){
    $('.reviews').css('display','block').siblings().css('display','none')})
    
    $('#comment-btn').click(function(){
    $('.comment').css('display','block').siblings().css('display','none')})

    // page
        
    const whenHashChange = function(){
    console.log(location.hash);

    if(location.hash=='#re'){
    $('#reviews-btn').click();
    } else if(location.hash=='#cc'){
        $('#class-btn').click();
    } else if(location.hash=='#ac'){
        $('#article-btn').click();
    } else if(location.hash=='#com'){
        $('#comment-btn').click();
    } else{
        $('#product-btn').click();
    }
    }
    window.addEventListener('hashchange', whenHashChange);
    whenHashChange();
    // page

    // remove-saved
    function delete_it(sid) {
    if(confirm(`確定要移除這個收藏嗎?`)){
      location.href = 'unsaved.php?sid=' + sid;
    }
  }
    function delete_it_class(sid) {
    if(confirm(`確定要移除這個收藏嗎?`)){
      location.href = 'unsaved_class.php?sid=' + sid;
    }
  }

    //add to cart
    function addToCart(event){
        const btn = event.currentTarget;
        const item = btn.closest('.item');
        const pid = item.getAttribute('data-pid');
        const quantity = 1;

        console.log({pid, quantity})

        fetch(`cart-api.php?cmd=add&pid=${pid}&quantity=${quantity}`)
        
        .then(r=>r.json())
        .then(cart=>{
          console.log(cart);
          calcCartItems(cart.data);
          alert ('商品已加入購物車')
        })
    }

    function addToClass(event){
        const btn = event.currentTarget;
        const item = btn.closest('.item');
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
    // 鍵入商品
    function changeProductCollectPage(page=1){
        fetch(`product-collect.php?page=${page}`)
        .then(r=>r.text())
        .then(txt=>{
            $('.product-collect').html(txt)
        })
    }
    changeProductCollectPage()

    // 鍵入文章
    function changearticleCollectPage(page=1){
        fetch(`article-collect.php?page=${page}`)
        .then(r=>r.text())
        .then(txt=>{
            $('.article-collect').html(txt)
        })
    }
    changearticleCollectPage()

    // 鍵入課程
    function changeClassCollectPage(page=1){
        fetch(`class-collect.php?page=${page}`)
        .then(r=>r.text())
        .then(txt=>{
            $('.class-collect').html(txt)
        })
    }
    changeClassCollectPage()



</script>
<?php include './parts/html_foot.php'?>