@extends('layouts.admin')


@section('page-content')
<style type="text/css">
	.password-item-wrapper label{
		font-weight: normal;
	}
	.password-item-wrapper>p{
	    width: 200px;
	    margin-left: 60px;
	    padding: 10px;
	}
	input{
		width: 200px !important;
	}
</style>
<h2 class="page-title">修改密码</h2>
<hr>
<div class="password-item-wrapper">
	
	@if(isset($error))
	<p  class="bg-warning">{{ $error}}</p>
	@endif

	<form method="post" action="/admin/user/update" class="form-horizontal">
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">原密码：</label>
	    <div class="col-sm-10">
	      <input name="old_password" type="password" class="form-control" id="inputPassword3" placeholder="旧登录密码">
	    </div>
	  </div>

  	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">新密码：</label>
	    <div class="col-sm-10">
	      <input name="new_password" type="password" class="form-control" id="inputPassword3" placeholder="新的密码">
	    </div>
	  </div>

  	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">确认密码：</label>
	    <div class="col-sm-10">
	      <input name="re_password" type="password" class="form-control" id="inputPassword3" placeholder="重新输入新密码">
	    </div>
	  </div>

	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">提交</button>
	    </div>
	  </div>
	</form>

</div>
@endsection

