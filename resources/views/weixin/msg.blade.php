@extends('layouts.basic')

@section('title', $msg)

@section('content')
	<h2 style="text-align: center;">{{ $msg }}</h2>
	<p>{{ $content }}</p>
@endsection
