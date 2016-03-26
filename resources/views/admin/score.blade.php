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
  		<div class="panel-heading">成绩录入</div>

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
	    		<tr>
	    			<th>1</th>
	    			<th>白小书</th>
	    			<th>2012063040012</th>
	    			<th>20</th>
	    			<th>10</th>
	    			<th>30</th>
	    			<th>40</th>
	    			<th>100</th>
	    		</tr>
	    	</tbody>
  		</table>
	</div>

</div>
@endsection

@section('afterjs')
	@parent
	<script src="/js/admin/score.js"></script>
@endsection