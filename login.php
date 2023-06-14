<?php
include './parts/db-connect.php';
if(isset($_SESSION['user'])){
  header("Location: index_.php");
  exit;
}
$title = '登入';
$pageName = 'login';
?>

<?php include './parts/html_head.php'?>
<link rel="stylesheet" href="./style/login.css">
<style>
  .btn-l, .signup-btn, .login-btn{
    cursor: pointer;
  }
</style>
<?php include './parts/navbar.php'?>

<section class="mainsec">
  <div class="container" >
    <div class="form-box">
      <!-- 切換 -->
      <div class="switch-items row">
        <div class="login-btn w50"><h6>會員登入</h6></div>
        <div class="signup-btn w50"><h6>會員註冊</h6></div>
      </div>
      <!-- 表單 -->
      <div class="login-form">
        <form name="login" novalidate onsubmit="checkLogin(event)" class="col">
        <div class="input">
            <input type="email" name="email" placeholder="請輸入帳號(電子信箱)">
            <div class="form-text"></div>
          </div>
          <div class="input">
            <input type="password" name="password" placeholder="請輸入密碼">
            <div class="form-text"></div>
          </div>  
        <button type="submit" class="btn-l btn1">登入</button>
        </form>
      </div>

      <!-- 註冊表單 -->
      <div class="signup-form ">
        <form id="signup" name="signup" novalidate onsubmit="checkForm(event)" class="w100 row">
          <div class="input half-input">
            <input onclick="autofillout()"  type="text" name="name" id="name" placeholder="姓名">
            <div class="form-text"></div>
          </div>
          <div class="input half-input">
            <input type="text" name="nickname" id="nickname" placeholder="暱稱">
            <div class="form-text"></div>
          </div>
          <div class="input">
            <input type="text" name="id" id="id" placeholder="身分證字號">
            <div class="form-text"></div>
          </div>
          <div class="input">
            <input type="date" name="birthday" id="birthday" >
            <div class="form-text"></div>
          </div>
          <div class="input">
          <input type="number" name="mobile" id="mobile" placeholder="電話">
            <div class="form-text"></div>
          </div>
          <div class="input">
            <input type="email" name="email" id="email" placeholder="信箱">
            <div class="form-text"></div>
          </div>
          <div class="input half-input">
            <input type="password" name="password_one" id="password_one" placeholder="輸入密碼" >
            <div class="form-text"></div>
          </div>
          <div class="input half-input">
            <input type="password" name="password" id="password" placeholder="確認密碼">
            <div class="form-text"></div>
          </div>
          <div onclick="formReset()" class="btn-l btn3 half-btn" id="clear">重填</div>
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
$('.login-btn').click(function(){
  $('.signup-form').css('display','none')
  $('.login-form').css('display','block')
  $('.signup-btn').css('background-color','#CBAC8D').css('color','#fff')
  $('.login-btn').css('background-color','#F1ECE6').css('color','#404040')
})
$('.signup-btn').click(function(){
  $('.signup-form').css('display','block')
  $('.login-form').css('display','none')
  $('.login-btn').css('background-color','#CBAC8D').css('color','#fff')
  $('.signup-btn').css('background-color','#F1ECE6').css('color','#404040')
})

// 登入
  const comeFrom = "<?= empty($_SERVER['HTTP_REFERER']) ? '' : $_SERVER['HTTP_REFERER'] ?>";
  // 紀錄登入前的網址

  function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
    return re.test(email);
  }

  function checkLogin(event){
    event.preventDefault(); 

    let isPass = true;

    
    [...document.login.elements].forEach(el => {
      if (el.tagName !== 'INPUT') return;
      el.style.border = "0px";
      el.nextElementSibling.innerHTML = '';
    })

      const emailFi = document.login.email;
      if (emailFi.value) {
        if (!validateEmail(emailFi.value)) {
          emailFi.style.border = "1px solid red";
          emailFi.nextElementSibling.innerHTML = '請輸入正確的 Email';
          isPass = false;
        }
      }

      // 如果沒有通過檢查, 就直接結束函式
      if (!isPass) {
        return;
      }
      
      const comeFrom = "<?= empty($_SERVER['HTTP_REFERER']) ? '' : $_SERVER['HTTP_REFERER'] ?>";
  // 紀錄登入前的網址
      const fd = new FormData(document.login);
      fetch("login-api.php", {
          method: 'POST',
          body: fd
        })
        .then(r => r.json())
        .then(data => {
          console.log(data);
          if (data.success) {
            location.href = comeFrom || 'index_.php';
          } else {
            alert('帳號或密碼錯誤');
          }

        })
        .catch(err=>{
          // 錯誤處理
          console.log(err);
        })
      }
  

