@extends('layouts.admin')

@section('cssjs')
	@parent
	<link rel="stylesheet" href="/css/admin/score.css">
@endsection

@section('page-content')
<h2 class="page-title">成绩管理</h2>
<hr>
<div class="student-item-wrapper">
	<div class="panel panel-default">
 		<!-- Default panel contents -->
  		<div class="panel-heading">
  			<span>成绩录入</span>
			<div class="checkbox">
				<label>
					<input type="checkbox"> 成绩已录好，发布供公开查询
				</label>
			</div>
		</div>

  		<!-- Table -->
  		<table class="table">
	    	<thead>
	    		<tr>
	    			<th>id</th>
	    			<th>姓名</th>
	    			<th>学号</th>
	    			<th>平时成绩</th>
	    			<th>实验</th>
	    			<th>期中</th>
	    			<th>期末</th>
	    			<th>总分</th>
	    		</tr>	
	    	</thead>
	    	<tbody>
	    		@foreach($students as $student)
	    		<tr>
	    			<th>{{ $student->id }}</th>
	    			<th>{{ $student->name }}</th>
	    			<th>{{ $student->number }}</th>
	    			<th class="score" scoreid="1">
	    				<input type="text" class="hide" value="{{ $student->score->score1 }}">
	    				<span>{{ $student->score->score1 }}</span>
	    			</th>
	    			<th class="score" scoreid="2">
	    				<input type="text" class="hide" value="{{ $student->score->score2 }}">
	    				<span>{{ $student->score->score2 }}</span>
	    			</th>
	    			<th class="score" scoreid="3">
	    				<input type="text" class="hide" value="{{ $student->score->score3 }}">
	    				<span>{{ $student->score->score3 }}</span>
	    			</th>
	    			<th class="score" scoreid="4">
	    				<input type="text" class="hide" value="{{ $student->score->score4 }}">
	    				<span>{{ $student->score->score4 }}</span>
	    			</th>
	    			<th id="sumscore">
	    				<span>{{ $student->score->scoresum }}</span>
	    			</th>
	    		</tr>
	    		@endforeach
	    	</tbody>
  		</table>
	</div>

</div>
@endsection

@section('afterjs')
	@parent
	<script src="/js/admin/score.js"></script>
@endsection