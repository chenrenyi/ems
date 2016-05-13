
$(document).ready(function(){

	function addSection() {
		var html='<div class="row section"><div class="class-name-label col-md-2 text-right">开始节:</div><div class="col-md-2"><input name="section-start[]" class="modal-input-content form-control" type="text" ></div><div class="class-name-label col-md-2 text-right">结束节:</div><div class="col-md-2"><input name="section-end[]" class="modal-input-content form-control" type="text" ></div><div class="col-md-3"><select name="weekday[]" class="form-control"><option value="0">周一</option><option value="1">周二</option><option value="2">周三</option><option value="3">周四</option><option value="4">周五</option><option value="5">周六</option><option value="6">周日</option></select></div></div>';
		$(".addday-wrapper").before(html);		
	}

	$("#addday").click(function(){
		addSection();
	});

	
	$("#edit").click(function(){
		var data = JSON.parse($(this).parent().parent().find('.timetableid').attr('data'));
		$("[name='name']").val(data.id);
		$("[name='classid']").val(data.classid);
		$("[name='weekstart']").val(data.weekstart);
		$("[name='weekend']").val(data.weekend);
		$("[name='weekop']").val(data.weekop);

		$(".section").remove();

		var sections = JSON.parse(data.section);
		for(var i=0; i<sections.length; i++) {
			var section = sections[i];
			addSection();
			var sectiondiv = $(".section").last();
			sectiondiv.find("[name='section-start[]']").val(section.start);
			sectiondiv.find("[name='section-end[]']").val(section.end);
			sectiondiv.find("[name='weekday[]']").val(section.day);
		}

		$('#table-form').attr('action', '/admin/timetable/edit?id=' + data.id);

		$('#new-group-modal').modal('show');
	});


	$("#delete").click(function(){
		var id = $(this).parent().parent().find('.timetableid').html();
		$.post(
			'/admin/timetable/delete',
			{
				id: id
			},
			function(){
				location.replace('/admin/timetable');
			}
		);
	});
	

});