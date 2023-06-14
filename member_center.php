<?php
include './parts/db-connect.php';
if(!isset($_SESSION['user'])){
  header("Location: login.php");
  exit;
}

$m_sql = "SELECT * FROM `member` WHERE sid=". $_SESSION['user']['sid'];
$r = $pdo->query($m_sql)->fetch();

// get level name
$n = intval($_SESSION['user']['sid']);
$l_sql = "SELECT * FROM `member` INNER JOIN `level` ON member.level = level.sid WHERE member.sid = $n";
$l = $pdo->query($l_sql)->fetch();

// get next level name
$n_sql = "SELECT * FROM `member` INNER JOIN `level` ON member.level+1 = level.sid WHERE member.sid = $n";
$next = $pdo->query($n_sql)->fetch();

$lev_sql = "SELECT * FROM `level` WHERE 1";
$lev = $pdo->query($lev_sql)->fetchAll();

$title = '會員中心';
$pageName = 'member_center';
?>

<?php include './parts/html_head.php'?>
<style>
  body{
    background-color: #F1ECE6;
    color:#A58E7C;
  }
  .mainsec{
    padding-top: 100px;
  }

  .rg-header {
    margin-bottom: 1em;
    text-align: left;
  }

  .rg-header > * {
    display: block;
  }

  /* table */
  table.rg-table {
    width: 100%;
    margin-bottom: 0.5em;
    border-collapse: collapse;
    border-spacing: 0;
  }
  table.rg-table tr {
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
    text-align: center;
  }
  table.rg-table thead {
    border-bottom: 3px solid #CFB89F;
  }
  table.rg-table tr {
    border-bottom: 1px solid #CFB89F;
    color: #222;
  }
  table.rg-table tr.highlight {
    background-color: #dcf1f0 !important;
  }
  table.rg-table.zebra tr:nth-child(even) {
    background-color: #f6f6f6;
  }
  table.rg-table th {
    font-weight: bold;
    padding: 0.35em;
  }

  table.rg-table td {
    padding: 0.35em;
  }
  table.rg-table .highlight td {
    font-weight: bold;
  }
  table.rg-table th.number,
  td.number {
    text-align: right;
  }

  .pl{    
    font-weight: 500;
    font-size:18px;
    line-height:27px;
  }
  .levelbox{
    background-color: #CFB89F;
    color: white;
    width:70px;
    height:70px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    border-radius: 3px;
    margin: 10px;
  }
  .levelbox.active{
    background-color: #A24D38;
  }
  .mainsec a, .mainsec a:visited, .member-service a, .member-service a:visited{
      color:#A58E7C !important;
  }
  .mainsec a:hover, .member-service a:hover{
    color:#CFB89F !important;
  }

  .service-box{
    background-color: #fff;
    width: 30%;
    height: 280px;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 15px;
  }
  .service-box h5{
    line-height: 45px;
  }
  .service-box h6{
    line-height: 40px;
  }

  .center, .member-msg, .member-level{
    margin-bottom: 50px;
  }
  .member-service{
    margin-top: 100px;
  }
  .member-level{
    margin-top: 100px;
  }
  .profile{
    width: 160px;
    height: 160px;
    border-radius: 50%;
    border: 4px solid #fff;
    margin-bottom: 30px;
    padding: 10px;
  }
  .enph{
    font-size: 20px;
    color: #A24D38;
    font-weight: 800;
    margin: 0 5px;
  }
  .greeting p{
    margin-top: 10px;
  }
  /* media queries */

  .cgprofile{
    width: 100%;
    height: 100vh;
    background-color: #22222250;
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2000;
    display: none;
  }
  .opbox{
    width: 60%;
    height: 60vh;
    background-color: #fff;
    border-radius: 10px;
    position: absolute;
    top: 200px;
    left: 20%;
    display: flex;
    padding: 50px 0;
  }
  .headwrap{
    width: 180px;
    height: 180px;
    padding: 10px;
    border-radius: 50%;
    overflow: hidden;
  }
  .headwrap img{
    width: 90%;
    height: 90%;
    object-fit:cover;
  }

  .profile:hover{
    cursor: pointer;
  }

  .opbox img:hover{
    cursor: pointer;
  }

  .changepic{
    width: 150px;
    border: 0px;
    margin: 0 auto;
  }

  .selected{
        background-color: #CFB89F;
        padding: 5px;
        transition: .5s;
    }
  @media (max-width: 375px){
    .enph{
      line-height: 28px;
      font-size: 18px;
    }
    .service-box{
    width: 33.3333%;
  }
  /* .aftersales{
    height: 150px;
  } */
  .member-service .container{
  background-color: #fff;
  border-radius: 5px;
  }
  .center, .member-msg, .member-service, .levelbox{
    margin-top: 20px;
    margin-bottom: 0px;
  }
  .member-level{
    margin-top: 60px;
  }

    .pl{    
    font-weight: 500;
    font-size:14px;
    line-height:18px;
  }

    .rg-container {
      max-width: 600px;
      margin: 0 auto;
    }
    table.rg-table {
      width: 100%;
    }
    table.rg-table tr.hide-mobile,
    table.rg-table th.hide-mobile,
    table.rg-table td.hide-mobile {
      display: none;
    }
    table.rg-table thead {
      display: none;
    }
    table.rg-table tbody {
      width: 100%;
    }
    table.rg-table tr,
    table.rg-table th,
    table.rg-table td {
      display: block;
      padding: 0;
    }
    table.rg-table tr {
      border-bottom: none;
      margin: 0 0 1em 0;
      padding: 0.5em;
    }
    table.rg-table tr.highlight {
      background-color: inherit !important;
    }
    table.rg-table.zebra tr:nth-child(even) {
      background-color: transparent;
    }
    table.rg-table.zebra td:nth-child(even) {
      background-color: #f6f6f6;
    }
    table.rg-table tr:nth-child(even) {
      background-color: transparent;
    }
    table.rg-table td {
      padding: 0.5em 0 0.25em 0;
      border-bottom: 1px dotted #CFB89F;
      text-align: right;
    }
    table.rg-table td[data-title]:before {
      content: attr(data-title);
      font-weight: bold;
      display: inline-block;
      content: attr(data-title);
      float: left;
      margin-right: 0.5em;
    }
    table.rg-table td:last-child {
      padding-right: 0;
      border-bottom: 2px solid #CFB89F;
    }
    table.rg-table td:empty {
      display: none;
    }
    table.rg-table .highlight td {
      background-color: inherit;
      font-weight: normal;
    }
    .greeting, .level-rev{
      width: 100%;
    }
    .m-wrap{
      flex-wrap: wrap;
    }

    .opbox{
    width: 90%;
    height: 90vh;
    background-color: #fff;
    border-radius: 10px;
    position: absolute;
    top: 50px;
    left: 5%;
    display: flex;
    padding: 50px 0;
  }
  .headwrap{
    width: 120px;
    height: 120px;
    padding: 5px;
    border-radius: 50%;
    overflow: hidden;
  }
  .records  {
    border-right: #F1ECE6 2px solid;
    border-left: #F1ECE6 2px solid;
    border-radius: 0;
  }
  }
