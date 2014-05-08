<!-- set -->
<li id="set-<?php the_ID(); ?>">
	
	<?php if ( get_the_title() ) : ?>
	
	<!-- header -->
	<div class="set-info">
	
		<!-- title -->
		<h2 class="set-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<?php if ( op_theme_opt( 'set-date' ) ) : ?>
		
		<!-- time -->
		<span class="set-time"><time datetime="<?php esc_attr_e( get_the_time( DATE_W3C ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></span>
					
		<?php endif; ?>
	
	<!-- end: header -->
	</div>
	
	<?php endif; ?>
	
	<?php get_template_part( 'part', 'mini' ); ?>
		
</li>
<!-- end: set -->