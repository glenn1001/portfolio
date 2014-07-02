@extends('layouts.master')

@section('content')
	<div class="inner">
		<div>
			<h1>{{$page->title}}</h1>
			<p>{{$page->body}}</p>
		</div>
	</div>
@endsection