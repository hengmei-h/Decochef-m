<?php
include './parts/db-connect.php';
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$title = '購物車';
$pageName = 'cart-step1';

// 商品收藏
$pc_sql = "SELECT * FROM `saved_product` 
INNER JOIN `products` ON  products.sid = product_sid 
INNER JOIN `color` ON  color.sid = color_sid 
INNER JOIN `brand` ON  brand.sid = brand_sid 
WHERE member_sid =" . $_SESSION['user']['sid'];
$pc_rows = $pdo->query($pc_sql)->fetchAll();

// echo json_encode(array_column($pc_rows, 'product_sid'));
// exit;
// 課程收藏
$cs_sql = "SELECT * FROM `saved_class` 
INNER JOIN `class` ON  class.sid = class_sid 
WHERE member_sid =" . $_SESSION['user']['sid'];
$cs_rows = $pdo->query($cs_sql)->fetchAll();

// 商品推薦
$rec1_sql = "SELECT products.*, color.color, brand.brand FROM `products` 
INNER JOIN `color` ON  color.sid = color_sid 
INNER JOIN `brand` ON  brand.sid = brand_sid 
ORDER BY products.popular DESC
LIMIT 0, 4";
$recs1 = $pdo->query($rec1_sql)->fetchAll();

$rec2_sql = "SELECT products.*, color.color, brand.brand FROM `products` 
INNER JOIN `color` ON  color.sid = color_sid 
INNER JOIN `brand` ON  brand.sid = brand_sid 
ORDER BY products.popular DESC
LIMIT 4, 4";
$recs2 = $pdo->query($rec2_sql)->fetchAll();

$rec3_sql = "SELECT products.*, color.color, brand.brand FROM `products` 
INNER JOIN `color` ON  color.sid = color_sid 
INNER JOIN `brand` ON  brand.sid = brand_sid 
ORDER BY products.popular DESC
LIMIT 8, 4";
$recs3 = $pdo->query($rec3_sql)->fetchAll();

$rec4_sql = "SELECT products.*, color.color, brand.brand FROM `products` 
INNER JOIN `color` ON  color.sid = color_sid 
INNER JOIN `brand` ON  brand.sid = brand_sid 
ORDER BY products.popular DESC
LIMIT 12, 4";
$recs4 = $pdo->query($rec4_sql)->fetchAll();

?>



