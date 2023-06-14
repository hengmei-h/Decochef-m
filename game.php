<?php
// include './parts/db-connect.php';
// if(isset($_SESSION['user'])){
//   header("Location: index_.php");
//   exit;
// }
$title = 'Decochefgame';
$pageName = 'gameing';
?>

<?php include './parts/html_head.php'?>

<!-- css-link -->
<link rel="stylesheet" href="../Decochef/style/game.css">
<!-- slick -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />

 <!-- google font -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style> 
</style>
<?php 
//include './parts/navbar.php'?>


<!-- <div class="wrapper">
    <div class="game-details">
        <span class="score">Score: 0</span>
        <span class="high-score">High Score: 0</span>
    </div>

    <div class="play-board">
        <div class="controls">
            <i data-key="ArrowLeft" class="fa-solid fa-arrow-left"></i>
            <i data-key="ArrowUp" class="fa-solid fa-arrow-up"></i>
            <i data-key="ArrowRight" class="fa-solid fa-arrow-right"></i>
            <i data-key="ArrowDown" class="fa-solid fa-arrow-down"></i>
        </div>
    </div> -->





<!-- 10次換一點 -->


<!-- 
<div class="container">
    <div class="content">
        <div class="secondary">
            <div class="score">
                <p>Score: &nbsp;</p>
                <div class="scoreDisplay">0</div>
            </div>

            <div class="popup">
                <button class="playAgain"></button>
            </div>
        </div>
        <div class="grid"></div>
        <div class="button">
            <button class="top">Top</button>
            <div class="btn">
                <button class="left">Left</button>
                <button class="right">Right</button>
            </div>
            <button class="bottom">Buttom</button>
        </div>
    </div>
</div> -->

<div class="container">
  <header>
    <div>It's Decochef Game Time!</div>
    <div class="contrast">100%</div>
    <div class="score">0</div>
  </header>
  <div class="grid"></div>

  <div class="button">
    <div class="controls">
        <button class="left"><i  class="fa-solid fa-arrow-left"></i></button>

        <button class="top">
        <i class="fa-solid fa-arrow-up"></i>
        </button>

        <button class="right">
        <i class="fa-solid fa-arrow-right"></i>
        </button>

        <button class="bottom">
        <i class="fa-solid fa-arrow-down"></i>
        </button>
    </div>       
  </div>



  <footer>Press an arrow key or space to start!
    <div>Ready for hard more? Press H</footer>
</div>

<a id="youtube" href="https://youtu.be/TAmYp4jKWoM" target="_blank">
  <span>See how this game was made</span>
</a>
<div id="youtube-card">
  How to create a snake game with JavaScript
</div>









<?php 
//include './parts/footer.php'?>

<?php include './parts/scripts.php'?>



<!-- slick -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
 <!-- js link -->
<script src="../Decochef/scripts/game.js"></script>

<?php include './parts/html_foot.php'?>