jQuery(document).ready(function($){
	
	var $wrapper	= $('.alle-mitarbeiter').not('.no-accordeon'),
		$title		= $wrapper.find('h3');
	
	$wrapper.addClass('mitarbeiter-accordeon');
		
	$title.click(function(e){
		$(this).toggleClass('active');
		$(this).parent().find('.accordeon-wrapper').slideToggle();
	
	});
	
});