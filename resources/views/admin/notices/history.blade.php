<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/admin/noticelist.css">
</head>
<body>
	@foreach($notices as $notice)
		@if($notice->type == 1)
			<div class="notice notice-image">
				<p class="date">{{ $notice->created_at }}</p>
				<h1 class="title">{{ $notice->title }}</h1>
				<img src="/uploads/images/{{ $notice->cover }}">
				<p class="summary">{{ $notice->summary }}</p>
				<hr>
				<p><a href="/admin/notices/show/{{ $notice->id }}">阅读全文</a></p>
			</div>
		@else
			<div class="notice notice-text">
				<p class="date">{{ $notice->created_at }}</p>
				<p class="summary">{{ $notice->content }}</p>
			</div>
		@endif
	@endforeach

</body>	
</html>