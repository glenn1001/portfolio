@foreach ($pages as $page)
	<div>
		<h1>{{$page->title}}</h1>
		<p>{{$page->body}}</p>
	</div>
@endforeach