<?php
include './parts/db-connect.php';

$perPage = 12;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header("Location: ?page=1");
    exit;
}
$params = [];

$category_sid = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$color_sid = isset($_GET['color']) ? intval($_GET['color']) : 0;
$brand_sid = isset($_GET['brand']) ? intval($_GET['brand']) : 0;



$where = ' WHERE 1 ';

if ($category_sid) {
    $where .= " AND `category_sid`=$category_sid ";
    $params['cate'] = $category_sid;
}
if ($color_sid) {
    $where .= " AND `color_sid`=$color_sid ";
}
if ($brand_sid) {
    $where .= " AND `brand_sid`=$brand_sid ";
}

$t_sql = "SELECT COUNT(1) FROM products_view $where";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];


//////
if ($totalRows > 0) {
    // 計算總頁數
    $totalPages = ceil($totalRows / $perPage); #資料筆數
    if ($page > $totalPages) {
        header("Location: products-list-demo1.php?page={$totalPages}");
        exit;
    }


    //////

    $sql = sprintf("SELECT * FROM products_view $where LIMIT %s, %s", ($page - 1) * $perPage, $perPage); #資料筆數
    $products = $pdo->query($sql)->fetchAll();
}
// echo json_encode($products);
// exit;


// $p_sql = "SELECT * FROM products_view LIMIT 12"; //sql部分獨立出來
// $products = $pdo->query($p_sql)->fetchAll(); //選取全部的內容
// echo json_encode($products); 

// $c_sql = "SELECT * FROM color "; 
// $color = $pdo->query($c_sql)->fetchAll(); 

// $c_sql = "SELECT * FROM products WHERE category=1";
// $cates = $pdo->query($c_sql)->fetchAll();

$ca_sql = "SELECT * FROM category WHERE 1";
$category = $pdo->query($ca_sql)->fetchAll();

$co_sql = "SELECT * FROM color WHERE 1";
$color = $pdo->query($co_sql)->fetchAll();

$b_sql = "SELECT * FROM `brand` WHERE 1";
$brand = $pdo->query($b_sql)->fetchAll();

// $f_sql = "SELECT * FROM `products_view` WHERE `brand_sid`=1 AND `category_sid`=1 AND `color_sid`=1"; #第一項第一種 /從資料庫裡面sql裡面拿
// $filter = $pdo->query($f_sql)->fetchAll();





?>

<?php include './parts/html_head.php' ?>

<link rel="stylesheet" href="./style/products.css">
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>



<style>


</style>
<?php include './parts/navbar.php' ?>

<div class="special-select">
    <div class="container">
        <div class=" special-select-title">
            <!-- <h5>Decochef 精選商品</h5> -->
        </div>
        <!-- <div class="carousel">
            <div class="carousel-item"><img src="imgs/products-imgs/11bfebad2e0242ac110004.jpg" alt=""></div>
            <div class="carousel-item"><img src="imgs/products-imgs/11bfebad2e0242ac110004.jpg" alt=""></div>
            <div class="carousel-item"><img src="imgs/products-imgs/11bfebad2e0242ac110004.jpg" alt=""></div>
            <div class="carousel-item"><img src="imgs/products-imgs/11bfebad2e0242ac110004.jpg" alt=""></div>
        </div> -->

        <div class="slider-window">
            <div class="container slider-window-f">
            <ul class="slider-window-card">
                <li>
                    <img src="./imgs/products-imgs/slide1.jpg" alt="" />
                </li>
                <li>
                    <img src="./imgs/products-imgs/slide2.jpg" alt="" />
                </li>
                <li>
                    <img src="./imgs/products-imgs/slide3.jpg" alt="" />
                </li>
                <li>
                    <img src="./imgs/products-imgs/slide4.jpg" alt="" />
                </li>
                <li>
                    <img src="./imgs/products-imgs/slide5.jpg" alt="" />
                </li>
            </ul>

            <ul class="slider-window-card slider-dots">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>

            <div class="prevPageArea">
                <button class="btnPrev"><i class="fa-solid fa-chevron-left white"></i></button>
            </div>
            <div class="nextPageArea">
                <button class="btnNext"><i class="fa-solid fa-chevron-right white"></i></button>
            </div>
            </div>
            
        </div>
    </div>

