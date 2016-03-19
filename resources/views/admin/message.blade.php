@extends('layouts.admin')

@section('cssjs')
	@parent
	<link rel="stylesheet" href="/css/admin/message.css">
@endsection

@section('page-content')
<h2 class="page-title">学生反馈</h2>
<hr>
<div class="message-item-wrapper">
	@foreach($messages as $msg)
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="media">
					<div class="media-left">
						<img src="{{ $msg['head'] }}" width="40px" class="media-object img-circle" src="">
					</div>
					<div class="media-body">
						<div class="media-heading row">
							<div class="col-md-6"><a href="#">{{ $msg['name'] }}</a></div>
							<div class="col-md-4">{{ $msg['time'] }}</div>
							@if(!isset($msg['reply']))
							<div class="col-md-2 text-right"><a href="javascript:;" class="replay-button"><i class="icon ion-ios-undo"></i>回复</a></div>
							@endif
						</div>
						<p>{{ $msg['content'] }}</p>
					</div>
				</div>

				<div class="replay-editor">
					<div class="wechat-editor">
						<div class="editor-content" contenteditable="true"></div>
						<div class="editor-tool-bar">
							<div class="editor-tip text-right">你还可以输入 <em>140</em> 字</div>
						</div>
					</div>
					<div class="button-bar">
							<button class="btn btn-success submit-reply" 'mid'={{ $msg['id'] }} >发送</button>
							<button class="btn btn-light collapse-editor">收起</button>
						</div>
				</div>

				@if(isset($msg['reply']))
				<div class="replay-container panel panel-default">
					<p><i class="ion-ios-chatboxes"></i>回复：{{ $msg['reply'] }}<span class="time">{{ $msg['reply_time'] }}</span></p>
				</div>
				@endif

			</div>
		</div>
	@endforeach

	<div id="piga">{!! $paginate !!}</div>
</div>
@endsection

@section('afterjs')
	@parent
	<script src="/js/admin/message.js"></script>
@endsection