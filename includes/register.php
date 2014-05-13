<?php 
	
	/*
	
		THIS FILE REGISTERS THE NECESSARY JS AND CSS FILES FOR USE WITH THIS PLUGIN.
		ADDITIONALLY, IT ENQUEUES THE JQUERY PLUGIN, IF IT ISNT ALREADY
	
	*/
	
if(!function_exists('pix_mitarbeiter_register_files')):
	
	//REGISTER NECESSARY FILES
	function pix_mitarbeiter_register_files(){	
		
		if ( get_option('include_css')){
			wp_register_style( 'mitarbeiter', plugins_url( '/css/mitarbeiter.css' , dirname(__FILE__ )));
			wp_enqueue_style( 'mitarbeiter' );
		}
		
	}
	add_action( 'wp_enqueue_scripts', 'pix_mitarbeiter_register_files', 100 );
	
endif;