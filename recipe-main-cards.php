<?php
include './parts/db-connect.php';


//  $cate = isset($_GET['cate']) ? intval($_GET['cate']) : 1;
$cate = 1; #固定是一項

$type = isset($_GET['type']) ? intval($_GET['type']) : 1;



$r_sql = "SELECT * FROM `recipe_list` WHERE `category_id`=$cate AND `type`=$type"; #第一項第一種 /從資料庫裡面sql裡面拿
$recipes = $pdo->query($r_sql)->fetchAll();
?>

<style> 

</style>

<?php foreach ($recipes as $k => $r) : ?>
  <div class="card<?= $k + 1 ?>">
      <a href="./recipe-content.php?sid=<?= $r['sid_id'] ?>" target="_blank">
        <div class="recipecardcover">
          <div class="cardpic1">
            <img src="./imgs/recipe_imgs/<?= $r['picture'] ?>" alt="">
          </div>
          <div class="cardtext1">
            <h5><?= $r['title'] ?></h5>
            <div class="cardiconall">
              <ul class="row">
                <li>            
                  <img class="cardicons" src="./imgs/recipe_icon/icon_message.svg" alt="">
                </li>
                <li>
                  <img class="cardicons" src="./imgs/recipe_icon/icon_sent.svg" alt="">
                </li>
                <li>
                  <img class="cardicons" src="./imgs/recipe_icon/icon_save_2.svg" alt="">
                </li>
              </ul>
            </div>
          </div>
        </div>
      </a>
    </div>
<?php endforeach ?>


