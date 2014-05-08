<?php get_header(); ?>

<?php while ( have_posts() ) : ?>

<?php the_post(); ?>

<?php
if ( has_post_thumbnail() )
	get_template_part( 'part', 'intro' );
?>

<!-- content -->
<div class="content <?php echo is_page_template( 'template-wide.php' ) ? 'wide' : 'narrow'; ?>">
	
	<?php if ( ! has_post_thumbnail() ) : ?>
	
	<!-- title -->
	<h1 class="post-title"><?php the_title(); ?></h1>
	
	<!-- separator -->
	<hr />
	
	<?php endif; ?>
	
	<!-- article -->
	<article id="article-<?php the_ID(); ?>" class="post-content clear">
		
		<?php the_content(); ?>
		
	</article>
	<!-- end: article -->
	
	<?php if ( $GLOBALS[ 'multipage' ] && ( $i = intval( $GLOBALS[ 'page' ] ) + 1 ) && $i <= $GLOBALS[ 'numpages' ] ) : ?>
	
	<!-- pagination -->
	<span class="more more-content aligncenter">
	
		<!-- action -->
		<a href="<?php echo esc_url( add_query_arg( 'page', $i, get_permalink() ) ); ?>" class="action" title="<?php esc_attr_e( __( 'Read the following page', 'openframe' ) ); ?>" data-title="<?php esc_attr_e( __( 'Continue', 'openframe' ) ); ?>" data-wait="<?php esc_attr_e( __( 'Loading Page..', 'openframe' ) ); ?>"></a>
	
	</span>
	<!-- end: pagination -->
	
	<?php endif; ?>
	
</div>
<!-- end: content -->

<?php endwhile; ?>

<?php
if ( ! post_password_required() && comments_open() )
	comments_template();
?>

<?php get_template_part( 'bottom' ); ?>

<?php get_footer(); ?>