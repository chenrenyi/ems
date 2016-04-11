@extends('layouts.admin')

@section('cssjs')
	@parent
	<link rel="stylesheet" href="/css/admin/student.css">
@endsection

@section('page-content')
<h2 class="page-title">学生管理</h2>
<hr>
<div class="student-item-wrapper">
	<div class="panel panel-default">
 		<!-- Default panel contents -->
  		<div class="panel-heading">全部学生</div>

  		<!-- Table -->
  		<table class="table">
	    	<thead>
	    		<tr>
	    			<th>id</th>
	    			<th>姓名</th>
	    			<th>学号</th>
	    			<th>微信号</th>
	    			<th>班级</th>
	    			<th>关注时间</th>
	    		</tr>	
	    	</thead>
	    	<tbody>
	    		@foreach($students as $student)
		    		<tr>
		    			<th>{{ $student->id }}</th>
		    			<th class="name"><input type="text" class="hide" value="{{ $student->name }}"><span>{{ $student->name }}</span></th>
		    			<th class="number"><input type="text" class="hide" value="{{ $student->number }}"><span>{{ $student->number }}</span></th>
		    			<th>{{ $student->wid }}</th>
		    			<th>{{ $student->classes->name }}</th>
		    			<th>{{ $student->created_at }}</th>
		    		</tr>
	    		@endforeach
	    	</tbody>
  		</table>
	</div>

</div>
@endsection

@section('afterjs')
	@parent
	<script src="/js/admin/student.js"></script>
@endsection
