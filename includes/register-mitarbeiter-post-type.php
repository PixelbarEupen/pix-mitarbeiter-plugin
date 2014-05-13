<?php
	
		/*
		
			THIS FILE IS REGISTERS THE POST TYPE INCL. CUSTOM TAXONOMY			
		*/
		
	


//POST TYPE			
if ( ! function_exists('pix_register_mitarbeiter_type') ):

	// Register Custom Post Type
	function pix_register_mitarbeiter_type() {
	
		$labels = array(
			'name'                => _x( 'Mitarbeiter', 'Post Type General Name', 'Pixelbar Mitarbeiter Plugin' ),
			'singular_name'       => _x( 'Mitarbeiter', 'Post Type Singular Name', 'Pixelbar Mitarbeiter Plugin' ),
			'menu_name'           => __( 'Mitarbeiter', 'Pixelbar Mitarbeiter Plugin' ),
			'parent_item_colon'   => __( 'Übergeordneter Mitarbeiter', 'Pixelbar Mitarbeiter Plugin' ),
			'all_items'           => __( 'Alle Mitarbeiter', 'Pixelbar Mitarbeiter Plugin' ),
			'view_item'           => __( 'Mitarbeiter ansehen', 'Pixelbar Mitarbeiter Plugin' ),
			'add_new_item'        => __( 'Neuen Mitarbeiter hinzufügen', 'Pixelbar Mitarbeiter Plugin' ),
			'add_new'             => __( 'Neuer Mitarbeiter', 'Pixelbar Mitarbeiter Plugin' ),
			'edit_item'           => __( 'Mitarbeiter anpassen', 'Pixelbar Mitarbeiter Plugin' ),
			'update_item'         => __( 'Mitarbeiter aktualisieren', 'Pixelbar Mitarbeiter Plugin' ),
			'search_items'        => __( 'Mitarbeiter suchen', 'Pixelbar Mitarbeiter Plugin' ),
			'not_found'           => __( 'Keinen Mitarbeiter gefunden.', 'Pixelbar Mitarbeiter Plugin' ),
			'not_found_in_trash'  => __( 'Keinen Mitarbeiter im Papierkorb gefunden.', 'Pixelbar Mitarbeiter Plugin' ),
		);
		$args = array(
			'label'               => __( 'mitarbeiter', 'Pixelbar Mitarbeiter Plugin' ),
			'description'         => __( 'Mitarbeiter Post Typ für die Benutzung von Werbung auf der Website.', 'Pixelbar Mitarbeiter Plugin' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'custom-fields', ),
			'taxonomies'          => array( 'Position' ),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-businessman',
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'rewrite'             => false,
			'capability_type'     => 'post',
		);
		register_post_type( 'mitarbeiter', $args );
	
	}

	// Hook into the 'init' action
	add_action( 'init', 'pix_register_mitarbeiter_type', 0 );

endif;


//TAXONOMY
if ( ! function_exists( 'pix_register_position_taxonomy' ) ) :

	// Register Custom Taxonomy
	function pix_register_position_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Position', 'Taxonomy General Name', 'Pixelbar Mitarbeiter Plugin' ),
			'singular_name'              => _x( 'Position', 'Taxonomy Singular Name', 'Pixelbar Mitarbeiter Plugin' ),
			'menu_name'                  => __( 'Positionen', 'Pixelbar Mitarbeiter Plugin' ),
			'all_items'                  => __( 'Alle Positionen', 'Pixelbar Mitarbeiter Plugin' ),
			'parent_item'                => __( 'Übergeordnete Position', 'Pixelbar Mitarbeiter Plugin' ),
			'parent_item_colon'          => __( 'Übergeordnet', 'Pixelbar Mitarbeiter Plugin' ),
			'new_item_name'              => __( 'Neue Position', 'Pixelbar Mitarbeiter Plugin' ),
			'add_new_item'               => __( 'Neue Position', 'Pixelbar Mitarbeiter Plugin' ),
			'edit_item'                  => __( 'Position bearbeiten', 'Pixelbar Mitarbeiter Plugin' ),
			'update_item'                => __( 'Position aktualisieren', 'Pixelbar Mitarbeiter Plugin' ),
			'separate_items_with_commas' => __( 'Trenne einzelnen Positionen mit einem Komma', 'Pixelbar Mitarbeiter Plugin' ),
			'search_items'               => __( 'Position suchen', 'Pixelbar Mitarbeiter Plugin' ),
			'add_or_remove_items'        => __( 'Position hinzufügen oder entfernen', 'Pixelbar Mitarbeiter Plugin' ),
			'choose_from_most_used'      => __( 'Wähle aus den meist genutzte Position', 'Pixelbar Mitarbeiter Plugin' ),
			'not_found'                  => __( 'Keine Position gefunden', 'Pixelbar Mitarbeiter Plugin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => false,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => false,
		);
		register_taxonomy( 'Position', array( 'mitarbeiter' ), $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'pix_register_position_taxonomy', 0 );

endif;