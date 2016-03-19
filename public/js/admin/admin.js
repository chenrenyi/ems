
$(document).ready(function(){
	//左侧菜单显示隐藏
	$(".bg-nav-title").click(function(){
		$(this).next('ul').slideToggle('fast');
	});

});