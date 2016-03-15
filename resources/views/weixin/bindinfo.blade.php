@extends('layouts.basic')

@section('title', '绑定姓名学号')

@section('cssjs')
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/weixin/bindinfo.css" rel="stylesheet">
@endsection

@section('content')
     <div class="container">

      <form action="{{ URL('weixin/saveinfo') }} method="POST" class="form-signin">
        <h2 class="form-signin-heading">绑定姓名学号</h2>
        <label for="inputEmail" class="sr-only">姓名</label>
        <input name="name" type="email" id="inputEmail" class="form-control" placeholder="姓名" required autofocus>
        <label for="inputPassword" class="sr-only">学号</label>
        <input name="number" type="password" id="inputPassword" class="form-control" placeholder="学号" required>
        <div class="checkbox">
          <label>
          请保证信息正确，绑定后不可再更改
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">确定</button>
      </form>

    </div> <!-- /container -->
@endsection
