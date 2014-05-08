
/*
*	photochrom
*	written by stefano giliberti (stfno@me.com),
*	opendept.net
*/

jQuery( document ).ready( function( $ ) {
	
	var bar = $( "#bar" ),
		postlist = $( "#post-list" ),
		more = $( ".more" )
	
	ph_figure_prepare( $( ".post-figure" ) )
	
	more.on( "click", function( e ) {
		
		e.preventDefault()
		
		if ( more.hasClass( "idle" ) )
			return
		
		more.addClass( "idle" )
				
		$.ajax( {
			url: more.children( "a" ).attr( "href" ),
			dataType: "html"
		} )
		.done( function( result ) {
			
			var data = $( result ),
				post = data.find( ".post" ),
				href = data.find( ".more a" ).attr( "href" )
			
			post
			.addClass( "invisible" )
			.appendTo( postlist )
									
			post
			.each( function( i ) {
				setTimeout( ( function( item ) {
					return function() {
						item.removeClass( "invisible" )
					}
				} ) ( $( this ) ), i * 200 )
			} )
			
			ph_figure_prepare( post.find( ".post-figure" ) )
			
			href ? more.children( "a" ).attr( "href", href ) : more.remove()
									
			$( "html, body" ).animate( { scrollTop: post.first().offset().top - bar.height() * 2 }, { duration: 400, queue: false } )
						
		} )
		.always( function() {
		
			more.removeClass( "idle" )
			
		} )
		
	} )
	
	function ph_figure_prepare( figure ) {
		
		figure
		.imagesLoaded()
		.progress( function( e, i ) {
					
			$( i.img )
			.parent( ".post-figure" )
			.css( "background-image", "url(" + i.img.src + ")" )
			
		} )
		
	}

} );