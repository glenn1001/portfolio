@extends('layouts.master')

@section('content')
	<div class="inner">
		<h1>Projecten</h1>
		@foreach ($projects as $project)
			<div>
				<h2>{{$project->title}}</h2>
				<p>{{$project->body}}</p>
				<a href="/project/{{$project->id}}" class="btn">Bekijk project</a>
			</div>
		@endforeach
	</div>
@endsection