</div>

<!-- --篩選-- -->
<div class="dragleft">
    <div class="filter-function">
        <div class="filter-top">
            <p class="back"><i class="fa-solid fa-chevron-left"></i> 返回</p>
            <p>篩選</p>
            <p>清除全部</p>
        </div>
        <div id="m-dragleft-menu ">
            <ul>
                <li class="m-dragleft-menu-item filter-for-function"><a href="">
                        <h6 class=" filter-for-function">功能</h6>
                    </a>
                    <div class="container">
                        <ul class="m-menu-cate ">
                            <li class="m-menu-item"><a href="">
                                    <h3>咖啡機</h3>
                                </a></li>
                            <li class="m-menu-item"><a href="">
                                    <h3>快煮壺</h3>
                                </a></li>
                            <li class="m-menu-item"><a href="">
                                    <h3>電烤盤</h3>
                                </a></li>
                            <li class="m-menu-item"><a href="">
                                    <h3>氣炸鍋</h3>
                                </a></li>
                            <li class="m-menu-item"><a href="">
                                    <h3>烤箱</h3>
                                </a></li>
                        </ul>
                    </div>
                </li>

                <li class="m-dragleft-menu-item"><a href="">
                        <h6>金額</h6>
                    </a></li>
                <li class="m-dragleft-menu-item"><a href="">
                        <h6>顏色</h6>
                    </a></li>
                <li class="m-dragleft-menu-item"><a href="">
                        <h6>品牌</h6>
                    </a></li>

            </ul>
            <button> 顯示123個商品</button>
        </div>



    </div>


</div>

<!-- --篩選-- -->

<!-- 側邊攔 -->

