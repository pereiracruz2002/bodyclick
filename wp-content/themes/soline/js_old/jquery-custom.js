
$(document).ready(function(){
	$(window).scroll(function(){
		var scrt=$(document).scrollTop();
		if(scrt<142){
			scrt=142;
		}
		else{
			scrt=scrt+0;
		}
	
		$('.menuaco').animate({
			top:scrt+'px'}
		,{
			duration:500,queue:false}
		);
	});
	
	
	$('.notification .close').click(function(){
		$(this).parent().parent().animate({top:'25px',opacity:0},500,function(){
			$(this).slideUp();
		});
	});
	
	
	$('.menu-item').each(function(){
		var attr_class=$(this).find('h3').attr("class");
		var set_height=$(this).find('.menu-content').height();
		if(attr_class=='close'){
			$(this).find('.menu-overflow').height(0);
			$(this).find('.menu-content').css('marginTop',-set_height);
		}
	});


	$('.menu-item h3').click(function(){
		var speed=500;
		var set_height=$(this).parent().find('.menu-content').height();
		var attr_class=$(this).attr("class");
		if(attr_class=='close'){
			$(this).removeClass('close');
			$(this).addClass('open');
			$(this).parent().find('.menu-overflow').animate({height:set_height+'px'},speed);
	
			$(this).parent().find('.menu-content').animate({marginTop:'0'},speed);
		}
	
		if(attr_class=='open'){
			$(this).removeClass('open');
			$(this).addClass('close');
			$(this).parent().find('.menu-overflow').animate({height:'0px'},speed);
			$(this).parent().find('.menu-content').animate({marginTop:'-'+set_height},speed);
			$(this).parent().find('.close img').attr('src',base_url+'img/icon/m-close.png');
		}
	});


	$(".menu-content li a").hover(function(){
		$(this).animate({paddingLeft:'25px'},{queue:false,duration:250});
	},function(){
		$(this).animate({paddingLeft:'20px'},{queue:false,duration:250});
	});
	
	$(".fancybox").fancybox();
	
	$('.placeholder').focus(function(){
    var q = $(this)
    if(q.val() == 'Procurar...')
      q.addClass('ativo').val('')
  }).blur(function(){
    var q = $(this)
    if(q.val() == '')
      q.removeClass('ativo').val('Procurar...')
  });

});
