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
	        'show_on' => 'click'
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
		$output = ($accordeon == 'false') ? '<div class="alle-mitarbeiter no-accordeon">' : '<div class="alle-mitarbeiter">';

			if(isset($title)):
				$output .= '<h3>'.$title.'</h3>';
			endif;
		//THE LOOP
		$output .= '<div class="accordeon-wrapper">';
		while($mitarbeiter->have_posts()) : $mitarbeiter->the_post();
		
			$pos = wp_get_post_terms(get_the_ID(),'Position');
		
			$apu = ($accordeon_per_user == 'true') ? 'accorderon-per-user' : '';
			$trigger = ($show_on == 'hover') ? 'hover' : 'click';

			$output .= '<div class="mitarbeiter mitarbeiter-'.get_the_ID().' position-'.$pos[0]->slug.' '.$apu.'" data-trigger="'.$trigger.'">';
				
				if(get_field('pix_mitarbeiter_bild')):
					$output .= '<div class="image">';
						$large_img = wp_get_attachment_image_src(get_field('pix_mitarbeiter_bild'),'large');
						$medium_img = wp_get_attachment_image_src(get_field('pix_mitarbeiter_bild'),'medium');
						
						$output .= '<a href="'.$large_img[0].'" title="'.get_the_title().'">';
							$output .= '<img src="'.$medium_img[0].'" alt="'.get_the_title().'" / >';
						$output .= '</a>';
						
					$output .= '</div>';
				endif;
				
				$output .= '<h4>'.get_the_title().'</h4>';
				
				$output .= '<div class="user-content">';
					$filteroutput = '';
					if(get_field('pix_mitarbeiter_funktion')):
						$filteroutput .= '<p class="funktion">'.get_field('pix_mitarbeiter_funktion').'</p>';
					endif;
					
					if(get_field('pix_mitarbeiter_sonstiges')):
						$filteroutput .= '<p class="sonstiges">'.get_field('pix_mitarbeiter_sonstiges').'</p>';
					endif;
				
					if(get_field('pix_mitarbeiter_email')):
						$filteroutput .= '<a class="mail" href="mailto:'.encode_email_address(get_field('pix_mitarbeiter_email')).'" title="'.get_the_title().' '.__('eine Nachricht schreiben','Pix Mitarbeiter').'">';
							$filteroutput .= encode_email_address(get_field('pix_mitarbeiter_email'));
						$filteroutput .= '</a>';
					endif;
					
					if(get_field('pix_mitarbeiter_url')):
						$filteroutput .= '<a target="_blank" href="'.get_field('pix_mitarbeiter_url').'" title="'.get_field('pix_mitarbeiter_url').'">';
							$filteroutput .= get_field('pix_mitarbeiter_url');
						$filteroutput .= '</a>';
					endif;
					
					if(get_field('pix_mitarbeiter_number')):
						$filteroutput .= '<p class="phone">'.get_field('pix_mitarbeiter_number').'</p>';
					endif;
					
					$output .= apply_filters('pix_mitarbeiter_output',$filteroutput);
				$output .= '</div>';
				$output .= '<div class="clear"></div>';
			$output .= '</div>';
		endwhile;
		$output .= '</div>';
		$output .= '</div>';
		
		
		//RETURN OUTPUT VAR
		return $output;
	}
	add_shortcode('mitarbeiter','pix_mitarbeiter_shortcode_handler');
	
		
endif;	
	

?>