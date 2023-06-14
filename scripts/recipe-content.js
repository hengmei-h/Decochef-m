// // drop-down
// $(document).ready(function(){
// 	$('#redropDown').click(function(){
// 	  $('.redrop-down').toggleClass('redrop-down--active');
// 	});
//   });

function changeListyle(e){
    let id = e.currentTarget.id
    let idArray = id.split('-')
    let idNumber = idArray[1]
    let width = document.getElementById('re-tab01-m').offsetWidth
    console.log(width)

    $('.recipetype-m').removeClass("active");
    $('.recipepreparecontentData-m').css('transform',`translateY(-${idNumber*210}px)`);
}
window.onresize = reportWindowSize;

function reportWindowSize(){
let id = $('.recipetype-m.active').attr('id');
console.log('KK',id);
let idArray =id.split('-')
let idNumber = idArray[1] 
let width = document.getElementById('re-tab01-m').offsetWidth;
$('.recipepreparecontentData-m').css('transform',`translateY(-${idNumber*210}px)`);
}