@extends('layouts.master')

@section('content')
	<div class="inner">
		<div>
			<h1>{{$social_media->title}}</h1>
			<img src="{{$social_media->icon}}" alt="{{$social_media->title}}" />
			<p>
				<a href="{{$social_media->url}}" target="_blank">{{$social_media->url}}</a>
			</p>
			<a href="/social_media" class="btn">Terug naar overzicht</a>
		</div>
	</div>
@endsection