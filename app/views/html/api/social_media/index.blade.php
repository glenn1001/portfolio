@extends('layouts.master')

@section('content')
	<div class="inner">
		<h1>Social media</h1>
		@foreach ($social_medias as $social_media)
			<div>
				<h2>{{$social_media->title}}</h2>
				<img src="{{$social_media->icon}}" alt="{{$social_media->title}}" />
				<p>
					<a href="{{$social_media->url}}" target="_blank">{{$social_media->url}}</a>
				</p>
				<a href="/social_media/{{$social_media->id}}" class="btn">Bekijk social media</a>
			</div>
		@endforeach
	</div>
@endsection

