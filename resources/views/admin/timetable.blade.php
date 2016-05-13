@extends('layouts.admin')

@section('cssjs')
	@parent
	<link rel="stylesheet" href="/css/admin/timetable.css">
@endsection

@section('page-content')
<h2 class="page-title">课表管理</h2>
<hr>
<div class="classes-wrapper">

	<div class="panel panel-default">
		<div class="panel-heading">
			<span id="class-name">课表</span>
			<a id="add" href="#new-group-modal" data-toggle="modal" data-target="#new-group-modal"><span class="right ion-android-add icon-md"></span></a>
		</div>
  		<table class="table">
	    	<thead>
	    		<tr>
	    			<th>ID</th>
	    			<th>课程名</th>
	    			<th>班级</th>
	    			<th>时间</th>
	    			<th>操作</th>
	    		</tr>	
	    	</thead>
	    	<tbody>
	    		@foreach($timetables as $timetable)
	    		<tr>
	    			<th class="timetableid" data="{{ $timetable->sourceData() }}">{{ $timetable->id }}</th>
	    			<th>{{ $timetable->name }}</th>
	    			<th>{{ $timetable->classes->name }}</th>
	    			<th>{{ $timetable->sectionToString() }}</th>
	    			<th class="op">
	    				<a id="edit" href="javascript:"><span class="glyphicon glyphicon-pencil"></span></a>
	    				<a id="delete" href="javascript:"><span class="glyphicon glyphicon-trash"></span></a>
	    			</th>
	    		</tr>
	    		@endforeach
	    	</tbody>
  		</table>			
	</div>

</div>
@endsection

@section('afterjs')
	<div class="modal fade" id="new-group-modal" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog" role="document">
			<form id="table-form" action="/admin/timetable/add" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="gridSystemModalLabel">添加课程</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid timetable">
						<div class="row">
							<div class="class-name-label col-md-2 text-right">课程名称:</div>
							<div class="col-md-6"><input name="name" class="modal-input-content form-control" type="text" ></div>
							<div class="col-md-3">
								<select name="classid" class="form-control">
									@foreach($classes as $val)
									<option value="{{ $val->id }}">{{ $val->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row">
							<div class="class-name-label col-md-2 text-right">开始周:</div>
							<div class="col-md-2"><input name="weekstart" class="modal-input-content form-control" type="text" ></div>
							<div class="class-name-label col-md-2 text-right">结束周:</div>
							<div class="col-md-2"><input name="weekend" class="modal-input-content form-control" type="text" ></div>
							<div class="col-md-3">
								<select name="weekop" class="form-control">
									<option value="0">每周</option>
									<option value="1">单周</option>
									<option value="2">双周</option>
								</select>
							</div>
						</div>
						<div class="row section">
							<div class="class-name-label col-md-2 text-right">开始节:</div>
							<div class="col-md-2"><input name="section-start[]" class="modal-input-content form-control" type="text" ></div>
							<div class="class-name-label col-md-2 text-right">结束节:</div>
							<div class="col-md-2"><input name="section-end[]" class="modal-input-content form-control" type="text" ></div>
							<div class="col-md-3">
								<select name="weekday[]" class="form-control">
									<option value="0">周一</option>
									<option value="1">周二</option>
									<option value="2">周三</option>
									<option value="3">周四</option>
									<option value="4">周五</option>
									<option value="5">周六</option>
									<option value="6">周日</option>
								</select>
							</div>							
						</div>
						<div class="row addday-wrapper">
							<div class="col-md-2 text-right"><a id="addday" href="javascript::">添加一天</a></div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="submit" class="confirm btn btn-primary">确认</button>
				</div>
			</div><!-- /.modal-content -->
			</form>
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	@parent
	<script src="/js/admin/timetable.js"></script>
@endsection