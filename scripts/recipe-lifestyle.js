//--------recipe--------
$('.slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    centerMode: true,
    variableWidth: true,
    infinite: true,
    focusOnSelect: true,
    cssEase: 'linear',
    touchMove: true,
    prevArrow:'<button class="slick-prev"> < </button>',
    nextArrow:'<button class="slick-next"> > </button>',
    
    //         responsive: [                        
    //             {
    //               breakpoint: 576,
    //               settings: {
    //                 centerMode: false,
    //                 variableWidth: false,
    //               }
    //             },
    //         ]
  });
  
  
  var imgs = $('.slider img');
  imgs.each(function(){
    var item = $(this).closest('.item');
    item.css({
      'background-image': 'url(' + $(this).attr('src') + ')', 
      'background-position': 'center',            
      '-webkit-background-size': 'cover',
      'background-size': 'cover', 
    });
    $(this).hide();
  });



//adcarousel

/*
===============================================================

Hi! Welcome to my little playground!

My name is Tobias Bogliolo. 'Open source' by default and always 'responsive',
I'm a publicist, visual designer and frontend developer based in Barcelona. 

Here you will find some of my personal experiments. Sometimes usefull,
sometimes simply for fun. You are free to use them for whatever you want 
but I would appreciate an attribution from my work. I hope you enjoy it.

===============================================================
*/
$(document).ready(function(){

	//Swipe speed:
	var tolerance = 100; //px.
	var speed = 650; //ms.
  
	//Elements:
	var interactiveElements = $('input, button, a');
	var itemsLength = $('.panel').length;
	var active = 1;
  
	//Background images:
	for (i=1; i<=itemsLength; i++){
	  var $layer = $(".panel:nth-child("+i+")");
	  var bgImg = $layer.attr("data-img");
	  $layer.css({
		"background": "url("+bgImg+") no-repeat center / cover"
	  });
	};
  
	//Transitions:
	setTimeout(function() {
	  $(".panel").css({
		"transition": "cubic-bezier(.4,.95,.5,1.5) "+speed+"ms"
	  });
	}, 200);
  
	//Presets:
	$(".panel:not(:first)").addClass("right");
  
	//Swipe:
	function swipeScreen() {
	  $('.swipe').on('mousedown touchstart', function(e) {
  
		var touch = e.originalEvent.touches;
		var start = touch ? touch[0].pageX : e.pageX;
		var difference;
  
		$(this).on('mousemove touchmove', function(e) {
		  var contact = e.originalEvent.touches,
		  end = contact ? contact[0].pageX : e.pageX;
		  difference = end-start;
		});
  
		//On touch end:
		$(window).one('mouseup touchend', function(e) {
		  e.preventDefault();
  
		  //Swipe right:
		  if (active < itemsLength && difference < -tolerance) {
			$(".panel:nth-child("+active+")").addClass("left");
			$(".panel:nth-child("+(active+1)+")").removeClass("right");
			active += 1;
			btnDisable();
		  };
  
		  // Swipe left:
		  if (active > 1 && difference > tolerance) {
			$(".panel:nth-child("+(active-1)+")").removeClass("left");
			$(".panel:nth-child("+active+")").addClass("right");
			active -= 1;
			btnDisable();
		  };
  
		  $('.swipe').off('mousemove touchmove');
		});
  
	  });
	};
	swipeScreen();
  
	//Prevent swipe on interactive elements:
	interactiveElements.on('touchstart touchend touchup', function(e) {
	  e.stopPropagation();
	});
  
	//Buttons:
	$(".btn-prev").click(function(){
	  // Swipe left:
	  if (active > 1) {
		$(".panel:nth-child("+(active-1)+")").removeClass("left");
		$(".panel:nth-child("+active+")").addClass("right");
		active -= 1;
		btnDisable();
	  };
	});
  
	$(".btn-next").click(function(){
	  //Swipe right:
	  if (active < itemsLength) {
		$(".panel:nth-child("+active+")").addClass("left");
		$(".panel:nth-child("+(active+1)+")").removeClass("right");
		active += 1;
		btnDisable();
	  };
	});
  
	function btnDisable() {
	  if (active >= itemsLength) {
		$(".btn-next").prop("disabled", true);
		$(".btn-prev").prop("disabled", false);
	  }
	  else if (active <= 1) {
		$(".btn-prev").prop("disabled", true);
		$(".btn-next").prop("disabled", false);
	  }
	  else {
		$(".btn-prev, .btn-next").prop("disabled", false);
	  };
	};
  
  });

  //--------article-tab--------

//   $(function(){
// 	var $li = $('ul.tab-title-articlelist li');
// 		$($li .eq(0) .addClass('active').find('a').attr('href')).siblings('.ar-tab-inner').hide();
	
// 		$li.click(function(){
// 			$($(this).find('a'). attr ('href')).show().siblings ('.ar-tab-inner').hide();
// 			$(this).addClass('active'). siblings ('.active').removeClass('active');
// 		});
// 	});


//const a = ['第0項','第1項','第2項','第3項','第4項']
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

// $('.arpanelsData').css('transform',`translateX(-${idNumber*350}px)`);

// var idNumber = window.matchMedia("(max-width:375px)")


// function myFunction(x) {
// 	if (x.matches) { // If media query matches
// 	  document.body.style.backgroundColor = "yellow";
// 	} else {
// 	  document.body.style.backgroundColor = "pink";
// 	}
//   }
  
//   var x = window.matchMedia("(max-width: 700px)")
//   myFunction(x) // Call listener function at run time
//   x.addListener(myFunction) // Attach listener function on state changes
  