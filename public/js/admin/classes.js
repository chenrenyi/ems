
$(document).ready(function(){
	//
	$("#edit").click(function(){
		$('#class-name-input').removeClass('hide');
		$('#class-name-input').focus();
		$('#class-name').hide();
	});

	$("#class-name-input").blur(function(){
		$(this).addClass('hide');
		var val = $(this).val();
		$(this).next().text(val);
		$(this).next().show();

		var id = $('#classid').val();
		$.post(
			'/admin/classes/edit',
			{
				id: id,
				name: val
			},
			function(){
				message('更名成功');
			}
		);

	});


	$("#delete").click(function(){
		var id = $('#classid').val();
		$.post(
			'/admin/classes/delete',
			{
				id: id
			},
			function(){
				message('删除成功');
				location.replace('/admin/classes');
			}
		);

	});

	$('.change-class').change(function(){
		var studentid = $(this).parent().parent().children().first().text();
		var classid = $(this).val();
			$.post(
			'/admin/classes/move',
			{
				studentid: studentid,
				classid: classid
			},
			function(){
				message('移动班级成功');
			}
		);
	});

	$('.confirm').click(function(){
		var classname = $('.modal-input-content').val();
		var newclass = '<a href="javascript:;" class="list-group-item"><span class="badge">0</span> ' + classname + '</a>';
		$('#class-list').append(newclass);
		$.post(
			'/admin/classes/create',
			{
				name: classname
			},
			function(){
				message('新建班级成功');
			}
		);
	})

});