<?php
/* custom post types */
function photochrom_cpt() {

	$pages = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'template-collection.php' ) );
	
	foreach ( $pages as $page ) {
				
		$args = array(
			'labels' => array(
				'menu_name' => $page->post_title,
				'name' => __( 'Your Sets', 'openframe' ),
				'add_new' => __( 'Create', 'openframe' ),
				'add_new_item' => __( 'New Set', 'openframe' ),
				'edit_item' => __( 'Organize Set', 'openframe' ),
				'all_items' => __( 'Browse', 'openframe' )
			),
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => ( op_theme_opt( 'set-wp-ui' ) != false ),
			'menu_position' => 20,
			'query_var' => true,
			'capability_type' => 'page',
			'exclude_from_search' => true,
			'supports' => array( 'title' ),
			'rewrite' => array( 'slug' => $page->post_name )
		);
	  	
		register_post_type( 'collection-' . $page->ID, $args );
		
	}
			
}

add_action( 'init', 'photochrom_cpt' );
add_action( 'after_switch_theme', create_function( '', 'flush_rewrite_rules();' ) );
?>