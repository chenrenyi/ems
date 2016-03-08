@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑通知</div>

        <div class="panel-body">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>啊哦!</strong> 你的输入有以下问题，请检查并更正后重试 <br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error  }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ URL('admin/notices/'.$notice->id)  }}" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token()  }}">
            <input type="hidden" name="class" value="{{ $notice->class  }}">
            标题: <input type="text" name="title" class="form-control" required="required" value="{{ $notice->title  }}">
            <br>
            内容:
            <textarea name="content" rows="10" class="form-control" required="required">{{ $notice->content  }}</textarea>
            <br>
            摘要:
            <input type="text" name="summary" class="form-control" required="required" value="{{ $notice->summary  }}">
            <br>
            <button class="btn btn-lg btn-info">提交修改</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
