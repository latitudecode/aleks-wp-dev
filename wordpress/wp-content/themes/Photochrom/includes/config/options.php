<?php op_panel_tab_open( __( 'General', 'openframe' ) ); ?>
	
	<h3><?php _e( 'Site Title', 'openframe' ); ?></h3>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Textual', 'openframe' ) ); ?>
		
		<?php op_panel_opt_text( 'title-textual' ); ?>
						
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Image', 'openframe' ) ); ?>
		
		<?php op_panel_opt_media( 'title-image' ); ?>
						
	<?php op_panel_group_close(); ?>
	
	<h3><?php _e( 'Site Icon', 'openframe' ); ?></h3>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Bookmark Icon', 'openframe' ) ); ?>
		
		<?php op_panel_opt_media( 'bookmark-icon' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'iOS Home Icon', 'openframe' ) ); ?>
		
		<?php op_panel_opt_media( 'apple-touch-icon' ); ?>
		
		<p><?php _e( 'The icon displayed in the "Home Screen" of Apple iOS Devices.', 'openframe' ); ?></p>
				
	<?php op_panel_group_close(); ?>
	
	<h3><?php _e( 'Site Footer', 'openframe' ); ?></h3>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Content', 'openframe' ) ); ?>
		
		<?php op_panel_opt_textarea( 'footer' ); ?>
		
		<p><?php _e( 'The text to display at the end of every page.', 'openframe' ); ?></p>
		
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Shortened', 'openframe' ) ); ?>
		
		<?php op_panel_opt_text( 'footer-short' ); ?>
		
		<p><?php _e( 'A shortened version of the Footer to be used in full-screen sections.', 'openframe' ); ?></p>
		
	<?php op_panel_group_close(); ?>
	
	<h3><?php _e( 'Analytics', 'openframe' ); ?></h3>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Javascript Code', 'openframe' ) ); ?>
		
		<?php op_panel_opt_textarea( 'analytics', '&lt;script&gt; ... &lt;/script&gt;' ); ?>
		
		<p><?php _e( 'The Tracking Code of your favorite Analytics Web Service.', 'openframe' ); ?></p>
		
	<?php op_panel_group_close(); ?>
	
<?php op_panel_tab_open_close(); ?>

<?php op_panel_tab_open( __( 'Sets', 'openframe' ) ); ?>
	
	<h3><?php _e( 'Listing', 'openframe' ); ?></h3>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Sets per Page', 'openframe' ) ); ?>
		
		<?php op_panel_opt_select( 'set-number', array( '3' => '3', '6' => '6', '9' => '9', '12' => '12', '-1' => esc_attr( __( 'All', 'openframe' ) ) ) ); ?>
		
		<p><?php _e( 'The number of sets to display per page.', 'openframe' ); ?></p>
		
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Thumbnails per Set', 'openframe' ) ); ?>
		
		<?php op_panel_opt_select( 'set-mini-count', array( '5' => '5', '10' => '10', '15' => '15', '20' => '20', '25' => '25', '-1' => esc_attr( __( 'All', 'openframe' ) ) ) ); ?>
		
		<p><?php _e( 'The number of Thumbnails to display per set.', 'openframe' ); ?></p>
		
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Publish Date', 'openframe' ) ); ?>
		
		<?php op_panel_opt_check( 'set-date' ); ?>
		
		<p><?php _e( 'Tick this option to show the publish date of your sets.', 'openframe' ); ?></p>
		
	<?php op_panel_group_close(); ?>	
	
	<h3><?php _e( 'Browsing', 'openframe' ); ?></h3>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Resolution', 'openframe' ) ); ?>
		
		<?php op_panel_opt_select( 'set-resolution', array( 'full' => __( 'Original', 'openframe' ), 'large' => __( 'Large', 'openframe' ) ) ); ?>
		
		<p><?php _e( 'The resolution of the images displayed in a single set.', 'openframe' ); ?></p>
		
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Caption Bar', 'openframe' ) ); ?>
		
		<?php op_panel_opt_check( 'set-hat' ); ?>
		
		<p><?php _e( 'Tick this option to show the top bar that holds captions when browsing a set.', 'openframe' ); ?></p>
		
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Thumbnails Bar', 'openframe' ) ); ?>
		
		<?php op_panel_opt_check( 'set-compass' ); ?>
		
		<p><?php _e( 'Tick this option to show the bottom bar that contains the thumbnails when browsing a set.', 'openframe' ); ?></p>
		
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'End Mark', 'openframe' ) ); ?>
		
		<?php op_panel_opt_check( 'set-end' ); ?>
		
		<p><?php _e( 'Tick this option to show the "End of Set" slide at the end of each Set.', 'openframe' ); ?></p>
		
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Dynamic Page Title', 'openframe' ) ); ?>
		
		<?php op_panel_opt_check( 'set-page-title' ); ?>
		
		<p><?php _e( 'Tick this option to dynamically change the page title when browsing a set.', 'openframe' ); ?></p>
		
	<?php op_panel_group_close(); ?>
	
	<h3><?php _e( 'Management', 'openframe' ); ?></h3>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Show in WordPress', 'openframe' ) ); ?>
		
		<?php op_panel_opt_check( 'set-wp-ui' ); ?>
		
		<p><?php _e( 'Tick this option to show a list of all editable Sets in the left Sidebar of WordPress.', 'openframe' ); ?></p>
		
	<?php op_panel_group_close(); ?>

