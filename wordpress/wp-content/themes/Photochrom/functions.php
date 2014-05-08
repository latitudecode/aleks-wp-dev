<?php
/*
*	editing this file may stop the theme from functioning correctly.
*
*/

/* openframe */
require_once( get_template_directory() . '/includes/config/start.php' );

/* theme setup */	
function photochrom_setup() {
			
	/* load current language */
	load_theme_textdomain( 'openframe', get_template_directory() . '/languages' );
	
	$locale_file = get_template_directory() . '/languages/' . get_locale() . '.php'; 	
	
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
	
	/* menus */
	register_nav_menu( 'primary', __( 'Navigation Menu', 'openframe' ) );
	
	register_nav_menu( 'secondary', __( 'Footer Menu', 'openframe' ) );
	
	/* features support */
	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'post-thumbnails' );
		
	/* image sizes */
	set_post_thumbnail_size( 480 );
	
	add_image_size( 'photochrom-small', null, 160 );
	
	add_image_size( 'photochrom-mini', null, 66 );
	
}

add_action( 'after_setup_theme', 'photochrom_setup' );

/* theme functions */
require_once( op_config( 'theme_includes' ) . '/helper.php' );

/* custom post types */
require_once( op_config( 'theme_includes' ) . '/custom-types.php' );

/* theme enqueues */
require_once( op_config( 'theme_includes' ) . '/enqueue.php' );

/* commentlist */
require_once( op_config( 'theme_includes' ) . '/commentlist.php' );

/* column shortcodes */
require_once( op_config( 'theme_includes' ) . '/shortcodes.php' );

/* metaboxes */
if ( is_admin() )
	require_once( op_config( 'theme_includes' ) . '/metabox/start.php');

/* sidebars */
function photochrom_widgets() {
	
	$sidebar = array(
		'name' => __( 'Bottom', 'openframe' ),
		'id' => 'photochrom-bottom',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	);
	
	register_sidebar( $sidebar );
	
}

add_action( 'widgets_init', 'photochrom_widgets' );

/* sets google fonts families */
function photochrom_google_fonts() {
	if ( $body = op_theme_opt( 'google-fonts-body' ) )
		echo '<style>.sans, body { font-family: "' . photochrom_get_font_name( $body ) . '", sans-serif; }</style>';		
	if ( $headings = op_theme_opt( 'google-fonts-headings' ) )
		echo '<style>h1, h2, blockquote p:before, blockquote p:after { font-family: "' . photochrom_get_font_name( $headings ) . '", serif; }</style>';
}

if ( op_theme_opt( 'google-fonts') )
	add_action( 'wp_head', 'photochrom_google_fonts' );

/* sets global background color */
add_action( 'wp_head', create_function( '', 'echo \'<style>html { background-color: \' . op_theme_opt( \'background-color\' ) . \'; }</style>\';' ) );

/* analytics code */
if ( op_theme_opt( 'analytics' ) )
	add_action( 'wp_head', create_function( '', 'echo op_theme_opt( \'analytics\' );' ) );

/* custom css code */
if ( op_theme_opt( 'css-code' ) )
	add_action( 'wp_head', create_function( '', 'echo \'<style>\' . op_theme_opt( \'css-code\' ) . \'</style>\';' ) );

/* custom jquery code */
if ( op_theme_opt( 'jquery-code' ) )
	add_action( 'wp_footer', create_function( '', 'echo \'<script>jQuery( document ).ready( function( $ ) { \' . op_theme_opt( \'jquery-code\' ) . \' } );</script>\';' ) );

/* content width */
if ( ! isset( $content_width ) )
	$content_width = 740;
	
function photochrom_content_width() {
	if ( is_page_template( 'template-wide.php' ) ) {
		global $content_width;
		$content_width = 1200;
	}
}

add_action( 'template_redirect', 'photochrom_content_width' );

/* adds theme classes to body */
function photochrom_body_class( $classes ) {
	if ( is_photochrom_post_type() && ! post_password_required() )
		$classes[] = 'focus';
	if ( is_photochrom_post_type() || is_page_template( 'template-picks.php' ) )
		$classes[] = 'full';
	return $classes;
}

add_filter( 'body_class', 'photochrom_body_class' );

/* search form */
function photochrom_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" ><input type="text" value="' . get_search_query() . '" placeholder="' . esc_attr( __( 'Search', 'openframe' ) ) . '" name="s" id="s" /></form>';
    return $form;
}

add_filter( 'get_search_form', 'photochrom_search_form' );

/* removes extra paragraphs and line breaks from shortcodes */
function photochrom_shortcodes_autop( $content ) {
    return strtr( $content, array( '<p>[' => '[', ']</p>' => ']', ']<br />' => ']', ']<br>' => ']' ) );
}

add_filter( 'the_content', 'photochrom_shortcodes_autop' );

/* removes wpadminbar */
if ( ! is_admin() )
	add_filter( 'show_admin_bar', create_function( '', 'return false;' ) );

/* update notifier */
if ( op_theme_opt( 'update-check' ) )
	op_version_check();
?>