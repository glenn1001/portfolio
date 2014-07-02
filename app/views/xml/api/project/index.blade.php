<?xml version="1.0" encoding="UTF-8"?>
<projects>
	@foreach ($projects as $project)
		<project>
			<id>{{$project->id}}</id>
			<image>{{$project->image}}</image>
			<title>{{$project->title}}</title>
			<body>{{$project->body}}</body>
			<meta>{{$project->meta}}</meta>
			<canonical>{{$project->canonical}}</canonical>
			<pos>{{$project->pos}}</pos>
			<active>{{$project->active}}</active>
			<menu>{{$project->menu}}</menu>
			<created_at>{{$project->created_at}}</created_at>
			<updated_at>{{$project->updated_at}}</updated_at>
		</project>
	@endforeach
</projects>