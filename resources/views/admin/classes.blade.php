@extends('layouts.admin')

@section('cssjs')
	@parent
	<link rel="stylesheet" href="/css/admin/classes.css">
@endsection

@section('page-content')
<h2 class="page-title">班级管理</h2>
<hr>
<div class="classes-wrapper row">

	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">班级 <a href="#new-group-modal" data-toggle="modal" data-target="#new-group-modal" class="pull-right"><i class="ion-android-add icon-md"></i></a></div>
			<div class="list-group group-list ajax-loading">
				<a href="javascript:;" data-id="0" data-group_id="" class="list-group-item">
					<span class="badge">0</span> 默认班级
				</a>
			</div>
		</div>
	</div>

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">默认班级</div>
	  		<table class="table">
		    	<thead>
		    		<tr>
		    			<th>id</th>
		    			<th>姓名</th>
		    			<th>学号</th>
		    			<th>微信号</th>
		    		</tr>	
		    	</thead>
		    	<tbody>
		    		<tr>
		    			<th>1</th>
		    			<th>陈仁义</th>
						<th>2012063040018</th>
						<th>owkfjdlsajfdsklfj</th>
		    		</tr>
		    	</tbody>
	  		</table>			
		</div>
	</div>

</div>
@endsection

@section('afterjs')
	<div class="modal fade" id="new-group-modal" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="gridSystemModalLabel">添加班级</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="class-name-label col-md-3 text-right">班级名称:</div>
							<div class="col-md-6"><input type="text" class="form-control"></div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="button" class="btn btn-primary">确认</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	@parent
	<script src="/js/admin/classes.js"></script>
@endsection