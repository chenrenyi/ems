@extends('layouts.basic')

@section('title', $msg)

@section('content')
	<h2 style="text-align: center;">{{ $msg }}</h2>
	@if (isset($content))
	<p style="margin:10px;text-indent:2em;">{{ $content }}</p>
	@endif
@endsection
