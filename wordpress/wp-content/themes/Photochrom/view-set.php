<?php if ( ! post_password_required() ) : ?>

	<!-- media items -->
	<div id="set">
		
		<?php if ( op_theme_opt( 'set-hat' ) ) : ?>
		
		<!-- info bar -->
		<header class="hat">
			
			<!-- count -->
			<div class="of"><?php printf( __( '%s of %s', 'openframe' ), '<span class="index"></span>', '<span class="total">' ); ?></div>
			
			<!-- title -->
			<span class="caption"></span>
			
			<!-- next button -->
			<span class="skip"></span>
			
		</header>
		<!-- end: info bar -->
		
		<?php endif; ?>
		
		<!-- north sensor -->
		<div class="hot"></div>
		
		<!-- south sensor -->
		<div class="cold"></div>
		
		<!-- next button -->
		<span class="next"></span>
		
		<!-- prev button -->
		<span class="prev"></span>
		
		<!-- loading -->
		<span class="wait"><?php _e( 'Loading..', 'openframe' ); ?></span>
			
		<!-- items list -->
		<ul class="raws">
		
			<?php get_template_part( 'part', 'item' ); ?>
			
		</ul>
		<!-- end: items list -->
		
		<?php if ( op_theme_opt( 'set-compass' ) ) : ?>
		
		<!-- nav -->
		<nav class="compass">
			
			<?php get_template_part( 'part', 'mini' ); ?>
			
		</nav>
		<!-- end: nav -->
		
		<?php endif; ?>
		
	</div>
	<!-- end: media items -->

<?php else : ?>
	
	<!-- content -->
	<div class="content narrow error">
		
		<h1>...</h1>
		
		<?php the_content(); ?>
	
	</div>
	<!-- end: content -->

<?php endif; ?>