function isEmpty( el ){
  return !$.trim(el.html())
}


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
		
		
		var icon = '<i class="dashicons dashicons-arrow-right-alt2"></i>';
		$user.find('h4').prepend(icon);
		
		$user.find('h4').each(function(){
			if(!isEmpty($(this).parent().find('.user-content'))){
				$(this).addClass('hasContent');
			}
		});
		
		if($user.data('trigger') === 'click'){
			$user.find('h4').click(function(e){
				if(!isEmpty($(this).parent().find('.user-content'))){
					$(this).parent().find('.user-content').slideToggle();
					$(this).find('i').toggleClass('open')
				}
			});
		} else if($user.data('trigger') === 'hover'){
			
			$user.hoverIntent(function(e){
				if(!isEmpty($(this).find('.user-content'))){
					$(this).find('.user-content').slideDown();
				}
			},function(){
				if(!isEmpty($(this).find('.user-content'))){
					$(this).find('.user-content').slideUp();
				}
			});
		}
	}

	
});