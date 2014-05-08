<?php while ( have_posts() ) : ?>

<?php the_post(); ?>

<?php if ( ! post_password_required() ) : ?>
	
	<?php
	if ( has_post_thumbnail() )
		get_template_part( 'part', 'intro' );
	?>
	
	<!-- content -->
	<div class="content narrow">
		
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
		
		<!-- meta -->
		<ul class="meta">
						
			<!-- author -->
			<li><?php printf( __( 'Written by %s', 'openframe' ), '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" title="' . esc_attr( sprintf( __( 'View posts by %s', 'openframe' ), get_the_author_meta( 'display_name' ) ) ) . '">' . get_the_author_link() . '</a>' ); ?></li>
			
			<!-- time -->
			<li><?php printf( __( 'Published on %s', 'openframe' ), '<time datetime="' . esc_attr( get_the_time( DATE_W3C ) ) . '">' . get_the_time( get_option('date_format') ) . '</time>' ); ?></li>
			
			<!-- tags -->
			<li><?php the_tags( __( 'Tagged as', 'openframe' ) . ' ' ); ?></li>
			
		</ul>
		<!-- end: meta -->
		
	</div>
	<!-- end: content -->
	
	<?php
	if ( comments_open() )
		comments_template();
	?>

<?php else : ?>
	
	<!-- content -->
	<div class="content narrow error">
		
		<h1>...</h1>
		
		<?php the_content(); ?>
	
	</div>
	<!-- end: content -->

<?php endif; ?>

<?php endwhile; ?>

<?php get_template_part( 'bottom' ); ?>