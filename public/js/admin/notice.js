$(document).ready(function(){

	//你还剩下多少字可以输入
	$('#notice-type-text .editor-content').bind('focus keyup input paste',function(){
		content = this.innerText;
		$(this).next().find('em').text(600 - content.length);
	});

	//发送文字微信通知
	$("#send-text").click(function(){
		var text = $('#notice-type-text').find('.editor-content').text();
		var classval = $('#notice-type-text').find('select').val();
		console.log(text + classval);
		$.post(
			'/admin/notices/store',
			{
				type: 'text',
				content: text,
				class: classval
			},
			function(data) {
				if(data == 0) {
					$('#myModal').find('.modal-title').text('提示')
					$('#myModal').find('p').text('发送成功')
					$('#myModal').modal('show')
					$('#notice-type-text').find('.editor-content').text('');
				} else {
					$('#myModal').find('.modal-title').text('警告')
					$('#myModal').find('p').text('发送失败')
					$('#myModal').modal('show')
				}
			}
		);
	});
})