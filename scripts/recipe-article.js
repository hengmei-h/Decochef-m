//--------recipe-tab-small--------

$(function(){
    var $li = $('ul.tab-title-recipecard li');
        $($li. eq(0) .addClass('active').find('a').attr('href')).siblings('.re-tab-inner').hide();
    
        $li.click(function(){
            $($(this).find('a'). attr ('href')).show().siblings ('.re-tab-inner').hide();
            $(this).addClass('active'). siblings ('.active').removeClass('active');
        });
    });

//--------recipe-tab-large--------

$(function(){
    var $li = $('ul.tab-recipecardlarge li');
        $($li. eq(0) .addClass('active').find('a').attr('href')).siblings('.relg-tab-inner').hide();
    
        $li.click(function(){
            $($(this).find('a'). attr ('href')).show().siblings ('.relg-tab-inner').hide();
            $(this).addClass('active'). siblings ('.active').removeClass('active');
        });
    });

      
  //--------article-tab--------

  $(function(){
	var $li = $('ul.tab-title-articlelist li');
		$($li .eq(0) .addClass('active').find('a').attr('href')).siblings('.ar-tab-inner').hide();
	
		$li.click(function(){
			$($(this).find('a'). attr ('href')).show().siblings ('.ar-tab-inner').hide();
			$(this).addClass('active'). siblings ('.active').removeClass('active');
		});
	});