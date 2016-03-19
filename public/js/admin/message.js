
$(document).ready(function(){

	var content;

	//点回复显示回复编辑器
	$(".replay-button").click(function(){
		$(this).parents("div.media").next().toggle();
	});

	//点收起收起回复编辑器
	$(".collapse-editor").click(function(){
		$(this).parents(".replay-editor").hide();
	});

	//你还剩下多少字可以输入
	$('.editor-content').bind('focus keyup input paste',function(){
		content = this.innerText;
		$(this).next().find('em').text(140 - content.length);
	});

	//提交评论
	$(".submit-reply").click(function(){
		var id = this.attributes[1].value;
		var that = $(this);

		if(content.length > 140 || content.length == 0) {
			alert('回复内容不能超过140字，不能为空');
			return;
		}

		$.post(
			'/admin/messages/reply',
			{
				id: id,
				content: content
			},
			function(data){
				if(data == 0) {
					that.parents('.replay-editor').hide();
					that.parents('.replay-editor').prev().find(".col-md-2").hide();
					var replyhtml = '<div class="replay-container panel panel-default"><p><i class="ion-ios-chatboxes"></i>回复：' + content + '<span class="time">刚刚</span></p></div>';
					that.parents('.replay-editor').after(replyhtml);
				} else {
					alert('保存失败');
				}
			}
		);
	});
 
});