</style>

<?php include './parts/navbar.php'?>

<section class="cgprofile">
  <div class="container">
    <div class="opbox">
      <div>
      <div class="row wrap">
        <div class="headwrap">
          <img src="./imgs/member/p01.png" alt="" class="pic" data-val="p01.png">
        </div>
        <div class="headwrap">
          <img src="./imgs/member/p02.png" alt="" class="pic" data-val="p02.png">
        </div>
        <div class="headwrap">
        <img src="./imgs/member/p03.png" alt="" class="pic"  data-val="p03.png">
        </div>
        <div class="headwrap">
        <img src="./imgs/member/p04.png" alt="" class="pic"  data-val="p04.png">
        </div>
        <div class="headwrap">
        <img src="./imgs/member/p05.png" alt="" class="pic"  data-val="p05.png">
        </div>
        <div class="headwrap">
        <img src="./imgs/member/p06.png" alt="" class="pic"  data-val="p06.png">
        </div>
        <div class="headwrap">
        <img src="./imgs/member/p11.png" alt="" class="pic"  data-val="p11.png">
        </div>
        <div class="headwrap">
        <img src="./imgs/member/p08.png" alt="" class="pic"  data-val="p08.png">
        </div>
        <div class="headwrap">
        <img src="./imgs/member/p09.png" alt="" class="pic"  data-val="p09.png">
        </div>
        <div class="headwrap">
        <img src="./imgs/member/p10.png" alt="" class="pic"  data-val="p10.png">
        </div>
      </div>
      <div class="btn1 btn-m changepic" onclick="changepic(event)">確認變更</div>
      </div>
    </div>
  </div>
