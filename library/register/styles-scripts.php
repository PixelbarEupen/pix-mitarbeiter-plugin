<?php 
	
	/*
	
		THIS FILE REGISTERS THE NECESSARY JS AND CSS FILES FOR USE WITH THIS PLUGIN.
		ADDITIONALLY, IT ENQUEUES THE JQUERY PLUGIN, IF IT ISNT ALREADY
	
	*/
	
if(!function_exists('pix_mitarbeiter_register_files')):
	
	//REGISTER NECESSARY FILES
	function pix_mitarbeiter_register_files(){	
		
		if ( get_option('include_css')){
			wp_register_style( 'mitarbeiter', HTTP_PIX_MITARBEITER_PATH.'/assets/css/mitarbeiter.css');
			wp_enqueue_style( 'mitarbeiter' );
		}
		
		if ( get_option('include_accordeon')){
			wp_enqueue_script( 'jquery' );
			wp_register_script( 'mitarbeiter', HTTP_PIX_MITARBEITER_PATH.'/assets/js/mitarbeiter.js');
			wp_enqueue_script( 'mitarbeiter' );
		}
		
	}
	add_action( 'wp_enqueue_scripts', 'pix_mitarbeiter_register_files', 100 );
	
endif;