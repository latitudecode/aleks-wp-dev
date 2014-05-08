<?php foreach ( get_photochrom_list( 'set', get_the_id() ) as $item ) : ?>
			
<!-- item -->
<li id="<?php esc_attr_e( $item->id ); ?>" data-caption="<?php esc_attr_e( $item->caption ); ?>" data-li="<?php esc_attr_e( $item->type ); ?>">
	
	<!-- media item -->
	<figure>
	
		<?php if ( $item->type == "image" ) : ?>
		
		<!-- picture --> 
		<img src="<?php photochrom_get_media_url( $item->media, op_theme_opt( 'set-resolution' ) ); ?>" alt="<?php esc_attr_e( $item->id ); ?>" />
	
		<?php elseif ( $item->type == "video" ) : ?>
		
		<?php $url = parse_url( esc_url( $item->url ) ); ?>
		
		<!-- video -->
		<div class="video-frame">
			
			<?php if ( strpos( $url[ 'host' ], 'youtube.com' ) !== false || $url[ 'host' ] == 'youtu.be' ) : ?>
	
			<!-- youtube -->
			<iframe id="<?php esc_attr_e( $item->id ); ?>-frame" width="853" height="480" src="http://www.youtube.com/embed/<?php echo isset( $url[ 'query' ] ) ? str_replace( 'v=', null, str_replace( '&', null, $url[ 'query' ] ) ) : str_replace( '/', null, $url['path'] ); ?>?enablejsapi=1" frameborder="0" allowfullscreen></iframe>
			
			<?php elseif ( strpos( $url['host'], 'vimeo.com' ) !== false ) : ?>
				
			<!-- vimeo -->
			<iframe id="<?php esc_attr_e( $item->id ); ?>-frame" width="853" height="480" src="http://player.vimeo.com/video/<?php echo str_replace( '/', null, $url[ 'path' ] ); ?>?api=1" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
			
			<?php endif; ?>
			
		</div>
		<!-- end: video -->
		
		<?php endif; ?>
	
	</figure>
	<!-- end: media item -->
	
</li>
<!-- end: item -->

<?php endforeach; ?>

<?php if ( op_theme_opt( 'set-end' ) ) : ?>
				
<!-- item -->
<li id="<?php esc_attr_e( sanitize_title( get_the_title() ) ); ?>">
	
	<!-- media item -->
	<figure>
		
		<!-- card -->
		<div class="card">
		
			<!-- drama -->
			<h1><?php _e( 'End <strong>of</strong> Set', 'openframe' ); ?></h1>
			
			<?php if ( ( $i = get_previous_post() ) && $list = array_slice( array_filter( get_photochrom_list( 'set', $i->ID ), 'photochrom_set_get_images' ), 0, 3 ) ) : ?>
								
			<!-- message -->
			<p><?php _e( 'Check Out', 'openframe' ); ?></p>
			
			<!-- button -->
			<a href="<?php echo get_permalink( $i->ID ); ?>">
																
				<?php foreach ( $list as $item ) : ?>
				
				<!-- picture -->
				<img src="<?php photochrom_get_media_url( $item->media, 'photochrom-mini' ); ?>" title="<?php esc_attr_e( $item->caption ); ?>" alt="<?php esc_attr_e( $item->id ); ?>" />
				
				<?php endforeach; ?>
		
			</a>
			<!-- end: button -->
			
			<?php endif; ?>
			
		</div>
		<!-- end: card -->
	
	</figure>
	<!-- end: media item -->
	
</li>
<!-- end: item -->

<?php endif; ?>