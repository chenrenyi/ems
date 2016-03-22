@extends('layouts.admin')

@section('cssjs')
	@parent
	<link rel="stylesheet" href="/css/admin/notice.css">
@endsection

@section('page-content')
<h2 class="page-title">通知管理-新建通知 <a href="{{ URL('admin/notices/') }}" class="btn btn-success btn-sm">查看已发送通知</a></h2>
<hr>
<ul class="nav nav-tabs create-type">
 	<li role="presentation" class="active"><a href="#">文字</a></li>
  	<li role="presentation"><a href="#">图片</a></li>
 	<li role="presentation"><a href="#">图文</a></li>
</ul>
<div class="nav-tab-content">
	<div class="tab-panel active" id="notice-type-text">
		<div class="notice-range">
			<label>群发对象：</label>
			<select class="form-control">  
		  		<option value ="1">全部同学</option>  
		  		<option value ="2">一班</option>  
		  		<option value="3">二班</option>  
		  		<option value="4">三班</option>  
			</select>
		</div>
		<div class="wechat-editor">
			<div class="editor-content" contenteditable="true"></div>
			<div class="editor-tool-bar">
				<div class="editor-tip text-right" placeholder="hello">你还可以输入 <em>600</em> 字</div>
			</div>
		</div>
		<div class="button-bar">
			<button class="btn btn-success submit-reply"} >群发</button>
		</div>
	</div>

	<div class="tab-panel" id="notice-type-image">
		<div class="notice-range">
			<label>群发对象：</label>
			<select class="form-control">  
		  		<option value ="1">全部同学</option>  
		  		<option value ="2">一班</option>  
		  		<option value="3">二班</option>  
		  		<option value="4">三班</option>  
			</select>
		</div>
		<div class="wechat-editor">
			<div class="editor-content">
				<div></div>
			</div>
		</div>
	</div>

	<div class="tab-panel" id="notice-type-article">
	</div>
</div>



</div>
@endsection

@section('afterjs')
	@parent
	<script src="/js/admin/notice.js"></script>
@endsection