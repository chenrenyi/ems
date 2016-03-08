@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">管理通知</div>

        <div class="panel-body">

        <table class="table table-striped">
          <tr class="row">
            <th class="col-lg-2">标题</th>
            <th class="col-lg-4">内容</th>
            <th class="col-lg-4">发布时间</th>
            <th class="col-lg-1">编辑</th>
            <th class="col-lg-1">删除</th>
          </tr>
          @foreach ($notices as $notice)
            <tr class="row">
              <td class="col-lg-2">
                {{ $notice->title  }}
              </td>
              <td class="col-lg-6">
                {{ $notice->content  }}
              </td>
              <td class="col-lg-4">
                {{ $notice->created_at  }}
              </td>
              <td class="col-lg-1">
                <a href="{{ URL('admin/notices/'.$notice->id.'/edit')  }}" class="btn btn-success">编辑</a>
              </td>
              <td class="col-lg-1">
                <form action="{{ URL('admin/notices/'.$notice->id)  }}" method="POST" style="display: inline;">
                  <input name="_method" type="hidden" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token()  }}">
                  <button type="submit" class="btn btn-danger">删除</button>
                </form>
              </td>
            </tr>
          @endforeach
        </table>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection
