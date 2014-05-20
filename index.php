<?php
	
	/*	
	Plugin Name: Pixelbar Mitarbeiter Plugin
	Author: Adrian Lambertz
	Description: Erweitert Wordpress um eine Mitarbeiter-Rubrik, in der einzelne Infos zu diesen eingegeben und im Frontend ausgegeben werden können.
	Plugin URI: https://github.com/PixelbarEupen/pix-mitarbeiter-plugin
	Version: 0.1.1
	
	*/
	
	
	/******************************************************************************************/
	/************************* DO NOT CHANGE ANYTHING AFTER THIS LINE *************************/
	
		//DEFINE PLUGIN HTTP PATH
	define('HTTP_PIX_MITARBEITER_PATH', plugins_url('pix-mitarbeiter-plugin',dirname(__FILE__)));
	
	//DEFINE PLUGIN UNIX PATH
	define('UNIX_PIX_MITARBEITER_PATH', dirname(__FILE__));
	
	//INCLUDE USED SCRIPTS AND STYLES
	include(UNIX_PIX_MITARBEITER_PATH.'/library/register/styles-scripts.php');

	//INCLUDE CUSTOM POST TYPE SCRIPT
	include(UNIX_PIX_MITARBEITER_PATH.'/library/register/mitarbeiter-post-type.php');

	//INCLUDE CUSTOM META BOX SCRIPT
	include(UNIX_PIX_MITARBEITER_PATH.'/library/register/metaboxes.php');
	
	//INCLUDE SHORTCODE HANDLER
	include(UNIX_PIX_MITARBEITER_PATH.'/library/output/shortcode.php');

	//INCLUDE BACKEND SCRIPT
	include(UNIX_PIX_MITARBEITER_PATH.'/library/admin/backend.php');
	
	
	
	
	
	
		
	?>