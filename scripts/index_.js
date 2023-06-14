

// mouseevent
document.addEventListener('mousemove',function(e){
  let body = document.querySelector('.wrapallsection');
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



const wrapallsection = document.querySelector('.wrapallsection');
wrapallsection.addEventListener('animationend', () => {
  wrapallsection.style.display = 'none';
});

// const h3 = document.querySelector('h3');
// h3.addEventListener('animationend', () => {
//   h3.style.display = 'none';
// });
