<?php

/*

	THIS FILE CREATES THE BACKEND MENU ITEM AND THE REGISTERS THE USED SETTINGS.

*/


if(!function_exists('pix_mitarbeiter_menu')):
	
	function pix_mitarbeiter_menu(){
	    	//register menu element
	    	add_options_page('Mitarbeiter', 'Mitarbeiter', 'manage_options', 'mitarbeiter-menu', 'pix_mitarbeiter_options');
	    	
	    	//call register settings function
			add_action( 'admin_init', 'pix_mitarbeiter_register_settings' );
	}
	add_action('admin_menu','pix_mitarbeiter_menu');
	
endif;


if(!function_exists('pix_mitarbeiter_options')):	

	//this is the callback function from the menu element
	function pix_mitarbeiter_options(){
	    	include(UNIX_PIX_MITARBEITER_PATH.'/library/admin/options-page.php');
	    	
	}

endif;

	
if(!function_exists('pix_mitarbeiter_register_settings')):

	function pix_mitarbeiter_register_settings() {
	//register our settings
		register_setting( 'pix-mitarbeiter-settings', 'include_css' );
		register_setting( 'pix-mitarbeiter-settings', 'include_accordeon' );
	}

endif;