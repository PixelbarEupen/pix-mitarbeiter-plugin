<?php
if(function_exists("register_field_group")):
	register_field_group(array (
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

endif;


?>