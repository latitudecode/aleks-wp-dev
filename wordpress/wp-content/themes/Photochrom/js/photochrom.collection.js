
/*
*	photochrom
*	written by stefano giliberti (stfno@me.com),
*	opendept.net
*/

jQuery( document ).ready( function( $ ) {
	
	var handle = $( "html, body" ),
		bar = $( "#bar" ),
		collection = $( "#collection" ),
		more = $( ".more" )
		
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
				set = data.find( "#collection > li" ),
				href = data.find( ".more a" ).attr( "href" )
			
			set
			.addClass( "invisible" )
			.appendTo( collection )
			
			set
			.each( function( i ) {
				setTimeout( ( function( item ) {
					return function() {
						item.removeClass( "invisible" )
					}
				} ) ( $( this ) ), i * 200 )
			} )
			
			$( ".mini" ).trigger( "prepare" )
									
			href ? more.children( "a" ).attr( "href", href ) : more.remove()
									
			$( "html, body" ).animate( { scrollTop: set.first().offset().top - bar.height() * 2 }, { duration: 400, queue: false } )
						
		} )
		.always( function() {
		
			more.removeClass( "idle" )
			
		} )
		
	} )

} );