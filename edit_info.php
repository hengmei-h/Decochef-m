<?php
include './parts/db-connect.php';if(!isset($_SESSION['user'])){
  header("Location: login.php");
  exit;
}
// }

$title = '修改會員資料';
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
      <h3>會員修改資料</h3>
      <div class="edit-form">
        <p class="noedit input">會員姓名:<?= $r['name'] ?></p>
        <p class="noedit input">身份證字號:<?= $r['id'] ?></p>
        <p class="noedit input">生日:<?= $r['birthday'] ?></p>
            <form id="edit" name="edit" novalidate onsubmit="checkForm(event)" class="w100 row">
              <p class="noedit">姓名</p> 
              <div class="half-input input">
                <input type="text" name="name" id="name" placeholder="請輸入暱稱" value="<?= $r['name'] ?>">
                <div class="form-text"></div>
              </div>
              <p class="noedit">暱稱</p> 
              <div class="half-input input">
                <input type="text" name="nickname" id="nickname" placeholder="請輸入暱稱" value="<?= $r['nickname'] ?>">
                <div class="form-text"></div>
              </div>
              <p class="noedit">手機</p> 
              <div class="input">
              <input type="text" name="mobile" id="mobile" placeholder="請輸入手機號碼" value="<?= $r['mobile'] ?>">
                <div class="form-text"></div>
              </div>
              <p class="noedit">信箱</p> 
              <div class="input">
                <input type="email" name="email" id="email" placeholder="請輸入信箱" value="<?= $r['email'] ?>">
                <div class="form-text"></div>
              </div>
              <p class="noedit">地址</p> 
              <div class="input">
                <input type="text" name="address" id="address" placeholder="請輸入地址" value="<?= $r['address'] ?>">
                <div class="form-text"></div>
              </div>
              <button type="submit" class="btn-l btn1 half-btn">送出</button>
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
//驗證資料
  function validateEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
  return re.test(email);
  }
  function validateMobile(mobile) {
  var re = /^09\d{2}-?\d{3}-?\d{3}$/;
  return re.test(mobile);
  }

  function checkForm(event) {
    event.preventDefault();

    let isPass = true;

    [...document.edit.elements].forEach(el => {
      if (el.tagName !== 'INPUT') return;
      el.style.border = "0px";
      el.nextElementSibling.innerHTML = '';
    })

    const nameFi = document.edit.name;
    if (nameFi.value.length < 2) {
      nameFi.style.border = "1px solid red";
      nameFi.nextElementSibling.innerHTML = '請輸入正確的姓名';
      isPass = false;
    }

    const nicknameFi = document.edit.nickname;
    if (nicknameFi.value.length < 2) {
      nicknameFi.style.border = "1px solid red";
      nicknameFi.nextElementSibling.innerHTML = '暱稱需大於2字';
      isPass = false;
    }
    
    const mobileFi = document.edit.mobile;
    if (! mobileFi.value){
      mobileFi.style.border = "1px solid red";
      mobileFi.nextElementSibling.innerHTML = '*必填';
      isPass = false;
    }else{
      if (! validateMobile(mobileFi.value)) {
        mobileFi.style.border = "1px solid red";
        mobileFi.nextElementSibling.innerHTML = '請輸入正確的手機號碼';
        isPass = false;
      }
    }

    const emailFi = document.edit.email;
    if (! emailFi.value){
      emailFi.style.border = "1px solid red";
      emailFi.nextElementSibling.innerHTML = '*必填';
      isPass = false;
    }else{
      if (!validateEmail(emailFi.value)) {
        emailFi.style.border = "1px solid red";
        emailFi.nextElementSibling.innerHTML = '請輸入正確的 Email';
        isPass = false;
      }
    }

    if (!isPass) {
      return;
    }

    const fd = new FormData(document.edit);

    fetch("edit-api.php", {
      method: 'POST',
      body: fd
    })
    .then(r => r.json())
    .then(data => {
      console.log(data);

      if (data.success) {
        // location.href = 'list.php';
        alert('修改成功');
      } else {
        alert(data.error || '資料未修改');
      }
    })
    .catch(err=>{
      // 錯誤處理
      console.log({err});
    });
  }

</script>
<?php include './parts/html_foot.php'?>