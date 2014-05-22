<?php

function get_pix_mitarbeiter_template_content($pix_content){
	return $pix_content;
}
		
		


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


		
		ob_start('get_pix_mitarbeiter_template_content');
			if($template != ''):
				if(file_exists(STYLESHEETPATH.'/mitarbeiter-templates/'.$template.'.php')):
					include(STYLESHEETPATH.'/mitarbeiter-templates/'.$template.'.php');
				else:
					include(UNIX_PIX_MITARBEITER_PATH.'/library/templates/default-shortcode.php');
				endif;
			else:
				include(UNIX_PIX_MITARBEITER_PATH.'/library/templates/default-shortcode.php');
			endif;	
		ob_end_flush();		

		$output = get_pix_mitarbeiter_template_content();
		
		return $output;
	}
	add_shortcode('mitarbeiter','pix_mitarbeiter_shortcode_handler');
	
		
endif;	
	

?>