// 登入end

// 註冊
// 重設表單
function formReset(){
  document.getElementById("signup").reset();
  [...document.signup.elements].forEach(el => {
      if (el.tagName !== 'INPUT') return;
      el.style.border = "0px";
      el.nextElementSibling.innerHTML = '';
    })
}

//驗證資料
    function validateId(id) {
    var re = /^[A-Za-z][12]\d{8}$/;
    return re.test(id);
    }

    function validateMobile(mobile) {
    var re = /^09\d{2}-?\d{3}-?\d{3}$/;
    return re.test(mobile);
    }

  function checkForm(event) {
    event.preventDefault();

    let isPass = true;

    [...document.signup.elements].forEach(el => {
      if (el.tagName !== 'INPUT') return;
      el.style.border = "0px";
      el.nextElementSibling.innerHTML = '';
    })
    
    const nameFi = document.signup.name;
    if (nameFi.value.length < 2) {
      nameFi.style.border = "1px solid red";
      nameFi.nextElementSibling.innerHTML = '請輸入正確的姓名';
      isPass = false;
    }
    const nicknameFi = document.signup.nickname;
    if (nicknameFi.value.length < 2) {
      nicknameFi.style.border = "1px solid red";
      nicknameFi.nextElementSibling.innerHTML = '暱稱需大於2字';
      isPass = false;
    }

    const idFi = document.signup.id; 
    if (! idFi.value){
      idFi.style.border = "1px solid red";
      idFi.nextElementSibling.innerHTML = '*必填';
      isPass = false;
    }else{
      if (! validateId(idFi.value)) {
        idFi.style.border = "1px solid red";
        idFi.nextElementSibling.innerHTML = '請輸入正確的身分證字號';
        isPass = false;
      }
    }

    const bdFi = document.signup.birthday; 
    if (! bdFi.value){
      bdFi.style.border = "1px solid red";
      bdFi.nextElementSibling.innerHTML = '*必填';
      isPass = false;
    }



    const mobileFi = document.signup.mobile;
    
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

    const emailFi = document.signup.email;
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
    console.log('checkin!1')
    const p1 = document.signup.password_one;
    const p2 = document.signup.password;
    if (! p1.value){
      console.log('checkin!2')
      p1.style.border = "1px solid red";
      p1.nextElementSibling.innerHTML = '*必填';
      isPass = false;
    }
    if (! p2.value){
      console.log('checkin!3')
      p2.style.border = "1px solid red";
      p2.nextElementSibling.innerHTML = '*必填';
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

    const fd = new FormData(document.signup);

    fetch("add-api.php", {
      method: 'POST',
      body: fd
    })
    .then(r2 => r2.json())
    .then(data=>{
        if(data.success){
          alert('註冊會員成功，請登入會員');
        location.href = 'login.php';
      } else {
        alert(data.error || '註冊失敗');
      }
    });
  }
// 註冊end

const whenHashChange = function(){
  console.log(location.hash);

  if(location.hash=='#register'){
    $('.signup-btn').click();
  } else {
    $('.login-btn').click();
  }
}
window.addEventListener('hashchange', whenHashChange);
whenHashChange();


function autofillout(){
  $('#name').val("文同珢");
  $('#nickname').val("小文");
  $('#id').val("G203109082");
  $('#birthday').val("1996-02-15");
  $('#mobile').val("0986010332");
  $('#email').val("moon@mm.com");
  $('#password_one').val("0000000");
  $('#password').val("0000000");
}

</script>
<?php include './parts/html_foot.php'?>