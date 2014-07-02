@foreach ($projects as $project)
	<div>
		<h1>{{$project->title}}</h1>
		<p>{{$project->body}}</p>
	</div>
@endforeach