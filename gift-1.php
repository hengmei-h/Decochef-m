<?php
include './parts/db-connect.php'
?>

<?php
$title = '禮物卡';
$pageName = 'gift';

// $type = isset($_GET['sticker']) ? intval($_GET['sticker']) : 1;
// echo json_encode($gift); 
?>


<?php include './parts/html_head.php' ?>
<link rel="stylesheet" href="./style/gift.css">
<?php include './parts/navbar.php' ?>


<section class="card-start">
    <div class="container">
        <div class="steps">
            <div class="step_progress">
                <div class="bar_box">
                    <div class="bar" style="width:0%"></div>
                </div>
                <div class="step_content">
                    <div class="step active">
                        <div class="step_num">
                            <div class="step_little"></div>
                        </div>
                        <div class="step_name">填寫名字及內容</div>
                    </div>
                    <div class="step ">
                        <div class="step_num"></div>
                        <div class="step_name">貼上貼紙</div>
                    </div>
                    <div class="step ">
                        <div class="step_num"></div>
                        <div class="step_name">卡片製作完成</div>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="block">卡片製作區</h5>
        <div class="post-card">
            <img src="imgs/kimi/Group 14208.svg" alt="">

            <div class="content">
                <form name="form" novalidate onsubmit="checkForm(event)" style="flex-wrap: wrap;">
                    <input type="text" name="receiver" placeholder="Dear: 請填入姓名" class="dear" id="receiver"></input>
                    <div class="form-text"></div>
                    <br>
                    <input type="text" name="content" class="please ps" cols="30" rows="5" id="content" placeholder="請輸入內容"></input>
                    <div class="form-text"></div>
                    <button type="submit" class=" btn1  btn-m nxtbtn">下一步</button>
                </form>
            </div>
        </div>
    </div>
</section>


<?php include './parts/footer.php' ?>
<?php include './parts/scripts.php' ?>


<script>

$(document).ready(function() {
  var defaultValue = "母親節快樂!!";
  
  // 當input元素被focus時，將value設置為空
  $('#content').focus(function() {
    if ($(this).val() == defaultValue) {
      $(this).val('');
    }
  });
  
  // 當input元素失去focus時，如果value值為空，將其value值設置為預設值
  $('#content').blur(function() {
    if ($(this).val() == '') {
      $(this).val(defaultValue);
    }
  });
});
$(document).ready(function() {
  var defaultValue = "Kimi";
  
  // 當input元素被focus時，將value設置為空
  $('#receiver').focus(function() {
    if ($(this).val() == defaultValue) {
      $(this).val('');
    }
  });
  
  // 當input元素失去focus時，如果value值為空，將其value值設置為預設值
  $('#receiver').blur(function() {
    if ($(this).val() == '') {
      $(this).val(defaultValue);
    }
  });
});


// var input = document.getElementById("content");

// input.addEventListener("focus", function() {
//   if (input.value === "") {
//     input.value = "祝妳母親節快樂!!";
//   }
// });

// input.addEventListener("blur", function() {
//   if (input.value === "祝妳母親節快樂!!") {
//     input.value = "";
//   }
// });


    function checkForm(event) {
        event.preventDefault(); // 避免傳統的表單送出
        // let isPass = true;

        // 讓欄位外觀回復原來的狀態
        // [...document.form1.elements].forEach(el => {
        //     if (el.tagName !== 'INPUT') return;
        //     el.style.border = "1px solid #CCCCCC";
        //     el.nextElementSibling.innerHTML = '';
        // })
        // const fd = new FormData(document.form);
        // fetch("add-cardapi.php", {
        //         method: 'POST',
        //         body: fd
        //     })
        //     .then(r => r.json())
        //     .then(data => {
        //         if (data.success) {
        //             alert('卡片內容製作完成');
        //             location.href = 'gift-2.php';
        //         }
        //     });


        // 抓取 收件人及內容 input的資料
        const receiver = document.getElementById('receiver')
        const content = document.getElementById('content')
        // 將資訊儲存在localStorage裡面 setItem(key,value)
        window.localStorage.setItem('cardReceiver', receiver.value)
        window.localStorage.setItem('cardContent', content.value)
        // 將畫面跳轉至 gift-2.php
        window.location.href = 'gift-2.php'


    }
</script>