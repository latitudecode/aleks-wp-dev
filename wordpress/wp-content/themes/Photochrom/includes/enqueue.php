<?php
/* theme's javascript */
function photochrom_enqueue_scripts() {
	
	wp_register_script( 'photochrom-plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), op_theme_version, 1 );
	wp_register_script( 'photochrom-start', get_template_directory_uri() . '/js/photochrom.start.js', array( 'photochrom-plugins' ), op_theme_version );
	wp_register_script( 'photochrom-picks', get_template_directory_uri() . '/js/photochrom.picks.js', array( 'photochrom-plugins' ), op_theme_version );
	wp_register_script( 'photochrom-blog', get_template_directory_uri() . '/js/photochrom.blog.js', array( 'photochrom-plugins' ), op_theme_version );
	wp_register_script( 'photochrom-single', get_template_directory_uri() . '/js/photochrom.single.js', array( 'photochrom-plugins' ), op_theme_version );
	wp_register_script( 'photochrom-collection', get_template_directory_uri() . '/js/photochrom.collection.js', array( 'photochrom-plugins' ), op_theme_version );
	wp_register_script( 'photochrom-set', get_template_directory_uri() . '/js/photochrom.set.js', array( 'photochrom-plugins' ), op_theme_version );
	wp_register_script( 'photochrom-mousewheel', get_template_directory_uri() . '/js/mousewheel.js', array( 'photochrom-plugins' ), op_theme_version, 1 );
	wp_register_script( 'photochrom-mini', get_template_directory_uri() . '/js/photochrom.mini.js', array( 'photochrom-plugins' ), op_theme_version, 1 );

	wp_enqueue_script( array( 'jquery', 'photochrom-plugins', 'photochrom-start' ) );
	
	if ( is_page_template( 'template-picks.php' ) )
		wp_enqueue_script( 'photochrom-picks' );
		
	if ( is_home() || is_archive() || is_search() )
		wp_enqueue_script( 'photochrom-blog' );
	
	if ( is_singular() && ! is_page_template( 'template-collection.php' ) && ! is_photochrom_post_type() )
		wp_enqueue_script( 'photochrom-single' );
	
	if ( is_page_template( 'template-collection.php' ) || is_photochrom_post_type() )
		wp_enqueue_script( array( 'photochrom-mousewheel', 'photochrom-mini' ) );
	
	if ( is_page_template( 'template-collection.php' ) )
		wp_enqueue_script( 'photochrom-collection' );
	
	if ( is_photochrom_post_type() ) {
		wp_localize_script( 'photochrom-set', 'ph_set_title', op_theme_opt( 'set-page-title' ) );
		wp_enqueue_script( 'photochrom-set' );		
	}

}

add_action( 'wp_enqueue_scripts', 'photochrom_enqueue_scripts' );

/* theme's fonts */
function photochrom_enqueue_fonts() {
	
	$fonts = array();
	$subsets = array();

	if ( $body = op_theme_opt( 'google-fonts-body' ) ) {
		$body = explode( '=', $body );
		if ( isset( $body[ 1 ] ) )
			$fonts[] = str_replace( '&subset', '', $body[ 1 ] );
		if ( isset( $body[ 2 ] ) )	
			$subsets = array_merge( $subsets, explode( ',', $body[ 2 ] ) );
	}
				
	if ( $headings = op_theme_opt( 'google-fonts-headings' ) ) {
		$headings = explode( '=', $headings );
		if ( isset( $headings [ 1 ] ) )
			$fonts[] = str_replace( '&subset', '', $headings[ 1 ] );
		if ( isset( $headings[ 2 ] ) )	
			$subsets = array_merge( $subsets, explode( ',', $headings[ 2 ] ) );
	}
	
	$subsets = array_unique( $subsets );
	
	wp_enqueue_style( 'photochrom-fonts', is_ssl() ? 'https' : 'http' . '://fonts.googleapis.com/css?family=' . join( '|', $fonts ) . '&subset=' . join( ',', $subsets ) );
	
}

if ( op_theme_opt( 'google-fonts') )
	add_action( 'wp_enqueue_scripts', 'photochrom_enqueue_fonts' );

?>