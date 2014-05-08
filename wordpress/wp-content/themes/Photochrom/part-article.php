<!-- article -->
<li id="article-<?php the_ID(); ?>" <?php post_class( has_post_thumbnail() ? 'has-featured' : null ); ?>>
		
	<?php if ( has_post_thumbnail() ) : ?>
	
	<!-- figure -->
	<a href="<?php the_permalink(); ?>" class="post-figure">
	
		<!-- image -->		
		<?php the_post_thumbnail(); ?>
	
	</a>
	<!-- end: figure -->
	
	<?php endif; ?>
	
	<!-- info -->
	<div class="post-info">
		
		<!-- title -->
		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<?php if ( has_excerpt() ) : ?>
		
		<!-- excerpt -->
		<blockquote><?php the_excerpt(); ?></blockquote>
		
		<?php endif; ?>
		
		<!-- meta -->
		<ul class="meta">
			
			<!-- time -->
			<li><time datetime="<?php esc_attr_e( get_the_time( DATE_W3C ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></li>
			
			<!-- time -->
			<li><a href="<?php comments_link(); ?>"><?php comments_number( __( 'No Responses', 'openframe' ), __( '1 Response', 'openframe' ), __( '% Responses', 'openframe' ) ); ?></a></li>
			
		</ul>
		<!-- end: meta -->
	
	</div>
	<!-- end: info -->

</li>
<!-- end: article -->