
/*
*	photochrom
*	written by stefano giliberti (stfno@me.com),
*	opendept.net
*/

jQuery( document ).ready( function( $ ) {
	
	var wind = $( window ),
		bar = $( "#bar" ),
		menu = bar.children( ".menu" ),
		fit = $( ".fit" ),
		content = $( ".post-content" )

	wind.on( "resize", function() {
		free = wind.height() - bar.height()		
		menu.css( "max-height", free )
		fit.css( "height", free )
	} )

	wind.trigger( "resize" )
	
	menu
	.next( ".trigger" )
	.on( "click", function( e ) {	
		bar.toggleClass( "select" )
		e.preventDefault()
	} )
	
	if ( ! $( "html" ).hasClass( "ie8" ) ) {	
		wind.on( "scroll", function() {
			bar.css( "opacity", Math.max( 1 - Math.abs( wind.scrollTop() ) / wind.height() / 3, .85 ) )
		} )
	}
	
	$( "input, textarea" ).placeholder()

	new View( content.find( "a[href$='.jpg'], a[href$='.png'], a[href$='.gif'], a[href$='.bmp']" ) )
	
	content.fitVids()
	
	$( "p > a:has(img)" ).addClass( "has-img" )

} );