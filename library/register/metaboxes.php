<?php

if(!function_exists("pix_mitarbeiter_field_args")):
	function pix_mitarbeiter_field_args($box_args){
	
		return apply_filters('pix_mitarbeiter_fields', $box_args = array (
			'id' => 'acf_mitarbeiter',
			'title' => 'Mitarbeiter',
			'fields' => array (
				array (
					'key' => 'field_53721893c01a8',
					'label' => 'Funktion',
					'name' => 'pix_mitarbeiter_funktion',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_53654qsoiacf6',
					'label' => 'Sonstiges',
					'name' => 'pix_mitarbeiter_sonstiges',
					'type' => 'text',
					'instructions' => 'Geben Sie hier sonstige Informationen ein.',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5371fc2dcacf5',
					'label' => 'Bild',
					'name' => 'pix_mitarbeiter_bild',
					'type' => 'image',
					'save_format' => 'id',
					'preview_size' => 'medium',
					'library' => 'all',
				),
				array (
					'key' => 'field_5371fc69cacf6',
					'label' => 'E-Mail Adresse',
					'name' => 'pix_mitarbeiter_email',
					'type' => 'text',
					'instructions' => 'Geben Sie hier die E-Mail Adresse des Mitarbeiters ein. Falls Sie keine eingeben wird auch keine auf der Website angezeigt.',
					'default_value' => '',
					'placeholder' => 'max.mustermann@emails.be',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_53621sdmpsdcf6',
					'label' => 'URL zu einer Website',
					'name' => 'pix_mitarbeiter_url',
					'type' => 'text',
					'instructions' => 'Geben Sie hier die URL zu einer Website ein.',
					'default_value' => '',
					'placeholder' => 'http://ihrewebsite.be',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5371fcb1cacf7',
					'label' => 'Telefonnummer',
					'name' => 'pix_mitarbeiter_number',
					'type' => 'text',
					'instructions' => 'Geben Sie hier die Telefonnummer des Mitarbeiters ein. Falls Sie keine eingeben wird auch keine auf der Website angezeigt.',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'mitarbeiter',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'acf_after_title',
				'layout' => 'default',
				'hide_on_screen' => array (
					0 => 'permalink',
					1 => 'the_content',
					2 => 'excerpt',
					3 => 'custom_fields',
					4 => 'discussion',
					5 => 'comments',
					6 => 'revisions',
					7 => 'slug',
					8 => 'author',
					9 => 'format',
					10 => 'featured_image',
					11 => 'tags',
					12 => 'send-trackbacks',
				),
			),
			'menu_order' => 0,
		));

	}

	if(!function_exists("pix_mitarbeiter_register_fields")):	
		function pix_mitarbeiter_register_fields(){
			if(function_exists("register_field_group")):
				register_field_group(pix_mitarbeiter_field_args($box_args));
			endif;
		}
		add_action('after_setup_theme','pix_mitarbeiter_register_fields');
	endif;
endif;


?>