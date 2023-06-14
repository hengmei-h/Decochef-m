<?php
include './parts/db-connect.php';if(!isset($_SESSION['user'])){
  header("Location: login.php");
  exit;
}
// }

$title = '修改密碼資料';
$pageName = 'edit';


// 如果沒給參數，跳回列表
// if(empty($_GET['sid'])){
//   header("Location: list.php");
//   exit;
// }

$sql = "SELECT * FROM `member` WHERE sid=". $_SESSION['user']['sid'];
$r = $pdo->query($sql)->fetch();
?>

<?php include './parts/html_head.php'?>
<style>
    .mainsec{
        min-height: 110vh;
        padding-top: 50px;
        top: 100px;
        background: #F1ECE6;
        background-size: cover;
    }

    .switch-items{
      text-align: center;
      height: 50px;
    }
    .switch-items div{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 50px;
    }

    .form-box{
      margin: 100px auto 0px;
      width: 580px;
      height: 582px;
      background-color: #F1ECE6;
    }

    form{
      margin: 0 auto;
    }

    input, textarea{
      font-size:20px;
      display:block;
      width:100%;
      height:52px;
      padding:5px 10px;
      border: 0px;
      background-color: none;
      background-image:none;
      background: #fff;
    }

    .edit-form{
      margin-top: 20px;
      transition: 1s;
     -webkit-transition: 1s;
    }

    .input{
    margin-bottom: 30px;
    margin: 10px;
    width: 85%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
    }

    .edit-form form {
      flex-wrap: wrap;
      align-content: space-around;
      justify-content: center;
      align-items: center;
    }

    button{
      border: 0px;
      width: 100%;
    }
    
    .half-input{
      width: 37%;
    }
    .half-btn{
      width: 30%;
    }

    .signup-btn {
      background-color: #CBAC8D;
      color: #fff;
    }
    .form-text{
      font-size: 10px;
      color: red;
      position: absolute;
      bottom: 3px;
      right: 3px;
    }
    h3 {
      color: #A58E7C;
      padding: 0px 20px;
    }

    .btcenter{
      text-align: right;
      display: block;
    }

    .noedit{
      /* justify-content: flex-start; */
      align-items: flex-start;
      align-self: center;
      margin: auto 0px;
      padding-left: 10px;
    }
    .noedit.input{
      padding-left: 20px;
    }

    @media (max-width: 375px){
      .mainsec{
        min-height: 100vh;}
      .form-box{
        width: 100%;
        margin-top: 40px;
      }
      .half-btn{
      width: 40%;
     }
     input, textarea{
      font-size:18px;}

      .mainsec{
        padding-top: 50px;
        top: 50px;
    }
    
    .input{
      width: 80%;
    }

    .half-input{
      width: 32%;
    }
    }
</style>

<?php include './parts/navbar.php'?>

<section class="mainsec">
  <div class="container">
    <div class="form-box">
      <a class="btcenter pm" href="./member_center.php"><i class="fa-solid fa-chevron-left"></i>返回會員中心</a>
      <h3>會員密碼變更</h3>
      <div class="edit-form">
            <form id="edpw" name="edpw" novalidate onsubmit="checkpassword(event)" class="w100 row">
            <div class="noedit">舊密碼</div>
            <div class="input">
                <input type="password" name="old_password" id="" placeholder="輸入原密碼" >
                <div class="form-text"></div>
              </div>
              <div class="noedit">新密碼</div>
              <div class="input">
              <input type="password" name="password_one" id="" placeholder="輸入新密碼" >
                <div class="form-text"></div>
              </div>
              <div class="noedit">新密碼</div>
              <div class="input">
              <input type="password" name="password" id="password" placeholder="確認新密碼">
                <div class="form-text"></div>
              </div>
              <button type="submit" class="btn-l btn1 half-btn">變更密碼</button>
            </form>
          </div>
      </div>
    </div>
  </div>
</section>
<?php include './parts/footer.php'?>

<?php include './parts/scripts.php'?>
<!-- js/jq script 的架構貼這邊 -->
<script>
  function checkpassword(event) {
    event.preventDefault();

    let isPass = true;

    [...document.edpw.elements].forEach(el => {
      if (el.tagName !== 'INPUT') return;
      el.style.border = "0px";
      el.nextElementSibling.innerHTML = '';
    })

      const opw = document.edpw.old_password;
      const p1 = document.edpw.password_one;
      const p2 = document.edpw.password;
      if (! opw.value){
        opw.style.border = "1px solid red";
        opw.nextElementSibling.innerHTML = '*必填';
        isPass = false;
      }

      if ( p1.value.length < 7 && p2.value.length < 7 ){
        p1.style.border = "1px solid red";
        p2.style.border = "1px solid red";
        p1.nextElementSibling.innerHTML = '密碼設定至少 7 碼以上';
        p2.nextElementSibling.innerHTML = '密碼設定至少 7 碼以上';
        isPass = false;
      }else if(p1.value != p2.value){
        p2.style.border = "1px solid red";
        p1.style.border = "1px solid red";
        p2.nextElementSibling.innerHTML = '密碼不一致';
        isPass = false;
      }

    if (!isPass) {
      return;
    }

    const fd = new FormData(document.edpw);

    fetch("edit_pw_api.php", {
      method: 'POST',
      body: fd
    })
    .then(r => r.json())
    .then(data => {
      console.log(data);

      if (data.success) {
        // location.href = 'list.php';
        alert('密碼已修改');
      } else {
        alert(data.error || '密碼未修改');
      }
    })
    .catch(err=>{
      // 錯誤處理
      console.log({err});
    });
  }

</script>
<?php include './parts/html_foot.php'?>