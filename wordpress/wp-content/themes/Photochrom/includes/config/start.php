<?php

$theme_config = array(
	'theme_name' => 'Photochrom',
	'theme' => 'photochrom',
	'theme_includes' => get_template_directory() . '/includes',
	'theme_includes_uri' => get_template_directory_uri() . '/includes',
	'theme_op' => get_template_directory() . '/includes/config',
	'theme_xml' => 'http://version.opendept.net/photochrom.xml'
);

$theme_defaults = array(
	'title-textual' => strtoupper( get_bloginfo( 'name', 'display' ) ),
	'footer' => '&copy; ' . get_bloginfo( 'name' ) . '. Powered by <a href="http://themes.opendept.net/photochrom">Photochrom for WordPress</a>',
	'footer-short' => '&copy; ' . get_bloginfo( 'name' ),		
	'set-number' => 3,
	'set-mini-count' => '-1',
	'set-date' => true,
	'set-resolution' => 'large',
	'set-hat' => true,
	'set-compass' => true,
	'set-end' => true,
	'set-page-title' => true,
	'set-wp-ui' => true,
	'google-fonts' => true,
	'google-fonts-body' => 'http://fonts.googleapis.com/css?family=Montserrat:400,700',
	'google-fonts-headings' => 'http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic&subset=latin,latin-ext',	
	'background-color' => '#9b9b9b'
);

require_once( get_template_directory() . '/openframe/start.php' );

?>