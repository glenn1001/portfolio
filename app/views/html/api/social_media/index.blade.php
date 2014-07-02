@foreach ($social_medias as $social_media)
	<div>
		<h1>{{$social_media->title}}</h1>
		<p>{{$social_media->url}}</p>
	</div>
@endforeach