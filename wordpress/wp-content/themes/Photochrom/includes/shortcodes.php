<?php
/* [columns-box][/columns-box] */
function photochrom_sc_columns_box( $atts, $content = null ) {
	
	$defaults = array( 'size' => null );
	
	extract( shortcode_atts( $defaults, $atts ) );
	
	$classes = array( 'columns', 'clear' );
	
	switch ( $size ) {
		case 'half':
		case '1/2':
		case '2':
			$classes[] = 'half';
		break;
		case 'one-third':
		case '1/3':
		case '3':
			$classes[] = 'one-third';
		break;
		case 'one-fourth':
		case '1/4':
		case '4':
			$classes[] = 'one-fourth';
		break;
	}
	
	$classes = join( ' ', $classes );
	
	$shortcode = '<div class="' . $classes . '">' . do_shortcode( $content ) . '</div>';

	return $shortcode;

}

add_shortcode( 'columns-box', 'photochrom_sc_columns_box' );

/* [column][/column] */
function photochrom_sc_column( $atts, $content = null ) {

	$defaults = array( 'size' => 'half' );
	
	extract( shortcode_atts( $defaults, $atts ) );
		
	switch ( $size ) {
		case 'half':
		case '1/2':
		case '2':
			$class = 'half';
		break;
		case 'one-third':
		case '1/3':
		case '3':
			$class = 'one-third';
		break;
		case 'one-fourth':
		case '1/4':
		case '4':
			$class = 'one-fourth';
		break;
		case 'two-thirds':
		case '2/3':
			$class = 'two-thirds';
		break;
	}
		
	$shortcode = '<div class="' . $class . '">' . do_shortcode( $content ) . '</div>';

	return $shortcode;

}

add_shortcode( 'column', 'photochrom_sc_column' );

function photochrom_quicktags() {	
	$output = '<script>';
	$output .= 'if ( typeof QTags !== "undefined" ) {';
	$output .= 'QTags.addButton( \'photochrom_sc_columns_box\', \'columns box\', \'[columns-box size=1/3]\', \'[/columns-box]\' );';
	$output .= 'QTags.addButton( \'photochrom_sc_column\', \'column\', \'[column]\', \'[/column]\' );';
	$output .= '}';
	$output .= '</script>';
	echo $output;
}

if ( op_is_wp_edit() )
	add_action( 'admin_print_footer_scripts', 'photochrom_quicktags' );

?>