<!doctype html>
<html lang="nl">
<head>
	<title>{{isset($title) ? $title . ' - ' : ''}} Portfolio van Glenn Blom</title>

	<!-- jQuery -->
	<script type="text/javascript" src="/vendor/jquery-1.11.1.min.js"></script>

	<!-- jQuery UI -->
	<link rel="stylesheet" href="/vendor/jquery-ui-1.10.4/css/ui-lightness/jquery-ui-1.10.4.min.css">
	<script type="text/javascript" src="/vendor/jquery-ui-1.10.4/js/jquery-ui-1.10.4.min.js"></script>

	<!-- Scripts/styles site -->
	<link rel="stylesheet" href="/css/style.css">
	<script type="text/javascript" src="/js/main.js"></script>
</head>
<body>
	<div id="wrapper">
		<header>
			<nav class="inner">
				<ul>
					<li>
						<a href="/">Home</a>
					</li>
					<li>
						<a href="/project">Projecten</a>
						<ul>
							@foreach($nav->projects as $project)
							<li>
								<a href="/project/{{$project->id}}">{{$project->title}}</a>
							</li>
							@endforeach
						</ul>
					</li>
					@foreach($nav->pages as $page)
						<li>
							<a href="/page/{{$page->id}}">{{$page->title}}</a>
						</li>
					@endforeach
				</ul>
			</nav>
		</header>
		<div id="content">
			@yield("content")
		</div>
		<footer>
			<div class="inner">
				<div>
					<h3>Laatste 10 projecten</h3>
					<ul>
						@foreach($footer->projects as $project)
						<li>
							<a href="/project/{{$project->id}}">{{$project->title}}</a>
						</li>
						@endforeach
					</ul>
				</div>
				<div>
					<h3>Social media</h3>
					<ul>
						@foreach($footer->social_medias as $social_media)
						<li>
							<a href="{{$social_media->url}}" target="_blank">
								<img src="{{$social_media->icon}}" alt="{{$social_media->title}}" /> {{$social_media->title}}
							</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</footer>
	</div>
</body>
</html>
