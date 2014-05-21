jQuery(document).ready(function($){
	
	var $wrapper	= $('.alle-mitarbeiter').not('.no-accordeon'),
		$title		= $wrapper.find('h3');
		$user		= $('.accorderon-per-user');
	
	$wrapper.addClass('mitarbeiter-accordeon');	
	if($wrapper.length !== 0){
		$title.click(function(e){
			$(this).toggleClass('active');
			$(this).parent().find('.accordeon-wrapper').slideToggle();
		
		});
	}
	
	
	if($user.length !== 0){
		$user.find('.user-content').hide();
		
		if($user.data('trigger') === 'click'){
			$user.find('h4').click(function(e){
				if(!$(this).parent().find('.user-content').is(':empty')){
					$(this).parent().find('.user-content').slideToggle();
				}
			});
		} else if($user.data('trigger') === 'hover'){
			
			$user.hoverIntent(function(e){
				if(!$(this).find('.user-content').is(':empty')){
					$(this).find('.user-content').slideDown();
				}
			},function(){
				if(!$(this).find('.user-content').is(':empty')){
					$(this).find('.user-content').slideUp();
				}
			});
		}
	}

	
});