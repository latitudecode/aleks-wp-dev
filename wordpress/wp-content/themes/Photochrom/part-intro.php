<!-- intro -->
<section id="intro" class="fit">
	
	<!-- caption -->
	<figure>
		
		<!-- content -->
		<figcaption>
		
			<!-- title -->
			<h1><?php the_title(); ?></h1>
			
			<?php if ( has_excerpt() ) : ?>
			
			<!-- excerpt -->
			<blockquote><?php the_excerpt(); ?></blockquote>
			
			<?php endif; ?>
		
		</figcaption>
		<!-- end: content -->
		
	</figure>
	<!-- end: caption -->
	
	<!-- loading -->
	<span class="wait"><?php _e( 'Loading..', 'openframe' ); ?></span>
	
	<!-- image -->
	<?php the_post_thumbnail( 'full' ); ?>
	
</section>
<!-- end: intro -->