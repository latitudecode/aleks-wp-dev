<?php
/*
*	openframe
*	written by stefano giliberti (stfno@me.com),
*	opendept.net
*/

function op_get_version() {
	$last_cache = get_option( op_config( 'theme' ) . '_cache' );
	$last_time = get_option( op_config( 'theme' ) . '_cache_last' );
	if ( ! $last_time || ( time() - $last_time ) > 86400 ) {
		update_option( op_config( 'theme' ) . '_cache_last', time() );
		$xml = op_file_contents( op_config( 'theme_xml' ) );
		if ( $xml )	
			update_option( op_config( 'theme' ) . '_cache', $xml );
	}
	else if ( $last_cache ) {
		$xml = get_option( op_config( 'theme' ) . '_cache' );
	}
	if ( isset( $xml ) )
		return simplexml_load_string( $xml );
}

function op_version_notify() {
	$xml = op_get_version();
	if ( version_compare( $xml->version, op_theme_version, '>' ) )
		add_dashboard_page( op_config( 'theme_name' ), __( 'Theme Update', 'openframe' ), 'switch_themes', op_config( 'theme' ), 'op_version_page' );
}

if ( function_exists( 'simplexml_load_string' ) )
	add_action( 'admin_menu', 'op_version_notify' );  

function op_version_page() {
	$xml = op_get_version();
	?>
	
	<div class="wrap">
		<div id="icon-themes" class="icon32"></div>
		<h2 style="margin-bottom: .5em;"><strong><?php echo op_config( 'theme_name' ); ?></strong> <?php _e( 'Update', 'openframe' ); ?></h2>
		<h2><?php _e( 'Changes', 'openframe' ); ?></h2>
		<div><?php echo $xml->changes; ?></div>
		<div style="width: 50%; margin-top: 1em;">
		    <h2><?php _e( 'How do I update?', 'openframe' ); ?></h2>
		    <p><?php printf( __( 'Updating a theme is pretty much like installing it. Download it from ThemeForest.net, extract the .zip package, find the theme folder or the theme zip file. Now, if you do not know how to connect via FTP connection to your server, simply delete the current version of "%s" from WordPress and install the new one (Version %s). Otherwise, connect to your server, navigate to the WordPress themes folder and replace the whole theme folder with the new version.', 'openframe' ), op_config( 'theme_name' ), op_theme_version ); ?></p>
			<p><?php _e( 'Your themes path is:', 'openframe' ); ?> <code><?php echo get_theme_root(); ?></code></p>
		</div>
	</div>
	
	<?php
}

?>