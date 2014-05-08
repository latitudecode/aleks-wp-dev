<ul id="photochrom-picks-mirror"></ul>

<div id="photochrom-picks-create">

	<h2><?php _e( 'Create New Slide', 'openframe' ); ?></h2>
	
	<p><a href="#select" class="button button-secondary button-large"><?php _e( 'Select Image', 'openframe' ); ?></a></p>
	
	<input type="hidden" name="image" />
	
	<p><input class="title" type="text" name="title" placeholder="<?php esc_attr_e( __( 'Title', 'openframe' ) ); ?>" /></p>	
	
	<p><input class="caption" type="text" name="caption" placeholder="<?php esc_attr_e( __( 'Caption', 'openframe' ) ); ?>" /></p>
	
	<p class="no-flow">
	
		<input class="color" name="link-url" type="text" class="code" placeholder="http://" />
		
		<input class="color" name="link-label" type="text" placeholder="<?php esc_attr_e( __( 'Explore Set', 'openframe' ) ); ?>" />
	
	</p>
	
	<p><a href="#more"><?php _e( 'More Settings', 'openframe' ); ?></a></p>
	
	<p class="hidden"><input class="color" name="color" type="text" class="velo-iris-picker code" placeholder="<?php esc_attr_e( __( 'Text Color', 'openframe' ) ); ?>" /></p>

	<ul class="hidden">
	
		<li><input class="side" name="alignment" type="radio" value="centered" checked="checked"> <?php _e( 'Centered', 'openframe' ); ?></li>
		
		<li><input class="side" name="alignment" type="radio" value="left-side" /> <?php _e( 'Left Side', 'openframe' ); ?></li>
		
		<li><input class="side" name="alignment" type="radio" value="right-side" /> <?php _e( 'Right Side', 'openframe' ); ?></li>
	
	</ul>
	
	<p><a href="#add" class="button button-primary button-large"><?php _e( 'Create Slide', 'openframe' ); ?></a></p>
	
</div>

<?php $mb->the_field( 'list' ); ?>

<input type="hidden" id="photochrom-picks" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />