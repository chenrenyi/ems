
$(document).ready(function(){
	//
	$(".name").dblclick(function(){
		$(this).find('input').removeClass('hide');
		$(this).find('input')[0].focus();
		$(this).find('span').hide();
	});

	$(".name>input").blur(function(){
		$(this).addClass('hide');
		var val = $(this).val();
		$(this).next().text(val);
		$(this).next().show();

		var id = $(this).parent().parent().children().first().text();
		$.post(
			'/admin/students/update/name/' + id,
			{
				val: val
			},
			function(){
				message('保存成功');
			}
		);

	});

	$(".number").dblclick(function(){
		$(this).find('input').removeClass('hide');
		$(this).find('input')[0].focus();
		$(this).find('span').hide();
	});

	$(".number>input").blur(function(){
		$(this).addClass('hide');
		var val = $(this).val();
		$(this).next().text(val);
		$(this).next().show();

		var id = $(this).parent().parent().children().first().text();
		$.post(
			'/admin/students/update/number/' + id,
			{
				val: val
			},
			function(){
				message('保存成功');
			}
		);
	});

});