</section>

<section class="mainsec">
  <div class="container">
  <h3 class="center">會員中心</h3>
    <div class="member-msg">
      <div class="profile"><img src="./imgs/member/<?= $r['protrait'] ?>" alt="" class="w100"></div>
      <div class="row spc-between m-wrap">
        <div class="greeting">
          <h5>Hi, <?= $r['nickname'] ?> Chef!</h5>
          <p>你的會員等級為<span class="enph"><?= $l['level_name'] ?></span>,
          尚差購物 <span class="enph"><?= $next['ug_count'] ?></span> 次或再消費<span class="enph"><?= number_format($next['ug_amount']) ?></span>元<br>
          即可升等為<span class="enph"><?= $next['level_name'] ?></span>! <a class="pl" href="#member-level">(查看會員制度及優惠)</a></p>
        </div>
        <div class="level-rev">
          <div class="row">
          <div class="ps levelbox <?= $r['level'] == 1 ? 'active': '' ?>">Lv.1 <br>銅牌主廚</div>
          <div class="ps levelbox <?= $r['level'] == 2 ? 'active': '' ?>">Lv.2 <br>銀牌主廚</div>
          <div class="ps levelbox <?= $r['level'] == 3 ? 'active': '' ?>">Lv.3 <br>金牌主廚</div>
          <div class="ps levelbox <?= $r['level'] == 4 ? 'active': '' ?>">Lv.4 <br>白金主廚</div>
        </div>
        </div>
      </div>
    </div>
 </div>
</section>
<section class="member-service">
  <div class="container">
    <div class="row spc-between m-wrap">
      <div class="activities service-box">
        <h5>會員活動</h5>
        <a href="member_activity.php#pc"><h6>商品收藏</h6></a>
        <a href="member_activity.php#cc"><h6>課程收藏</h6></a>
        <a href="member_activity.php#ac"><h6>文章收藏</h6></a>
        <a href="member_activity.php#re"><h6>我的評論</h6></a>
        <a href="member_activity.php#com"><h6>我的留言</h6></a>
      </div>
      <div class="records service-box">
        <h5>會員紀錄</h5>
        <a href="./edit_info.php"><h6>修改會員資料</h6></a>
        <a href="./edit_pw.php"><h6>修改密碼</h6></a>
        <a href="./member_record.php#orders"><h6>我的訂單</h6></a>
        <a href="./member_record.php#cops"><h6>我的優惠券</h6></a>
      </div>
      <div class="aftersales service-box">
        <h5>售後服務</h5>
        <a href=""><h6>退換貨</h6></a>
        <a href=""><h6>維修申請</h6></a>
      </div>
    </div>
  </div>
