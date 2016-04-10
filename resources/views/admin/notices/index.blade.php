@extends('layouts.admin')

@section('cssjs')
	@parent
	<link rel="stylesheet" href="/css/admin/notice.css">
@endsection

@section('page-content')
<h2 class="page-title">通知管理 <a href="{{ URL('admin/notices/create') }}" class="btn btn-success btn-sm">新建通知</a></h2>
<hr>
<div class="notice-item-wrapper">

	@foreach($notices as $notice)
		<div class="notice-item row">
			<div class="col-md-6">
				<img src={{$notice->cover ? '/uploads/images/'.$notice->cover : "/images/default.jpg" }}>
				@if($notice->type == 0)
				<p class="notice-content">[文字]{{ $notice->content }}</p>
				@else
				<p class="notice-content">[图文]<a style="color:inherit;"href="/notices/{{ $notice->id }}">{{ $notice->title }}</a></p>
				@endif
			</div>
			<div class="col-md-3">
				<p>{{ $notice->created_at }}</p>
				<p class="font-color-gray">全部学生</p>
			</div>
			<div class="col-md-3 font-color-gray text-right">发送完毕</div>
		</div>
	@endforeach

	<div id="piga">{!! $paginate !!}</div>
</div>
@endsection

@section('afterjs')
	@parent
	<script src="/js/admin/notice.js"></script>
@endsection