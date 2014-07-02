@extends('layouts.master')

@section('content')
	<div class="inner">
		<h1>Pagina's</h1>
		@foreach ($pages as $page)
			<div>
				<h2>{{$page->title}}</h2>
				<p>{{$page->body}}</p>
				<a href="/page/{{$page->id}}" class="btn">Bekijk pagina</a>
			</div>
		@endforeach
	</div>
@endsection