<div class="wrapper ">
    <div class="container">
        <!-- 側邊攔 -->
        <section class="wrapper-aside">

            <!-- 麵包屑 -->
            <div class="breadscrumb">
                <div><a href="./index_.php"><i class="fa-solid fa-house"></i></a></i> <i class="fa-solid fa-angle-right"></i> <a href="">電烤盤</a>
                </div>
            </div>
            <div class="aside-list ">
                <div class="aside-list-condition-1">
                    <h6>推薦清單</h6>
                    <a href="">熱銷TOP 10</a> <br>
                    <a href="">站長推薦</a> <br>
                    <a href="">最佳交換禮物清單</a>
                </div>

                <div class="aside-list-condition-2">
                    <h6>篩選</h6>
                    <div class="aside-list-item ">
                        <h6>功能</h6>
                        <div class="aside-list-item-ca">
                            <ul class="">
                                <?php foreach ($category as $c) : ?>
                                    <div class="menubtn-p" data-val="1">
                                        <li><a href="?cate=<?= $c['sid'] ?>"><?= $c['category'] ?></a></li>
                                    </div>
                                <?php endforeach ?>
                                <!-- <div class="menubtn-p" data-val="1">
                                    <li><a href="">氣炸鍋</a></li>
                                </div>
                                <div class="menubtn-p" data-val="2">
                                    <li><a href="">電烤盤</a></li>
                                </div>
                                <div class="menubtn-p" data-val="3">
                                    <li><a href="">熱壓吐司機</a></li>
                                </div>
                                <div class="menubtn-p" data-val="4">
                                    <li><a href="">烤箱/麵包機</a></li>
                                </div>
                                <div class="menubtn-p" data-val="5">
                                    <li><a href="">調理鍋</a></li>
                                </div>
                                <div class="menubtn-p" data-val="6">
                                    <li><a href="">炊飯機</a></li>
                                </div> -->

                            </ul>
                            <ul>
                                <!-- <div class="menubtn-p" data-val="7">
                                    <li><a href="">電子壓力鍋</a></li>
                                </div>
                                <div class="menubtn-p" data-val="8">
                                    <li><a href="">咖啡機</a></li>
                                </div>
                                <div class="menubtn-p" data-val="9">
                                    <li><a href="">快煮壺</a></li>
                                </div>
                                <div class="menubtn-p " data-val="10">
                                    <li><a href="">果汁機</a></li>
                                </div>
                                <div class="menubtn-p " data-val="11">
                                    <li><a href="">配件</a></li>
                                </div>
                                <div class="menubtn-p " data-val="12">
                                    <li><a href="">其他</a></li>
                                </div> -->
                            </ul>

                        </div>

                    </div>
                    <div class="aside-list-item">
                        <h6>金額</h6>
                        <div>
                            <ul>
                                <div class="filter-price">
                                    <li>
                                        <a href="" class="price-f">
                                            <div><i class="fa-regular fa-circle-check"></i></div>
                                            <div>NT$1,000 以下</div>
                                        </a>
                                    </li>
                                </div>
                                <div class="filter-price">
                                    <li>
                                        <a href="" class="price-f">
                                            <div><i class="fa-regular fa-circle-check"></i></div>
                                            <div>NT$1,000 - $3,000</div>
                                        </a>
                                    </li>
                                </div>
                                <div class="filter-price">
                                    <li>
                                        <a href="" class="price-f">
                                            <div><i class="fa-regular fa-circle-check"></i></div>
                                            <div>NT$3,000 - $5,000</div>
                                        </a>
                                    </li>
                                </div>
                                <div class="filter-price">
                                    <li>
                                        <a href="" class="price-f">
                                            <div><i class="fa-regular fa-circle-check"></i></div>
                                            <div>NT$5,000 - $7,000</div>
                                        </a>
                                    </li>
                                </div>

                                <div class="filter-price">
                                    <li>
                                        <a href="" class="price-f">
                                            <div><i class="fa-regular fa-circle-check"></i></div>
                                            <div>NT$7,000 以上</div>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </div>

                    </div>
                    <div class="aside-list-item">
                        <h6>顏色</h6>
                        <div>
                            <div class="colorstyle-f">
                                <?php foreach ($color as $co) : ?>
                                    <div class=" ">
                                        <li><a href="?color=<?= $co['sid'] ?>"><?= $co['color'] ?></a></li>
                                    </div>
                                <?php endforeach ?>
                                <!-- <div class="colorstyle" title="紅色" style="background-color:rgb(205, 34, 34)" data-val="1"><a href=""></a></div>
                                <div class="colorstyle" title="粉紅色" style="background-color:lightpink" data-val="2"></div>
                                <div class="colorstyle" title="紫色" style="background-color:MediumPurple" data-val="3"></div>
                                <div class="colorstyle" title="藍色" style="background-color: RoyalBlue" data-val="4"></div>
                                <div class="colorstyle" title="綠色" style="background-color:DarkOliveGreen" data-val="5"></div>
                                <div class="colorstyle" title="米色" style="background-color:antiquewhite" data-val="6"></div> -->
                            </div>
                            <!-- <div class="colorstyle-f">
                                <div class="colorstyle" title="奶茶色" style="background-color:rgb(222, 184, 135)" data-val="7"></div>
                                <div class="colorstyle" title="棕色" style="background-color:rgb(136, 84, 24)" data-val="8"></div>
                                <div class="colorstyle" title="黑色" style="background-color:rgb(0, 0, 0)" data-val="9"></div>
                                <div class="colorstyle colorstyle-white" title="白色" style="background-color:rgb(255, 255, 255)" data-val="10"></div>
                                <div class="colorstyle" title="銀色" style="background-color:LightGray" data-val="11"></div>
                                <div class="colorstyle colorstyle-mix " title="多色" data-val="12"></div>
                            </div> -->
                        </div>
                        <div class="aside-list-item">
                            <h6>品牌</h6>
                            <ul class="">
                                <?php foreach ($brand as $b) : ?>
                                    <div class="brandtype ">
                                        <li><a href="?brand=<?= $b['sid'] ?>"><?= $b['brand'] ?></a></li>
                                    </div>
                                <?php endforeach ?>
                                <!-- <div class="brandtype ">
                                <li><a href="">BRUNO</a></li>
                            </div>
                            <div class="brandtype ">
                                <li><a href="">TOFFY</a></li>
                            </div>
                            <div class="brandtype ">
                                <li><a href="">BALMUDA</a></li>
                            </div>
                            <div class="brandtype ">
                                <li><a href="">Recolte</a></li>
                            </div>
                            <div class="brandtype ">
                                <li><a href="">Giaretti</a></li>
                            </div>
                            <div class="brandtype ">
                                <li><a href="">Siroca</a></li>
                            </div>
                            <div class="brandtype ">
                                <li><a href="">mosh!</a></li>
                            </div>
                            <div class="brandtype">
                                <li><a href="">Iris Ohyama</a></li>
                            </div>
                            <div class="brandtype ">
                                <li><a href="">Sengoku Aladdin</a></li>
                            </div> -->

                            </ul>
                        </div>
                    </div>



                </div>

        </section>
        <!-- 側邊攔 -->
        <!-- 商品列表 -->
        <section class="wrapper-content">
            <div class="wrapper-content-top">

                <div class="filter-area ">
                    <div class="filter-bar ">
                        <div class="filterbox">
                            <a class="filterboxbt" href=""><i class="fa-solid fa-filter"></i> 篩選商品
                            </a>
                        </div>

                        <!-- https://kknews.cc/zh-tw/code/5nny588.html -->
                        <div class="drop">
                            <a class="dropbt">
                                <i class="fa-solid fa-arrow-down-wide-short">
                                </i>排序
                            </a>
                            <div class="dropbox">
                                <a href="#">熱門程度優先</a>
                                <a href="#">最新上架優先</a>
                                <a href="#">價格由高至低</a>
                                <a href="#">價格由低至高</a>
                            </div>
                        </div>

                    </div>
                    <!-- <span class="filter-botton" >
                        "篩選商品"
                        " ( "
                        "0"
                        " ) "
                        ::after
                    </span> -->



                </div>
                <div class="">
                    <p>找到 '123' 件電烤盤商品</p>
                </div>

            </div>

            <div class="products-list ">
                <div class="products-list-wrap">
                    <?php foreach ($products as $r) :
                        $img = explode(',', $r['pictures'])[0]
                    ?>
                        <a href="products-intro.php?sid=<?= $r['sid'] ?>">
                            <div class="item">
                                <div class="item-save"><i class="fa-regular fa-heart"></i></div>
                                <div class="img-wrap">
                                    <img src="imgs/products-imgs/<?= $img ?>" alt="">
                                </div>
                                <div class="item-function">
                                    <div class="row spc-between">
                                        <div class="item-info">
                                            <p class="pm"><?= $r['brand'] ?> <?= $r['pdName'] ?> - <?= $r['color'] ?></p>
                                            <p class="ps"><i class="fa-solid fa-dollar-sign"></i><?= $r['price'] ?></p>
                                        </div>
                                        <div class="cart">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach ?>

                    <!-- 換頁btn -->
                    <div class="pages">
                        <div>
                            <div class="row">
                                <ul class="page-item-f">
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fa-solid fa-angles-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?<?php
                                                                    $p = $params; #複製
                                                                    $p['page'] = $page - 1; #把頁碼加進來
                                                                    echo http_build_query($p);
                                                                    ?>">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </a>
                                    </li>

                                    <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
                                        if ($i >= 1 and $i <= $totalPages) :
                                            $p = $params; #複製
                                            $p['page'] = $i; #把頁碼加進來
                                    ?>
                                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                                <a class="page-link" href="?<?= http_build_query($p) ?>"><?= $i ?></a>
                                            </li>
                                    <?php endif;
                                    endfor; ?>

                                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?<?php
                                                                    $p = $params; #複製
                                                                    $p['page'] = $page + 1; #把頁碼加進來
                                                                    echo http_build_query($p);
                                                                    ?>">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fa-solid fa-angles-right"></i>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="p_muibox_root">
                    <a href="" class="p_muibox_icon">
                      <i class="fa-solid fa-angle-left"></i>
                    </a>
                    <form action="">
                      <input type="text" class="p_muibox_form" placeholder=" 1 " />
                    </form>
                    <a href="" class="p_muibox_icon">
                      <i class="fa-solid fa-angle-right"></i>
                    </a>
                    <span>共10頁</span>
                  </div> -->

                    <!-- 換頁btn -->

                </div>
            </div>
        </section>
        <!-- 商品列表 -->

    </div>


