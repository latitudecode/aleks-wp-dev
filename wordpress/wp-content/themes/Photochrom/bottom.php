<?php if ( is_active_sidebar( 'photochrom-bottom' ) ) : ?>

<!-- bottombar -->
<section id="bottom" class="content">
	
	<!-- widgets -->
	<ul class="widgets columns one-fourth">
		
		<?php dynamic_sidebar( 'photochrom-bottom' ); ?>
		
	</ul>
	<!-- end: widgets -->
	
</section>
<!-- end: bottombar -->

<?php endif; ?>