@extends('layouts.basic')

@section('title', '微信教学管理系统')

@section('cssjs')
	<link rel="stylesheet" href="/css/admin/admin.css">
	<link rel="stylesheet" href="/css/iosicon.css">
@endsection

@section('content')
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">微信教学管理系统</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/">功能管理</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="icon glyphicon glyphicon-user"></span>chenrenyi<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/auth/logout">注销</a></li>
							</ul>
						</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container main-container">
		<div class="mainwrapper">
			<nav id="sidebar-nav">
				<ul class="list-nav">
					<li class="nav-group">
						<a href="#" class="bg-nav bg-nav-title">
							<i class="ion-ios-chatboxes"></i>
							<span>消息</span>
							<i class="ion-ios-arrow-down"></i>
						</a>
						<ul class="sub-nav">
							<li>
								<a href="{{ URL('admin/messages') }}" class="bg-nav"><span>学生反馈</span></a>
							</li>
							<li>
								<a href="{{ URL('admin/notices') }}" class="bg-nav"><span>通知管理</span></a>
							</li>
						</ul>
					</li>

					<li class="nav-group">
						<a href="#" class="bg-nav bg-nav-title">
							<i class="ion-ios-keypad"></i>
							<span>功能</span>
							<i class="ion-ios-arrow-down"></i>
						</a>
						<ul class="sub-nav">
							<li>
								<a href="{{ URL('/admin/students') }}" class="bg-nav"><span>学生管理</span></a>
							</li>
							<li>
								<a href="{{ URL('/admin/classes') }}" class="bg-nav"><span>班级管理</span></a>
							</li>
							<li>
								<a href="{{ URL('/admin/score') }}" class="bg-nav"><span>成绩管理</span></a>
							</li>
							<li>
								<a href="#" class="bg-nav"><span>课表管理</span></a>
							</li>
						</ul>
					</li>

					<li class="nav-group">
						<a href="#" class="bg-nav bg-nav-title">
							<i class="ion-gear-a"></i>
							<span>设置</span>
							<i class="ion-ios-arrow-down"></i>
						</a>
						<ul class="sub-nav">
							<li>
								<a href="{{ URL('/admin/user') }}" class="bg-nav"><span>修改密码</span></a>
							</li>
						</ul>
					</li>

				</ul>
			</nav>

			<div class="container content-container">


				@yield('page-content')

			</div>
		</div>
	</div>

	<div class="foot">
		<p>Developed By Chenrenyi. ©  2016 All Rights Reserved.</p>
	</div>

	<!-- Small modal -->
	<div id="myModal" class="modal fade">
		<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title">title</h4>
	      		</div>
	      		<div class="modal-body">
	        		<p>content</p>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">确认</button>
	      		</div>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->	

	<p class="bg-primary notice-info"></p>

@endsection

@section('afterjs')
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/admin/admin.js"></script>
@endsection