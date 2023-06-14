//--------recipe-tab-small--------

// $(function(){
//     var $li = $('ul.tab-title-recipecard li');
//         $($li. eq(0) .addClass('active').find('a').attr('href')).siblings('.re-tab-inner').hide();
    
//         $li.click(function(){
//             $($(this).find('a'). attr ('href')).show().siblings ('.re-tab-inner').hide();
//             $(this).addClass('active'). siblings ('.active').removeClass('active');
//         });
//     });

//--------recipe-tab-large--------

// $(function(){
//     var $li = $('ul.tab-recipecardlarge li');
//         $($li. eq(0) .addClass('active').find('a').attr('href')).siblings('.relg-tab-inner').hide();
    
//         $li.click(function(){
//             $($(this).find('a'). attr ('href')).show().siblings ('.relg-tab-inner').hide();
//             $(this).addClass('active'). siblings ('.active').removeClass('active');
//         });
//     });

      
  //--------article-tab--------

  function changeListyle(e){
	let id = e.currentTarget.id // listyle-數字
	let idArray =id.split('-') // idArray = ['listyle','數字']
	let idNumber = idArray[1] //抓陣列的第一項數字
	let width = document.getElementById('ar-tab01').offsetWidth
	console.log(width)
	// 把所有 listyle 上有紅色背景的 active移除
	$('.listyle').removeClass('active');
	// 被點擊的 listyle 加上active
	e.currentTarget.classList.add('active');
	$('.arpanelsData').css('transform',`translateX(-${idNumber*width}px)`);

}

// 當我畫面寬度改變時，要重新計算一次 ar-tab 的寬度，並且改變transform
window.onresize = reportWindowSize;


 function reportWindowSize(){
	let id = $('.listyle.active').attr('id');
	console.log('eddie',id);
	let idArray =id.split('-') // idArray = ['listyle','數字']
	let idNumber = idArray[1] //抓陣列的第一項數字
	let width = document.getElementById('ar-tab01').offsetWidth;
	$('.arpanelsData').css('transform',`translateX(-${idNumber*width}px)`);
 }
