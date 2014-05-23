<?php

		


if(!function_exists('pix_mitarbeiter_shortcode_handler')):
	
	function encode_email_address( $email ) {
	     $output = '';
	     for ($i = 0; $i < strlen($email); $i++) { 
	          $output .= '&#'.ord($email[$i]).';'; 
	     }
	     return $output;
	}
	
	
	
	function pix_mitarbeiter_shortcode_handler($atts){
		
		//EXTRACT SHORTCODE ATTS
		extract(shortcode_atts( array(
	        'title' => '',
	        'position' => '',
	        'limit' => -1,
	        'sort_order' => 'DESC',
	        'accordeon' => 'true',
	        'accordeon_per_user' => 'false',
	        'show_on' => 'click',
	        'template' => ''
	    ), $atts ));
		
		//USE THESE ATTS IN THE ARGS FOR THE QUERY
		$args = array(
				'suppress_filters' => 0,
				'post_type' => 'mitarbeiter',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'numberposts'     => $limit,
				'order' => $sort_order,
				'orderby' => 'menu_order',
				'position' => $position
			);
		//THE QUERY
		$mitarbeiter = new WP_Query($args);
		
		//CERATE OUTPUT VAR


		
			ob_start();
			if($template != ''):
				if(file_exists(STYLESHEETPATH.'/mitarbeiter-templates/'.$template.'.php')):
					include(STYLESHEETPATH.'/mitarbeiter-templates/'.$template.'.php');
				else:
					include(UNIX_PIX_MITARBEITER_PATH.'/library/templates/default-shortcode.php');
				endif;
			else:
				include(UNIX_PIX_MITARBEITER_PATH.'/library/templates/default-shortcode.php');
			endif;	


			return ob_get_clean();
		
	}
	add_shortcode('mitarbeiter','pix_mitarbeiter_shortcode_handler');
	
		
endif;	
	

?>