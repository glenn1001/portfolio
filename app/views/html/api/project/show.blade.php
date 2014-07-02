@extends('layouts.master')

@section('content')
	<div class="inner">
		<div>
			<h1>{{$project->title}}</h1>
			<p>{{$project->body}}</p>
		</div>
		<a href="/project" class="btn">Terug naar overzicht</a>
	</div>
@endsection