<?php include './parts/html_head.php' ?>
<link rel="stylesheet" href="./style/cart.css">
<style>
    .relateItem,
    .sugItem {
        display: none;
    }

    .relateItem img,
    .sugItem img {
        width: 100%;
        vertical-align: middle;
    }

    .relateItem a,
    .sugItem a {
        color: white;
    }

    .slideshow-container {
        position: relative;
        margin: auto;
    }

    .slideshow-container .prev,
    .slideshow-container .next {
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

    .slideshow-container .prev {
        left: -50px;
    }

    .slideshow-container .next {
        right: -50px;
        border-radius: 3px 0 0 3px;
    }

    .numbertext {
        columns: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation: fade;
        animation-duration: 1.5s;
    }

    .saved-cart .item {
        width: 48%;
    }

    .saved-cart .wrap {
        justify-content: flex-start;
    }
    .nameline{
        height: 52px;
    }

    section.recom{
        margin-bottom: 30px;
    }
    .rec-item .img-wrap{
        width: 265px;
        height: 200px;
    }

    .mainsec img, .recom img{
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

   
    @-webkit-keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    @media (max-width: 375px) {
        .rec-item .img-wrap{
        width: 160px;
        height: 160px;
        }
        .slideshow-container .prev {
            left: -10px;
            top: 48%;
        }

        .slideshow-container .next {
            right: -10px;
            top: 48%;
        }

        .saved-cart .item {
            width: 100%;
        }
        p{
            line-height:22px;
        }
    }
</style>
<?php include './parts/navbar.php' ?>

<section class="mainsec">
    <div class="container">
        <div class="row spc-evenly steps">
            <div class="step row">
                <div class="circle active">
                    <h6>1</h6>
                </div>
                <p>購物車</p>
            </div>
            <div class="step row">
                <div class="circle">
                    <h6>2</h6>
                </div>
                <p>選擇配送及付款</p>
            </div>
            <div class="step row">
                <div class="circle">
                    <h6>3</h6>
                </div>
                <p>完成訂單</p>
            </div>
        </div>

        <div class="options">
            <div class="row flex-s m-wrap">
                <div class="btn-m btn1 active" id="product-btn">商品購物車</div>
                <div class="btn-m btn1" id="class-btn">課程購物車</div>
                <div class="btn-m btn1" id="saved-btn">我的收藏</div>
            </div>
        </div>
    </div>

    <!-- 購物車區域 -->
    <div class="cart-area">

        <!-- 商品購物車 -->
        <div class="cart-sec product-cart">
            <!-- totalprice -->
            <div class="totalprice fix">
                <div class="container row spc-between m-wrap">
                    <div class="caculate row">
                        <p>商品小計:$<span class="ProdTotalPrice"></span></p>
                        <p>運費:依配送方式</p>
                        <p>總計:$<span class="ProdTotalPrice1"></span></p>
                    </div>
                    <a href="./cart-step2.php"><button class="btn-l btn1 next">下一步</button></a>
                </div>
            </div>
            <div class="container">
                <h6>購物車內容</h6>

                <?php foreach ($_SESSION['cart'] as $item) :
                    $img = explode(',', $item['pictures'])[0];
                ?>

                    <div class="cart-item item product-item" data-pid="<?= $item['sid'] ?>">
                        <a href="javascript: removeItem(<?= $item['sid'] ?>)">
                            <div class="remove">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                        </a>
                        <div class="product-detail row m-wrap">
                            <div class="img-wrap">
                                <img class="w100" src="./imgs/products-imgs/<?= $img ?>" alt="">
                            </div>
                            <div class="product-info">
                                <div class="row spc-evenly m-wrap">
                                    <div class="pd-name">
                                        <p class="pdName"><?= $item['brand']." - ".$item['pdName'] ?></p>
                                        <p class="pm">型號:<?= $item['model'] ?></p>
                                        <p class="pm"><?= $item['color'] ?></p>
                                        <p class="pm price" data-val="<?= $item['price'] ?>"></p>
                                    </div>
                                    <div>
                                        <label for="quantity">數量:</label>
                                        <select onchange="qtyChanged(event)" class="quantity" name="quantity">
                                            <option value="1" <?= $item['quantity'] == '1' ? 'selected' : '' ?>>1</option>
                                            <option value="2" <?= $item['quantity'] == '2' ? 'selected' : '' ?>>2</option>
                                            <option value="3" <?= $item['quantity'] == '3' ? 'selected' : '' ?>>3</option>
                                            <option value="4" <?= $item['quantity'] == '4' ? 'selected' : '' ?>>4</option>
                                            <option value="5" <?= $item['quantity'] == '5' ? 'selected' : '' ?>>5</option>
                                            <option value="6" <?= $item['quantity'] == '6' ? 'selected' : '' ?>>6</option>
                                            <option value="7" <?= $item['quantity'] == '7' ? 'selected' : '' ?>>7</option>
                                            <option value="8" <?= $item['quantity'] == '8' ? 'selected' : '' ?>>8</option>
                                            <option value="9" <?= $item['quantity'] == '9' ? 'selected' : '' ?>>9</option>
                                            <option value="10" <?= $item['quantity'] == '10' ? 'selected' : '' ?>>10</option>
                                        </select>
                                    </div>
                                    <div>
                                        <p><span class="subTotal"></span></p>
                                    </div>
                                    <a href="javascript: Pdtosaved(<?= $item['sid'] ?>)">
                                        <div class="tolike btn-s btn1">移至收藏</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- 課程購物車 -->
        <div class="cart-sec class-cart">
            <!-- totalprice -->
            <div class="ClassTotalprice fix">
                <div class="container row spc-between m-wrap">
                    <div class="caculate row">
                        <p>總計:<span class="c_total"></span></p>
                    </div>
                    <a href="./cart-step2-c.php"><button class="btn-l btn1 next">下一步</button></a>
                </div>
            </div>
            <div class="container">
                <h6>課程內容</h6>
                <?php foreach ($_SESSION['class_cart'] as $ci) : ?>
                <div class="cart-item item class-item" data-pid="<?= $ci['sid']?>">
                    <a href="javascript: removeItem(<?= $item['sid'] ?>)">
                        <div class="remove">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </a>
                    <div class="product-detail row m-wrap">
                        <div class="img-wrap">
                            <img class="w150" src="<?= $ci['pic']?>" alt="">
                        </div>
                        <div class="product-info">
                            <div class="row spc-evenly m-wrap">
                                <div class="pd-name">
                                    <p>課程名稱:<?= $ci['title']?></p>
                                    <p><?= $ci['time']?></p>
                                    <p>老師:<?= $ci['teacher_name']?></p>
                                    <p class="pm price" data-val="<?=$ci['cost']?>"></p>
                                </div>
                                <div>
                                    <label for="pax">人數:</label>
                                    <select onchange="qtyChanged(event)" name="pax" class="pax">
                                    <option value="1" <?= $ci['quantity'] == '1' ? 'selected' : '' ?>>1</option>
                                    <option value="2" <?= $ci['quantity'] == '2' ? 'selected' : '' ?>>2</option>
                                    <option value="3" <?= $ci['quantity'] == '3' ? 'selected' : '' ?>>3</option>
                                    <option value="4" <?= $ci['quantity'] == '4' ? 'selected' : '' ?>>4</option>
                                    <option value="5" <?= $ci['quantity'] == '5' ? 'selected' : '' ?>>5</option>
                                    </select>
                                </div>
                                <div>
                                    <p class="cSubtotal"></p>
                                </div>
                                <button class="tolike btn-s btn1">移至收藏</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- 收藏頁面 -->
        <div class="cart-sec saved-cart">
            <div class="container">
                <div class="product-saved">
                    <h6>商品收藏</h6>
                    <div class="product-saved-box">
                        <div class="row wrap">
                            <?php foreach ($pc_rows as $r) :
                                $img = explode(',', $r['pictures'])[0];
                            ?>
                                <div class="saved-item item cart-item" data-pid="<?= $r['product_sid'] ?>">

                                    <a href="javascript: delete_it(<?= $r['product_sid'] ?>)">
                                        <div class="remove">
                                            <i class="fa-solid fa-xmark"></i>
                                        </div>
                                    </a>
                                    <div class="product-detail row m-wrap">
                                        <div class="img-wrap">
                                            <img class="w100" src="./imgs/products-imgs/<?= $img ?>" alt="">
                                        </div>
                                        <div class="product-info">
                                            <div class="row spc-evenly m-wrap">
                                                <div class="pd-name">
                                                    <p class="pdtitle"><?= $r['brand'], ' - ', ((mb_strlen($r['pdName'], "UTF8")>7) ? mb_substr($r['pdName'],0,7, "UTF8") : $r['pdName'])
                                                        .' '.((mb_strlen($r['pdName'], "UTF8")>7) ? nl2br(' ...') : nl2br('')) , '(', $r['color'], ')' ?></p>
                                                    <p class="p">型號:<?= $r['model'] ?></p>
                                                    <p class="p"><?= $r['color'] ?></p>
                                                    <p class="p">$<?= number_format($r['price']) ?></p>
                                                    <button type="button" class="tocart btn-s btn1" onclick="addToCart(event)">移至購物車</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <div class="class-saved">
                    <h6>課程收藏</h6>
                    <div class="row wrap">
                    <?php foreach ($cs_rows as $c) :
                    ?>
                        <div class="scart-item item sv-class-item" data-pid="<?=$c['sid'] ?>">
                            <a href="">
                                <div class="remove">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                            </a>
                            <div class="product-detail row m-wrap">
                                <div class="img-wrap">
                                    <img class="w100" src="<?=$c['pic']?>" alt="">
                                </div>
                                <div class="product-info">
                                    <div class="row spc-evenly m-wrap">
                                        <div class="pd-name">
                                            <p>課程名稱:<?=$c['title'] ?></p>
                                            <p>日期:<?=$c['time'] ?></p>
                                            <p>$<?= number_format($c['cost'])?>/位</p>
                                            <label for="amount">人數:</label>
                                            <select name="amount" id="amount">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <button type="button" class="tocart btn-s btn1" onclick="classToCart(event)">移至購物車</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 推薦區域 -->
<section class="recom">
    <div class="container">
        <!-- 熱賣商品 -->
        <div class="add-more">
            <h6>熱賣商品</h6>
            <!-- 輪播牆 -->
            <div class="slideshow-container">
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                <div class="row m-wrap relateItem fade">
                    <?php foreach ($recs1  as $re1) :
                        $img = explode(',', $re1['pictures'])[0];
                        ?>
                        <div class="rec-item" data-pid="<?= $re1['sid']?>">
                            <a href="javascript: tosaved(<?= $re1['sid'] ?>)">
                            <i class="<?= in_array($re1['sid'], array_column($pc_rows, 'product_sid')) ? "fa-solid" : "fa-regular" ?> fa-heart"></i>
                            </a>    
                            <div class="img-wrap">
                                <img class="w100" src="./imgs/products-imgs/<?= $img ?>" alt="">
                                
                            </div>
                            <div class="item-info">
                                <p class="pm nameline"><?=$re1['brand']?> - <?=$re1['pdName'] ?>(<?= $re1['color']?>)</p>
                                <p class="ps">$<?= number_format($re1['price']) ?></p>
                                <button class="btn-s btn1" onclick="recsToCart(event)">加入購物車</button>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="row m-wrap relateItem fade">
                <?php foreach ($recs2  as $re2) :
                        $img = explode(',', $re2['pictures'])[0];
                        ?>
                        <div class="rec-item" data-pid="<?= $re2['sid']?> ">
                            <a href="javascript: tosaved(<?= $re2['sid']?>)">
                                <i class="<?= in_array($re2['sid'], array_column($pc_rows, 'product_sid')) ? "fa-solid" : "fa-regular"  ?> fa-heart"></i>
                            </a>
                            <div class="img-wrap">
                                <img class="w100" src="./imgs/products-imgs/<?= $img ?>" alt="">
                            </div>

                            <div class="item-info">
                                <p class="pm nameline"><?=$re2['brand']?> - <?=$re2['pdName'] ?>(<?= $re2['color']?>)</p>
                                <p class="ps">$<?= number_format($re2['price']) ?></p>
                                <button class="btn-s btn1" onclick="recsToCart(event)">加入購物車</button>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="row m-wrap relateItem fade">
                <?php foreach ($recs3  as $re3) :
                        $img = explode(',', $re3['pictures'])[0];
                        ?>
                        <div class="rec-item" data-pid="<?= $re3['sid']?>">
                        <a href="javascript: tosaved(<?= $re3['sid'] ?>)">
                            <i class="<?= in_array($re3['sid'], array_column($pc_rows, 'product_sid')) ? "fa-solid" : "fa-regular"  ?> fa-heart"></i>
                        </a>
                            <div class="img-wrap">
                                <img class="w100" src="./imgs/products-imgs/<?= $img ?>" alt="">
                            </div>
                            <div class="item-info">
                                <p class="pm nameline"><?=$re3['brand']?> - <?=$re3['pdName'] ?>(<?= $re3['color']?>)</p>
                                <p class="ps">$<?= number_format($re3['price']) ?></p>
                                <button class="btn-s btn1" onclick="recsToCart(event)">加入購物車</button>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="row m-wrap relateItem fade">
                <?php foreach ($recs4  as $re4) :
                        $img = explode(',', $re4['pictures'])[0];
                        ?>
                        <div class="rec-item" data-pid="<?= $re4['sid']?>">
                        <a href="javascript: tosaved(<?= $re4['sid'] ?>)">
                            <i class="<?= in_array($re4['sid'], array_column($pc_rows, 'product_sid')) ? "fa-solid" : "fa-regular"  ?> fa-heart"></i>
                        </a>
                            <div class="img-wrap">
                                <img class="w100" src="./imgs/products-imgs/<?= $img ?>" alt="">
                            </div>
                            <div class="item-info">
                                <p class="pm nameline"><?=$re4['brand']?> - <?=$re4['pdName'] ?>(<?= $re4['color']?>)</p>
                                <p class="ps">$<?= number_format($re4['price']) ?></p>
                                <button class="btn-s btn1" onclick="recsToCart(event)">加入購物車</button>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include './parts/footer.php' ?>

<?php include './parts/scripts.php' ?>
<!-- js/jq script 的架構貼這邊 -->
<script>
    $('.options .btn-m').click(function(e) {
        $(e.target).addClass('active').siblings().removeClass('active')
    })

    $('#product-btn').click(function() {
        $('.product-cart').css('display', 'block').siblings().css('display', 'none')
    })
    $('#class-btn').click(function() {
        $('.class-cart').css('display', 'block').siblings().css('display', 'none')
    })
    $('#saved-btn').click(function() {
        $('.saved-cart').css('display', 'block').siblings().css('display', 'none')
    })


    // slides .relateItem
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
        var slides = document.getElementsByClassName("relateItem")
        // var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        // for (i =0 ; i < dots.length; i++){
        //     dots[i].className = dots[i].className.replace("active","");
        // }
        slides[slideIndex - 1].style.display = "flex";
        // dots[slideIndex - 1].className +="active";
    }

    // slides .sugItem cubaba
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlides(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("relateItem")
        // var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        // for (i =0 ; i < dots.length; i++){
        //     dots[i].className = dots[i].className.replace("active","");
        // }
        slides[slideIndex - 1].style.display = "flex";
        // dots[slideIndex - 1].className +="active";
    }
    
    // 商品從購物車移除
    function removeItem(pid) {
            // console.log(pid.target)
            if (confirm(`確定要從購物車移除這商品嗎?`)) {
                fetch(`cart-api.php?cmd=remove&pid=${pid}`)
                    .then(r => r.json())
                    .then(cart => {
                        // console.log(cart);
                        calcCartItems(cart.data); // navbar 上的數量
                        location.reload(); // 頁面重新載入

                        const item = document.querySelector(`tr[data-pid="${pid}"]`);

                        if (item) {
                            item.remove();
                        }
                        calcTotal();
                    })
            }
        }
        function removeClass(pid) {
            // console.log(pid.target)
            if (confirm(`確定要從購物車移除此課程嗎?`)) {
                fetch(`class_cart_api.php?cmd=remove&pid=${pid}`)
                    .then(r => r.json())
                    .then(class_cart => {
                        // console.log(cart);
                        // calcCartItems(cart.data); // navbar 上的數量
                        location.reload(); // 頁面重新載入

                        const item = document.querySelector(`tr[data-pid="${pid}"]`);
                        if (item) {
                            item.remove();
                        }
                        calcTotal();
                    })
            }
        }
        
        
    // 商品加入購物車
    function addToCart(event) {
        const btn = event.currentTarget;
        const item = btn.closest('.saved-item');
        const pid = item.getAttribute('data-pid');
        const quantity = 1;

        fetch('unsaved.php?sid=' + pid)
            .then(r => r.text())
            .then(txt => {
                // console.log(txt);
                alert(`商品已移置購物車`)

                fetch(`cart-api.php?cmd=add&pid=${pid}&quantity=${quantity}`)
                    .then(r => r.json())
                    .then(cart => {
                        // console.log(cart);
                        calcCartItems(cart.data);
                        location.reload();
                    })
            })

        console.log({
            pid,
            quantity
        })

    }

    function recsToCart(event) {
        const btn = event.currentTarget;
        const item = btn.closest('.rec-item');
        const pid = item.getAttribute('data-pid');
        const quantity = 1;
        alert(`商品已移置購物車`)

        fetch(`cart-api.php?cmd=add&pid=${pid}&quantity=${quantity}`)
            .then(r => r.json())
            .then(cart => {
                calcCartItems(cart.data);
            })
            location.reload()
    }


    function delete_it(sid) {
        if (confirm(`確定要移除這個收藏嗎?`)) {
            location.href = 'unsaved.php?sid=' + sid;
        }
    }

    //商品移至收藏   
    function Pdtosaved(sid) {
        location.href = 'saved-api.php?sid=' + sid;
        fetch(`cart-api.php?cmd=remove&pid=${sid}`)
            .then(r => r.json())
            .then(cart => {
                // console.log('hi', cart);
                calcCartItems(cart.data);
                // location.reload(); // 頁面重新載入

                const item = document.querySelector(`tr[data-pid="${sid}"]`);

                if (item) {
                    item.remove();
                }
                calcTotal();
            })
            alert('商品已加入收藏')
    }
    function tosaved(sid) {
        location.href = 'saved-api.php?sid=' + sid;
        fetch(`cart-api.php?cmd=remove&pid=${sid}`)
            .then(r => r.json())
            .then(cart => {
                // console.log('hi', cart);
                calcCartItems(cart.data);

                const item = document.querySelector(`tr[data-pid="${sid}"]`);
                alert('商品已加入收藏')
            })
    }

    // 變更數量時
    function qtyChanged(event) {
        // 商品
        const product = $(event.target).attr('name');
        
        if (product == 'quantity'){
        const qtyInput = event.currentTarget;
        let quantity = +qtyInput.value; // 數量

        const item = qtyInput.closest('.cart-item');
        const pid = item.getAttribute('data-pid');

        fetch(`cart-api.php?cmd=update&pid=${pid}&quantity=${quantity}`)
            .then(r => r.json())
            .then(cart => {
                // console.log(cart);
                calcCartItems(cart.data); // navbar 上的數量
                calcTotal();
            })

        alert('商品數量已更新')
        }else{
            // 課程
            const qtyInput = event.currentTarget;
            let quantity = +qtyInput.value; // 數量

            const item = qtyInput.closest('.class-item');
            const pid = item.getAttribute('data-pid');

            fetch(`class_cart_api.php?cmd=update&pid=${pid}&quantity=${quantity}`)
                .then(r => r.json())
                .then(class_cart => {
                    console.log(class_cart);
                    calcCartItems(class_cart.data); // navbar 上的數量
                    calcTotal();
                })
        alert('課程人數已更新')
        }


    }

    // 計算小計和總計
    const dollarCommas = function(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };

    function calcTotal() {
        // 商品
        const items = document.querySelectorAll('.product-item');
        // console.log(items);
        let total = 0;

        for (let it of items) {
            const price = +it.querySelector('.price').getAttribute('data-val');
            const quantity = +it.querySelector('.quantity').value;

            it.querySelector('.price').innerHTML = "$" + dollarCommas(price);
            it.querySelector('.subTotal').innerHTML = "$" + dollarCommas(price * quantity);
            total += price * quantity;
        };

        let ProdTotalPrice = document.querySelector('.ProdTotalPrice')
        ProdTotalPrice.innerHTML = dollarCommas(total);

        let ProdTotalPrice1 = document.querySelector('.ProdTotalPrice1')
        ProdTotalPrice1.innerHTML = dollarCommas(total);


        // 課程
        const c_items = document.querySelectorAll('.class-item');
        console.log(c_items);
        let c_total = 0;

        for (let it of c_items) {
            const price = +it.querySelector('.price').getAttribute('data-val');
            const pax = +it.querySelector('.pax').value;

            it.querySelector('.price').innerHTML = "$" + dollarCommas(price) +"/位";
            it.querySelector('.cSubtotal').innerHTML = "$" + dollarCommas(price * pax);
            c_total += price * pax;
        };

        console.log(c_total)
        let ClasTotalPrice = document.querySelector('.c_total')
        ClasTotalPrice.innerHTML = dollarCommas(c_total);
    }
    calcTotal();

    // 課程加入購物車
    function classToCart(event) {
        // console.log('hi')
        const btn = event.currentTarget;
        const item = btn.closest('.sv-class-item');
        const pid = item.getAttribute('data-pid');
        const quantity = 1;
        fetch(`class_cart_api.php?cmd=add&pid=${pid}&quantity=${quantity}`)
            .then(a => a.json())
            // .then(class_cart => {
            //     calcCartItems(class_cart.data+cart.data);
            // })
            alert("課程已加入購物車")
            location.reload()
            }

        

</script>
<?php include './parts/html_foot.php' ?>