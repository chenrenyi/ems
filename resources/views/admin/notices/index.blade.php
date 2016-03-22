@extends('layouts.admin')

@section('cssjs')
	@parent
	<link rel="stylesheet" href="/css/admin/notice.css">
@endsection

@section('page-content')
<h2 class="page-title">通知管理 <a href="{{ URL('admin/notices/create') }}" class="btn btn-success btn-sm">新建通知</a></h2>
<hr>
<div class="notice-item-wrapper">

	<div class="notice-item row">
		<div class="col-md-6">
			<img src="/images/default.jpg">
			<p class="notice-content">[文字]吓死我了</p>
		</div>
		<div class="col-md-3">
			<p>2015年12月30号</p>
			<p class="font-color-gray">全部学生</p>
		</div>
		<div class="col-md-3 font-color-gray text-right">发送完毕</div>
	</div>

	<div class="notice-item row">
		<div class="col-md-6">
			<img src="/images/default.jpg">
			<p class="notice-content">[文字]吓死我了</p>
		</div>
		<div class="col-md-3">
			<p>2015年12月30号</p>
			<p class="font-color-gray">全部学生</p>
		</div>
		<div class="col-md-3 font-color-gray text-right">发送完毕</div>
	</div>


	<div id="piga"></div>
</div>
@endsection

@section('afterjs')
	@parent
	<script src="/js/admin/notice.js"></script>
@endsection