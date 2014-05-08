<?php
require_once( op_config( 'theme_includes' ) . '/metabox/wp-alchemy.php' );

$set_cpt = array();

if ( $sets = get_photochrom_set_pages() ) {
	foreach ( $sets as $page )
		$set_cpt[] = 'collection-' . $page->ID;
}

new WPAlchemy_MetaBox( array(
	'id' => 'photochrom-set',
	'title' => __( 'Organize Set', 'openframe' ),
	'types' => $set_cpt,
	'template' => op_config( 'theme_includes' ) . '/metabox/metabox-set.php',
	'init_action' => 'photochrom_metabox_set_enqueue'
) );

new WPAlchemy_MetaBox( array(
	'id' => 'photochrom-picks',
	'title' => __( 'Organize Picks', 'openframe' ),
	'template' => op_config( 'theme_includes' ) . '/metabox/metabox-picks.php',
	'hide_editor' => true,
	'include_template' => 'template-picks.php',
	'init_action' => 'photochrom_metabox_picks_enqueue'
) );

function photochrom_metabox_set_enqueue() {
	wp_enqueue_script( array( 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-cursor', 'jquery-ui-sortable' ) );
	wp_enqueue_media();
	wp_enqueue_script( 'media-upload' );
	wp_enqueue_script( 'photochrom-metabox-set-js', op_config( 'theme_includes_uri' ) . '/metabox/includes/metabox-set.js', '', op_theme_version );
	wp_localize_script( 'photochrom-metabox-set-js', 'photochrom_metabox_string', array( 'add' => __( 'Add Images To Set', 'openframe' ), 'no_caption' => __( 'No Caption', 'openframe' ), 'remove' => __( 'Remove', 'openframe' ) ) );
	wp_enqueue_style( 'photochrom-metabox-set-css', op_config( 'theme_includes_uri' ) . '/metabox/includes/metabox-set.css', '', op_theme_version );
}

function photochrom_metabox_picks_enqueue() {
	wp_enqueue_script( array( 'iris', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-cursor', 'jquery-ui-sortable' ) );
	wp_enqueue_media();
	wp_enqueue_script( 'media-upload' );
	wp_enqueue_script( 'photochrom-metabox-picks-js', op_config( 'theme_includes_uri' ) . '/metabox/includes/metabox-picks.js', '', op_theme_version );
	wp_localize_script( 'photochrom-metabox-picks-js', 'photochrom_metabox_string', array( 'add' => __( 'Assign Image To Slide', 'openframe' ), 'title' => __( 'Title', 'openframe' ), 'caption' => __( 'No Caption', 'openframe' ), 'remove' => __( 'Remove', 'openframe' ), 'shortcode' => __( 'Explore Set', 'openframe' ) ) );
	wp_enqueue_style( 'photochrom-metabox-picks-css', op_config( 'theme_includes_uri' ) . '/metabox/includes/metabox-picks.css', '', op_theme_version );
}
?>