<?php
$list = get_photochrom_list( 'set', get_the_id() );
$size = 'photochrom-mini';

if ( is_page_template( 'template-collection.php' ) ) {
	$size = 'photochrom-small';
	$count = op_theme_opt( 'set-mini-count' );
	if ( $count != '-1' )
		$list = array_slice( $list, 0, $count );
}
?>

<!-- miniatures -->
<ul class="mini">
	
	<?php foreach ( $list as $item ) : ?>
				
		<?php if ( $item->type == "image" ) : ?>
		
		<!-- image -->
		<li><a href="<?php the_permalink(); ?>#<?php echo $item->id; ?>" title="<?php esc_attr_e( $item->caption ); ?>"><?php echo wp_get_attachment_image( $item->media, $size ); ?></a></li>
		
		<?php elseif ( $item->type == "video" ) : ?>
			
		<?php
		$url = parse_url( esc_url( $item->url ) );
		
		if ( strpos( $url[ 'host' ], 'youtube.com' ) !== false || $url[ 'host' ] == 'youtu.be' ) {
			$host = 'youtube';
			$id = isset( $url[ 'query' ] ) ? str_replace( 'v=', null, str_replace( '&', null, $url[ 'query' ] ) ) : str_replace( '/', null, $url[ 'path' ] );			
		}
		else if ( strpos( $url[ 'host' ], 'vimeo.com' ) !== false ) {
			$host = 'vimeo';
			$id = str_replace( '/', null, $url[ 'path' ] );
		}
		?>
			
		<!-- video -->
		<li data-host="<?php esc_attr_e( $host ); ?>" data-id="<?php esc_attr_e( $id ); ?>"><a href="<?php the_permalink(); ?>#<?php echo $item->id; ?>" title="<?php esc_attr_e( $item->caption ); ?>"><img /></a></li>
		
		<?php endif; ?>
		
	<?php endforeach; ?>
	
</ul>
<!-- end: miniatures -->