		<!-- copyright -->
		<footer id="footer">
			
			<!-- info -->
			<span class="long"><?php echo do_shortcode( op_theme_opt( 'footer' ) ); ?></span>
			
			<!-- shorter info -->
			<span class="short"><?php echo do_shortcode( op_theme_opt( 'footer-short' ) ); ?></span>
			
			<!-- links -->
			<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'menu_class' => null, 'menu_id' => 'footer-menu', 'depth' => 1, 'fallback_cb' => '' ) ); ?>
		
		</footer>
		<!-- end: copyright -->
		
		<?php wp_footer(); ?>

	</body>
	<!-- end: body -->

</html>
<!-- end: html -->