</div>



<?php include './parts/footer.php' ?>

<?php include './parts/scripts.php' ?>
<!-- js/jq script 的架構貼這邊 -->
<script>
    // --篩選--
    $('.filterbox').click(function(e) {
        e.preventDefault();
        $('.filter-function').addClass('dragleft-open')
    });

    $('.back').click(function() {
        console.log('hi')
        $('.filter-function').removeClass('dragleft-open')
        $('.filter-function').addClass('dragleft-closing')

    })

    // -----條件篩選----


    $('.filter-for-function').click(function(e) {
        e.preventDefault();
        console.log('hello')
        // $('.filter-for-function').toggleClass('active');
        $('.m-menu-cate').slideToggle(500);
        $('.m-menu-cate').css("display", "none");
    });

    // --篩選--


    const products_list_wrap = $('#products-list-wrap');
    let cateBtnVal = 1;
    let colorBtnVal = 1;
    let typeBtnVal = 1;

    //menubtn
    const categories = $('.menubtn-p');
    const colorstyles = $('.colorstyle');
    const brands = $('.brandtype')

    colorstyles.click(function() {
        colorstyles.removeClass('active');
        $(this).addClass('active');
        colorBtnVal = $(this).attr('data-val');
        getProductsList();
    });

    categories.click(function() {
        categories.removeClass('active');
        $(this).addClass('active');
        cateBtnVal = $(this).attr('data-val');
        colorstyles.eq(0).click();
    });
    categories.eq(0).click();

    brands.click(function() {
        brands.removeClass('active');
        $(this).addClass('active');
        typeBtnVal = $(this).attr('data-val');
        colorstyles.eq(0).click();
    });
    brands.eq(0).click();


    // recipestyles.eq(0).click();

    function getProductsList() {
        console.log({
            cateBtnVal,
            colorBtnVal,
            typeBtnVal
        })

        fetch(`products-list-demo2.php?cate=${cateBtnVal}&color=${colorBtnVal}&type=${typeBtnVal}`)
            .then(r => r.text())
            .then(txt => {
                products_list_wrap.html(txt)

            })

    }
    // changeProductListPage()

    let page = 0;

    $('.slider-dots li').mouseenter(function(e) {
        page = $(e.target).index();
        movePage();
    });

    $('.nextPageArea').click(function(e) {
        if (page < 4) {
            page = page + 1;
            movePage();
        }
    });

    $('.prevPageArea').click(function(e) {
        if (page > 0) {
            page = page - 1;
            movePage();
        }
    });

    function movePage() {
        const movement = page * -1096;

        // 
        $('.slider-window-card').css('transform', `translateX(${movement}px)`);

        // 使用者 moseenter 的指示點($(e.tartet))，做顏色改變
        // $('.slider-dots li')
        //     .eq(page)
        //     .css('background', '#fff')
        //     .siblings()
        //     .css('background', 'transparent');
    }
</script>
<?php include './parts/html_foot.php' ?>