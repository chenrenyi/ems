
$(document).ready(function(){
	//左侧菜单显示隐藏
	$(".bg-nav-title").click(function(){
		$(this).next('ul').slideToggle('normal');
	});

	var elements = $(".nav-tab-content .tab-panel");
	for (var i = 0; i < elements.length; i++) {
		if(i == 0) {
			$(elements[i]).show();
		} else {
			$(elements[i]).hide();
		}
	};

	//菜单页切换
	$(".nav-tabs li").click(function () {

		//去掉所有li的active属性
    	var elements = $(".nav-tabs li");
    	for (var i = 0; i < elements.length; i++) {
    		$(elements[i]).removeClass("active");
    	};

    	//第几个菜单被点击了
    	var index = $(".nav-tabs li").index(this);
    	$(this).addClass("active");

    	//显示第index菜单项的内容
    	var elements = $(".nav-tab-content .tab-panel");
    	for (var i = 0; i < elements.length; i++) {
    		if(i == index) {
    			$(elements[i]).show();
    		} else {
    			$(elements[i]).hide();
    		}
    	};
 	});

	//左侧导航效果
	var elements = $(".sub-nav li");
	var currentTitle = $('.page-title').text();
	for (var i = 0; i < elements.length; i++) {
		var text = $(elements[i]).find('span').text();
		if(currentTitle.indexOf(text) != -1) {
			$(elements[i]).find('a').addClass('active');
		}
	};

});

//弹出消息
function message(text) {
	$('.notice-info').text(text);
	$('.notice-info').fadeIn(1000, function(){
		$('.notice-info').fadeTo(2000, 1, function(){
			$('.notice-info').fadeOut(1000);
		});
	});
}