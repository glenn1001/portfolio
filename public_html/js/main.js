$(window).load(function() {
	// Navigation	
	$('li').hover(function() {
		$(this).find('ul').first().show();
	}, function() {
		$(this).find('ul').first().hide();
	});
});
