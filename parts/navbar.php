<?php
if (!isset($pageName)) {
    $pageName = '';
}
?>

<link rel="stylesheet" href="./style/nav-footer.css">
<style>
    .menu .active{
        font-weight: 900;
        border-bottom: 2px solid white;
    }
</style>
<header class="primary">
        <div class="container">
            <div class="row">
                <div class="hamburgerbox">
                    <i class="fa-solid fa-bars" id="hamburger"></i>
                </div>
                <div class="logobox">
                    <a href="opening.php"><img src="./imgs/logo.svg" alt="" class="logo"></a>
                </div>
                <nav>
                    <ul class="menu">
                        <li><a href="aboutus.php" class="<?= $pageName == 'aboutus' ? 'active' : '' ?>">About Us</a></li>
                        <li><a href="news_main.php" class="<?= $pageName == 'news' ? 'active' : '' ?>">News</a></li>
                        <li><a href="class1_main_text.php" class="<?= $pageName == 'class' ? 'active' : '' ?>">Class</a></li>
                        <li><a href="products-list.php" class="<?= $pageName == 'products' ? 'active' : '' ?>">Products</a></li>
                        <li><a href="recipe-lifestyle.php" class="<?= $pageName == 'lifeStyle' ? 'active' : '' ?>">Lifestyle</a></li>
                    </ul>
                </nav>
                <ul class="login-status-lt">
                    <?php if (isset($_SESSION['user'])) : ?>
                            <li class="pm">Hi,
                            <a><?= $_SESSION['user']['nickname'] ?></a>
                            </li>
                            <li class="pm">
                            <a href="logout.php">登出</a>
                            </li>
                        <?php else : ?>
                            <li class="pm">
                            <a href="login.php#">登入</a>
                            </li>
                            <li class="pm">
                            <a href="login.php#register">註冊</a>
                            </li>

                        <?php endif; ?>
                </ul>
                <div class="iconbox">
                    <ul class="icons">
                        <li>
                            <a class="carticon" href="../Decochef/cart-step1.php">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span class="badge cart-num">0</span>
                            </a>
                        </li>
                        <li><a href="../Decochef/member_center.php"><i class="fa-solid fa-user"></i></a></li>
                        <li><a><i class="fa-sharp fa-solid fa-magnifying-glass" id="searchicon"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

</header>
    <div class="dropdown">
        <div class="container">
            <ul id="m-menu ">
                <div class="row spc-center">
                    <input class="m-menu-search" type="text" name="search" id="searchbox" placeholder="想在Decochef尋找什麼呢？">
                    <i class="fa-sharp fa-solid fa-magnifying-glass" id="m-menu-searchbtn"></i>
                </div>
                <h4 class="m-menu-item-1">Menu</h4>
                <li class="m-menu-item"><a href="aboutus.php" ><h3>About Us 關於我們</h3></a></li>
                <li class="m-menu-item"><a href="news_main.php" ><h3>News 最新消息</h3></a></li>
                <li class="m-menu-item"><a href="class1_main_text.php" ><h3>Class 體驗課程</h3></a></li>
                <li class="m-menu-item"><a href="products-list.php" ><h3>Products 購物商城</h3></a></li>
                <li class="m-menu-item"><a href="recipe-lifestyle.php" ><h3>Lifestyle 品味誌</h3></a></li>
            </ul>
            <div class="login-status-mb">
                <?php if (isset($_SESSION['user'])) : ?>
                        <p>
                        <a><?= $_SESSION['user']['nickname'] ?></a>
                        <a href="logout.php">(登出)</a>
                        </p>
                    <?php else : ?>
                        <p>
                        <a href="login.php#">登入</a>
                        <a href="login.php#register">註冊</a>
                        </p>
                    <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="dropdown-search">
        <div class="container">
            <div class="row spc-center">
                <input type="text" name="search" id="searchbox" placeholder="想在Decochef尋找什麼呢？">
                <i class="fa-sharp fa-solid fa-magnifying-glass" id="searchbtn"></i>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
            // navlist
            $('#hamburger').click(function (e) {
                e.preventDefault();
                $('#hamburger').toggleClass('active');
                $('.dropdown').slideToggle(1000);
                $('.dropdown-search').css("display", "none");
            });

            $('#searchicon').click(function (e) {
                e.preventDefault();
                $('#searchicon').toggleClass('active');
                $('.dropdown-search').slideToggle(500);
                $('.dropdown').css("display", "none");
            });


            function calcCartItems(cartData){
            let count = 0;
            for(let s in cartData){
            const item = cartData[s];
            count += +item.quantity;
            }
            document.querySelector('.cart-num').innerHTML = count;
            }

            fetch(`cart-api.php`)
            .then(r => r.json())
            .then(cart => {
                calcCartItems(cart.data);
            });
    </script>