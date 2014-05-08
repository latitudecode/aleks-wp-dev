<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

<!-- content -->
<div class="content">

	<!-- post list -->
	<ul id="post-list">
	
		<?php while ( have_posts() ) : ?>
					
		<?php the_post(); ?>
		
		<?php get_template_part( 'part', 'article' ); ?>
	
		<?php endwhile; ?>
		
	</ul>
	<!-- end: post list -->
	
	<?php if ( get_next_posts_link() ) : ?>

	<!-- pagination -->
	<span class="more aligncenter">

		<!-- action -->
		<a href="<?php echo esc_url( next_posts( $wp_query->max_num_pages, false ) ); ?>" class="action" title="<?php esc_attr_e( __( 'Load More Articles', 'openframe' ) ); ?>" data-title="<?php esc_attr_e( __( 'Show More', 'openframe' ) ); ?>" data-wait="<?php esc_attr_e( __( 'Loading Articles..', 'openframe' ) ); ?>"></a>
	
	</span>
	<!-- end: pagination -->
	
	<?php endif; ?>

</div>
<!-- end: content -->

<?php else : ?>

<!-- content -->
<div class="content narrow error">
	
	<h1>...</h1>
	
	<h3><?php _e( 'Embarrassing, isn&rsquo;t it?', 'openframe' ); ?></h3>
	
	<p><?php _e( 'We could not find what you were looking for. Our fault. Perhaps searching can help:', 'openframe' ); ?></p>
	
	<?php get_search_form(); ?>

</div>
<!-- end: content -->

<?php endif; ?>

<?php get_template_part( 'bottom' ); ?>

<?php get_footer(); ?>