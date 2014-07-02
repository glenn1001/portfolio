<?xml version="1.0" encoding="UTF-8"?>
<pages>
	@foreach ($pages as $page)
		<page>
			<id>{{$page->id}}</id>
			<image>{{$page->parent_id}}</image>
			<title>{{$page->title}}</title>
			<body>{{$page->body}}</body>
			<meta>{{$page->meta}}</meta>
			<canonical>{{$page->canonical}}</canonical>
			<pos>{{$page->pos}}</pos>
			<active>{{$page->active}}</active>
			<menu>{{$page->menu}}</menu>
			<created_at>{{$page->created_at}}</created_at>
			<updated_at>{{$page->updated_at}}</updated_at>
		</page>
	@endforeach
</pages>