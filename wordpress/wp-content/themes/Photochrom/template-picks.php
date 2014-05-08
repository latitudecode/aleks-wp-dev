<?php /* template name: Photochrom Picks */ ?>

<?php get_header(); ?>

<?php if ( ! post_password_required() ) : ?>
	
	<?php if ( $i = get_photochrom_list( 'picks', get_the_id() ) ) : ?>
	
	<!-- picks -->
	<div id="picks" class="fit">
		
		<?php if ( count( $i ) > 1 ) : ?>
		
		<!-- next -->
		<span class="skip"></span>
		
		<?php endif; ?>
			
		<!-- items list -->
		<ul>
			
			<?php foreach ( $i as $item ) : ?>
					
			<!-- item -->
			<li id="<?php esc_attr_e( $item->id ); ?>">
			
				<?php if ( $item->title || $item->caption || $item->link->url ) : ?>
				
				<!-- info -->
				<article <?php if ( $item->alignment ) echo 'class="' . esc_attr( $item->alignment ) . '"'; ?> <?php if ( $item->color ) echo 'style="color: ' . esc_attr( $item->color ) . ';"'; ?>>
				
					<!-- title -->
					<h2 class="cover-title"><?php echo $item->title; ?></h2>
					
					<?php if ( $item->title || $item->caption ) : ?>
					
					<!-- sep -->
					<hr <?php if ( $item->color ) echo 'style="background-color: ' . esc_attr( $item->color ) . ';"'; ?>/>
					
					<?php endif; ?>
					
					<!-- excerpt -->
					<span>
						
						<p><?php echo do_shortcode( $item->caption ); ?></p>
						
						<?php if ( $item->link->url ) : ?>
											
						<a href="<?php echo esc_url( $item->link->url ); ?>" class="action"><?php echo ( $i = $item->link->label ) ? $i : __( 'Explore Set', 'openframe' ); ?></a>
						
						<?php endif; ?>
						
					</span>
					<!-- end: excerpt -->
				
				</article>
				<!-- info -->
				
				<?php endif; ?>
				
				<!-- image -->
				<img src="<?php photochrom_get_media_url( $item->media, 'full' ); ?>" alt="<?php esc_attr_e( $item->id ); ?>" />
				
			</li>
			<!-- end: item -->
			
			<?php endforeach; ?>
		
		</ul>
		<!-- end: items list -->
		
		<!-- loading -->
		<span class="wait"><?php _e( 'Loading..', 'openframe' ); ?></span>
		
	</div>
	<!-- end: picks -->
	
	<?php else : ?>
	
	<!-- content -->
	<div class="content narrow error">
		
		<h1>...</h1>
		
		<h3><?php _e( 'D&rsquo;oh!', 'openframe' ); ?></h3>
		
		<p><?php _e( 'Seems you were expecting to find something that doesn&rsquo;t exist. Happens to everyone.', 'openframe' ); ?></p>
		
		<p class="aligncenter"><a href="<?php echo admin_url( 'post.php?post=' . get_the_id() . '&action=edit' ) ?>" class="action"><?php _e( 'Create a new Slide here', 'openframe'); ?></a></p>
	
	</div>
	<!-- end: content -->
	
	<?php endif; ?>

<?php else : ?>
	
	<!-- content -->
	<div class="content narrow error">
		
		<h1>...</h1>
		
		<?php the_content(); ?>
	
	</div>
	<!-- end: content -->

<?php endif; ?>

<?php get_footer(); ?>