</section>
<!-- 會員等級表 -->
<div class="h100" id="member-level"></div>
<section class="member-level" >
<div class="container">
    <table class='rg-table' summary='Hed'>
      <caption class='rg-header'>
        <h4 class='rg-hed'>會員等級</h4>
        <p class='rg-dek'>會員等級與升級制度</p>
      </caption>
      <thead>
        <tr class="primary">
          <th class='pl white'>會員等級</th>
          <th class='pl white'>升級條件</th>
          <th class='pl white'>會員期限</th>
          <th class='pl white'>生日禮</th>
          <th class='pl white'>會員折扣</th>
          <th class='pl white'>升等禮</th>
          <th class='pl white'>紅利點數</th>
          <th class='pl white'>會員日點數加倍</th>
        </tr>
      </thead>
      <tbody>
        
          <tr class=''>
            <td class='pm primary white' data-title='會員等級'>Lv.1 銅牌主廚</td>
            <td class='pm' data-title='升級條件'>註冊即成為會員</td>
            <td class='pm' data-title='會員期限'>永久</td>
            <td class='pm' data-title='生日禮'>$50抵用券</td>
            <td class='pm' data-title='會員折扣'>無</td>
            <td class='pm' data-title='升等禮'>$100抵用券</td>
            <td class='pm' data-title='紅利點數'>單筆消費滿100元贈1點，<br>未滿100元不予計算，<br>1點可折抵1元</td>
            <td class='pm' data-title='會員日點數加倍'>X</td>
          </tr>
        

          <tr class=''>
            <td class='pm primary white' data-title='會員等級'>Lv.2 銀牌主廚</td>
            <td class='pm' data-title='升級條件'>近12個月累積消費3次或滿6000元</td>
            <td class='pm' data-title='會員期限'>12個月</td>
            <td class='pm' data-title='生日禮'>$150抵用券</td>
            <td class='pm' data-title='會員折扣'>一律95折</td>
            <td class='pm' data-title='升等禮'>$100抵用券</td>
            <td class='pm' data-title='紅利點數'>單筆消費滿100元贈1點，<br>未滿100元不予計算，<br>1點可折抵1元</td>
            <td class='pm' data-title='會員日點數加倍'>O</td>
          </tr>
        

          <tr class=''>
            <td class='pm primary white' data-title='會員等級'>Lv.3 金牌主廚</td>
            <td class='pm' data-title='升級條件'>近12個月累積消費6次或滿12000元</td>
            <td class='pm' data-title='會員期限'>12個月</td>
            <td class='pm' data-title='生日禮'>$200抵用券</td>
            <td class='pm' data-title='會員折扣'>一律9折</td>
            <td class='pm' data-title='升等禮'>$100抵用券</td>
            <td class='pm' data-title='紅利點數'>單筆消費滿100元贈1點，<br>未滿100元不予計算，<br>1點可折抵1元</td>
            <td class='pm' data-title='會員日點數加倍'>O</td>
          </tr>
        

          <tr class=''>
            <td class='pm primary white' data-title='會員等級'>Lv.4 白金主廚</td>
            <td class='pm' data-title='升級條件'>近12個月累積消費9次或滿20000元</td>
            <td class='pm' data-title='會員期限'>12個月</td>
            <td class='pm' data-title='生日禮效期一個月'>$300抵用券</td>
            <td class='pm' data-title='會員折扣'>一律85折</td>
            <td class='pm' data-title='升等禮'>$100抵用券</td>
            <td class='pm' data-title='紅利點數'>單筆消費滿100元贈1點，<br>未滿100元不予計算，<br>1點可折抵1元</td>
            <td class='pm' data-title='會員日點數加倍'>O</td>
          </tr>
        </div>
      </tbody>
    </table>
</div>
</section>


<?php include './parts/footer.php'?>

<?php include './parts/scripts.php'?>
<!-- js/jq script 的架構貼這邊 -->
<script>

$("body").click(function(){
  $(".cgprofile").hide();
});
 
// 點擊DIV時、不向上層冒泡。
$(".opbox").click(function(e){
  e.stopPropagation();
});
 
// 點擊按鈕時顯示或隱藏DIV
$(".profile").click(function(e){
  e.stopPropagation();
  $(".cgprofile").toggle();
});

$('.pic').click(function(event){
  // me = $(event.target)
    $(event.target).parent().toggleClass('selected').siblings().removeClass('selected');
})

// change pic
function changepic(even){
  const pic = $('.selected').children().attr('data-val');
  
  fd={
    "pro_img" : pic,
  }

  const usp = new URLSearchParams(fd);
  fetch("cgprofile_api.php", {
      method: 'POST',
      body: usp.toString(),
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          }
      })
    .then(r => r.json())
    .then(data=>{
        if(data.success){
        location.reload()
      } else {
        alert(data.error || '無法修改頭像，請聯繫客服');
    }
    });
  }
</script>
<?php include './parts/html_foot.php'?>