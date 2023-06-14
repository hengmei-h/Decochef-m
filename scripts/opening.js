// function rainCool(){
//     let amount = 200;
//     let body = document.querySelector('body');
//     let i = 0;

//     while(i < amount){
//         let drop = document.createElement('i');
//         let size = Math.random() * 5;
//         let posX = Math.floor(Math.random() * window.innerWidth);
//         let delay = Math.random() * -20;
//         let duration = Math.random() * 5;


//         drop.style.width = 0.2 + size +'px';
//         drop.style.left = posX + 'px';
//         drop.style.animationDelay = delay + 's';
//         drop.style.animationDuration = 1 + duration + 's';
//         body.appendChild(drop);
//         i++
//     }
//     // const  animatemoveout = document.getElementById('rainmoveout');
//     // setTimeout(function(){
//     //     rainmoveout.remove(); 
//     // }, 2000);
// }

// rainCool();



// // 設置定時器，每隔1秒執行一次 removeFunction()
// var timer = setInterval(removeFunction, 5000);

// // 定義 removeFunction() 函数
// function removeFunction() {
//   // 找到要刪除的元素
//   var iElement = document.getElementById("spani");

//   // 如果該元素存在，就從文檔中刪除它
//   if (iElement) {
//     iElement.remove();
//   } else {
//     // 如果該元素不存在，就停止定時器
//     clearInterval(timer);
//   }
// }

// removeFunction()



// mouseevent
document.addEventListener('mousemove',function(e){
  let body = document.querySelector('body');
  let particles = document.createElement('label');
  let x = e.offsetX;
  let y = e.offsetY;
  particles.style.left = x +'px';
  particles.style.top = y + 'px';

  let size = Math.random() * 8;
  particles.style.width = 2 + size +'px';
  particles.style.height = 2 + size +'px';

  let transformValue = Math.random() * 360;
  particles.style.transform = 'rotate('+transformValue+'deg)';

  
  body.appendChild(particles);

  setTimeout(function(){
    particles.remove()
  },2000)
})



// const h2 = document.querySelector('h2');
// h2.addEventListener('animationend', () => {
//   h2.style.display = 'none';
// });

// const h3 = document.querySelector('h3');
// h3.addEventListener('animationend', () => {
//   h3.style.display = 'none';
// });
