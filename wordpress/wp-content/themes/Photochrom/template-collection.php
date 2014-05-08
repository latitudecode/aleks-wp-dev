<?php /* template name: Photochrom Collection */ ?>

<?php get_header(); ?>

<?php
$photochrom_collection_args = array(
	'post_type' => 'collection-' . $post->ID,
	'posts_per_page' => op_theme_opt( 'set-number' ),
	'paged' => ( $i = get_query_var( 'paged' ) ) ? $i : 1
);
	
$photochrom_collection_query = new WP_Query( $photochrom_collection_args );
?>

<?php if ( ! post_password_required() ) : ?>

	<?php if ( $photochrom_collection_query->have_posts() ) : ?>
	
	<!-- content -->
	<div class="content">
		
		<!-- set list -->
		<ul id="collection">
			
			<?php while ( $photochrom_collection_query->have_posts() ) : ?>
			
			<?php $photochrom_collection_query->the_post(); ?>
			
			<?php get_template_part( 'part', 'set' ); ?>
			
			<?php endwhile; ?>
			
			<?php wp_reset_postdata(); ?>
			
		</ul>
		<!-- end: set list -->
		
		<?php if ( get_next_posts_link( false, $photochrom_collection_query->max_num_pages ) ) : ?>
	
		<!-- pagination -->
		<span class="more aligncenter">
	
			<!-- action -->
			<a href="<?php echo esc_url( next_posts( $photochrom_collection_query->max_num_pages, false ) ); ?>" class="action" title="<?php esc_attr_e( __( 'Load more Sets from this Collection', 'openframe' ) ); ?>" data-title="<?php esc_attr_e( __( 'Show More', 'openframe' ) ); ?>" data-wait="<?php esc_attr_e( __( 'Loading Sets..', 'openframe' ) ); ?>"></a>
		
		</span>
		<!-- end: pagination -->
		
		<?php endif; ?>
	
	</div>
	<!-- end: content -->
	
	<?php else : ?>
	
	<!-- content -->
	<div class="content narrow error">
		
		<h1>...</h1>
		
		<h3><?php _e( 'D&rsquo;oh!', 'openframe' ); ?></h3>
		
		<p><?php _e( 'Seems you were expecting to find something that doesn&rsquo;t exist. Happens to everyone.', 'openframe' ); ?></p>
		
		<p class="aligncenter"><a href="<?php echo admin_url( 'post-new.php?post_type=' . $photochrom_collection_args[ 'post_type' ] ) ?>" class="action"><?php _e( 'Create a new Set here', 'openframe'); ?></a></p>
	
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

<?php get_template_part( 'bottom' ); ?>

<?php get_footer(); ?>