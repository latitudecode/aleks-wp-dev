<?php
/* spot theme's post type */
function is_photochrom_post_type() {
	return strpos( get_post_type(), 'collection-' ) !== false;
}

/* get set pages list */
function get_photochrom_set_pages() {
	return get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'template-collection.php' ) );
}

/* get theme's good stuff */
function get_photochrom_list( $name, $id ) {
	$meta = get_post_meta( $id, 'photochrom-' . $name, true );
	return isset( $meta[ 'list' ] ) ? json_decode( $meta[ 'list' ] ) : array();
}

/* filter theme's good stuff */
function photochrom_set_get_images( $item ) {
	return $item->type == 'image';
}

/* get attachment address */
function photochrom_get_media_url( $id, $size ) {
	echo esc_url( ( $i = wp_get_attachment_image_src( $id, $size ) ) && is_array( $i ) ? reset( $i ) : null );
}

/* get google font name */
function photochrom_get_font_name( $url = null ) {
	return preg_replace( array( '!^http://fonts.googleapis.com/css\?!', '!(family=[^&:]+).*$!', '!family=!', '!\+!' ), array( '', '$1', '', ' ' ), $url );
}
?>