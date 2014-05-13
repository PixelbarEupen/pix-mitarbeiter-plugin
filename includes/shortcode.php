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
	        'sort_order' => 'DESC'
	    ), $atts ));
		
		//USE THESE ATTS IN THE ARGS FOR THE QUERY
		$args = array(
				'suppress_filters' => 0,
				'post_type' => 'mitarbeiter',
				'post_status' => 'publish',
				'numberposts'     => $limit,
				'order' => $sort_order,
				'orderby' => 'menu_order',
				'position' => $position
			);
		//THE QUERY
		$mitarbeiter = new WP_Query($args);
		
		//CERATE OUTPUT VAR
		$output = '<div class="alle-mitarbeiter">';
			if(isset($title)):
				$output .= '<h3>'.$title.'</h3>';
			endif;
		//THE LOOP
		while($mitarbeiter->have_posts()) : $mitarbeiter->the_post();
		
			$pos = wp_get_post_terms(get_the_ID(),'Position');
		

			$output .= '<div class="mitarbeiter mitarbeiter-'.get_the_ID().' position-'.$pos[0]->slug.'">';
				
				if(get_field('pix_mitarbeiter_bild')):
					$output .= '<div class="image">';
						$large_img = wp_get_attachment_image_src(get_field('pix_mitarbeiter_bild'),'large');
						$medium_img = wp_get_attachment_image_src(get_field('pix_mitarbeiter_bild'),'medium');
						
						$output .= '<a href="'.$large_img[0].'" title="'.get_the_title().'">';
							$output .= '<img src="'.$medium_img[0].'" alt="'.get_the_title().'" / >';
						$output .= '</a>';
						
					$output .= '</div>';
				endif;
				
				if(get_field('pix_mitarbeiter_funktion')):
					$output .= '<p class="funktion">'.get_field('pix_mitarbeiter_funktion').'</p>';
				endif;
				
				$output .= '<h4>'.get_the_title().'</h4>';
				
				if(get_field('pix_mitarbeiter_email')):
					$output .= '<a class="mail" href="mailto:'.encode_email_address(get_field('pix_mitarbeiter_email')).'" title="'.get_the_title().' '.__('eine Nachricht schreiben','Pix Mitarbeiter').'">';
						$output .= encode_email_address(get_field('pix_mitarbeiter_email'));
					$output .= '</a>';
				endif;
				
				if(get_field('pix_mitarbeiter_number')):
					$output .= '<p class="phone">'.get_field('pix_mitarbeiter_number').'</p>';
				endif;
				$output .= '<div class="clear"></div>';
			$output .= '</div>';
		endwhile;
		
		$output .= '</div>';
		
		
		//RETURN OUTPUT VAR
		return $output;
	}
	add_shortcode('mitarbeiter','pix_mitarbeiter_shortcode_handler');
	
		
endif;	
	

?>