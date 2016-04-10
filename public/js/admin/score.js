
$(document).ready(function(){
	//
	$(".score").dblclick(function(){
		$(this).find('input').removeClass('hide');
		$(this).find('input')[0].focus();
		$(this).find('span').hide();
	});

	$(".score>input").blur(function(){
		$(this).addClass('hide');
		var val = $(this).val();
		$(this).next().text(val);
		$(this).next().show();

		var studentid = $(this).parent().parent().children().first().text();
		var scoreid = $(this).parent().attr('scoreid');

		console.log(scoreid)
		$.post(
			'/admin/score/update',
			{
				studentid: studentid,
				scoreid: scoreid,
				val: val
			},
			function(){
				message('分数录入成功');
			}
		);

		var sum = 0;
		$('.score>span').each(function(i){
			sum += parseInt($(this).text());
		})
		$('#sumscore span').text(sum);
	});

});