<?php op_panel_tab_open_close(); ?>

<?php op_panel_tab_open( __( 'Social', 'openframe' ) ); ?>
		
	<h3><?php _e( 'Social Networks', 'openframe' ); ?></h3>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Instagram' ); ?>
		
		<?php op_panel_opt_text( 'instagram', 'instagram.com/ ...' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Tumblr' ); ?>
		
		<?php op_panel_opt_text( 'tumblr', '... .tumblr.com/' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Flickr' ); ?>
		
		<?php op_panel_opt_text( 'flickr', 'flickr.com/photos/ ...' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Vimeo' ); ?>
		
		<?php op_panel_opt_text( 'vimeo', 'vimeo.com/ ...' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Behance' ); ?>
		
		<?php op_panel_opt_text( 'behance', 'behance.net/ ...' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Pinterest' ); ?>
		
		<?php op_panel_opt_text( 'pinterest', 'pinterest.com/ ...' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Twitter' ); ?>
		
		<?php op_panel_opt_text( 'twitter', 'twitter.com/ ...' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Facebook' ); ?>
		
		<?php op_panel_opt_text( 'facebook', 'facebook.com/ ...' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Google Plus' ); ?>
		
		<?php op_panel_opt_text( 'google-plus', 'plus.google.com/ ...' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Dribbble' ); ?>
		
		<?php op_panel_opt_text( 'dribbble', 'dribbble.com/ ...' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'LinkedIn' ); ?>
		
		<?php op_panel_opt_text( 'linkedin', 'linkedin.com/ ...' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Last.fm' ); ?>
		
		<?php op_panel_opt_text( 'lastfm', 'last.fm/user/ ...' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Spotify' ); ?>
		
		<?php op_panel_opt_text( 'spotify', 'spotify.com/ ...' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'SoundCloud' ); ?>
		
		<?php op_panel_opt_text( 'soundcloud', 'soundcloud.com/ ...' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Rdio' ); ?>
		
		<?php op_panel_opt_text( 'rdio', 'rdio.com/ ...' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'GitHub' ); ?>
		
		<?php op_panel_opt_text( 'github', 'github.com/ ...' ); ?>
		
		<br />
		
		<p><?php _e( 'Not all profiles deserve to be in the Navigation Bar: choose which one to display carefully!', 'openframe' ); ?></p>
				
	<?php op_panel_group_close(); ?>
	
<?php op_panel_tab_open_close(); ?>

<?php op_panel_tab_open( __( 'Fonts', 'openframe' ) ); ?>
	
	<h3><?php _e( 'Google Fonts', 'openframe' ); ?></h3>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Use Service' ); ?>
		
		<?php op_panel_opt_check( 'google-fonts' ); ?>
		
		<p><?php _e( 'Enable to load Fonts from Google Fonts.', 'openframe' ); ?></p>
				
	<?php op_panel_group_close(); ?>

	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Body Font' ); ?>
		
		<?php op_panel_opt_text( 'google-fonts-body', 'http://fonts.googleapis.com/css?family= ...' ); ?>
		
		<p><?php _e( 'The url to the main Font that will be used in the layout.', 'openframe' ); ?></p>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( 'Headings Font' ); ?>
		
		<?php op_panel_opt_text( 'google-fonts-headings', 'http://fonts.googleapis.com/css?family= ...' ); ?>
		
		<p><?php _e( 'The url to the secondary Font that will be used for Headings.', 'openframe' ); ?></p>
		
		<br />
		
		<p><?php _e( 'The url to the Font must be single &ndash; make sure to not enter the address to a Fonts collection.', 'openframe' ); ?></p>
					
	<?php op_panel_group_close(); ?>

<?php op_panel_tab_open_close(); ?>

<?php op_panel_tab_open( __( 'Extras', 'openframe' ) ); ?>
	
	<h3><?php _e( 'Layout', 'openframe' ); ?></h3>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Background Color', 'openframe' ) ); ?>
		
		<?php op_panel_opt_picker( 'background-color' ); ?>
									
	<?php op_panel_group_close(); ?>
	
	<h3><?php _e( 'Custom Code', 'openframe' ); ?></h3>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'CSS Code', 'openframe' ) ); ?>
		
		<?php op_panel_opt_textarea( 'css-code', '.postid-' . rand( 0, 100 ) . ' .post-title { text-transform: uppercase; }' ); ?>
				
	<?php op_panel_group_close(); ?>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'jQuery Code', 'openframe' ) ); ?>
		
		<?php op_panel_opt_textarea( 'jquery-code', '$(".postid-' . rand( 0, 100 ) . ' .post-title").hide().slideDown( 2000 );' ); ?>
			
	<?php op_panel_group_close(); ?>
	
	<h3><?php _e( 'Theme', 'openframe' ); ?></h3>
	
	<?php op_panel_group_open(); ?>
		
		<?php op_panel_opt_title( __( 'Check for Updates', 'openframe' ) ); ?>
		
		<?php op_panel_opt_check( 'update-check' ); ?>
		
		<p><?php _e( 'Tick this option if you wish to be notified when a new version of this theme becomes available. The notification will be available under the "Dashboard" section.', 'openframe' ); ?></p>
		
	<?php op_panel_group_close(); ?>
	
<?php op_panel_tab_open_close(); ?>