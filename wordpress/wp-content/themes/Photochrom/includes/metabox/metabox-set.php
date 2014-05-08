<ul id="photochrom-set-mirror"></ul>

<div class="column left">

	<h2><?php _e( 'From Your Library', 'openframe' ); ?></h2>
	
	<p><a href="#add" class="button button-secondary"><?php _e( 'Select Images', 'openframe' ); ?></a></p>
	
	<p class="description"><?php _e( 'Add photos from your WordPress Media Library.', 'openframe' ); ?>
	
</div>

<div class="column">

	<h2><?php _e( 'From The Web', 'openframe' ); ?></h2>
	
	<p><input type="text" class="large-text code" name="url" placeholder="http://youtu.be/J---aiyznGQ" /></p>
	
	<p class="description"><?php _e( 'Paste your YouTube or Vimeo link here and hit enter.', 'openframe' ); ?>
	
</div>

<p class="description info"><?php printf( __( 'Drag To Order. Or %s', 'openframe' ), '<a href="#shuffle">' . __( 'Shuffle!', 'openframe' ) . '</a>' ); ?></p>

<?php $mb->the_field( 'list' ); ?>

<input type="hidden" id="photochrom-set" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />