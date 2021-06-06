$(document).ready(function(){
	$('.outer-menu-item').hover(function(){
		$(this).find('.inner-menu').stop().slideToggle(500);
	}, function(){
		$(this).find('.inner-menu').hide();
	})
	$('.inner-menu').hover(function(){
		$(this).find('.inner-menu').show();
	}, function(){
		$(this).find('.inner-menu').hide();
	})
})
