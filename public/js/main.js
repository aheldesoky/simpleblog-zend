jQuery(function($) {
	$('.comments').hide();
	$('.post').hide();
	$('.post').animate( { "opacity": "show", top:"100"} , 1000 );
	$('a.view-comments').click(function(){
		$(this).hide();
		$('.comments').animate( { "opacity": "show", top:"100"} , 1000 );
	});
});

