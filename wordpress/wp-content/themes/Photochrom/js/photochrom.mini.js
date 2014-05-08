
/*
*	photochrom
*	written by stefano giliberti (stfno@me.com),
*	opendept.net
*/

jQuery( document ).ready( function( $ ) {
	
	var wind = $( window ),
		touch = $( "html" ).hasClass( "touch" ),
		mini = $( ".mini" ),
		hold,
		timeout
	
	if ( ! mini.length )
		return
	
	ph_mini_prepare( mini.find( "li" ) )
	
	mini.on( "prepare", function() {
	
		ph_mini_prepare( $( ".mini li:not(.ready)" ) )	
		
	} )
	
	function ph_mini_prepare( li ) {
		
		li
		.filter( ":has(img[src])" )
		.imagesLoaded()
		.progress( function( e, i ) {
					
			$( i.img )
			.parents( "li" )
			.addClass( "ready" )
						
		} )
				
		li
		.filter( "[data-host=youtube][data-id]" )
		.each( function() {
										
			$.ajax( {
				url: "http://gdata.youtube.com/feeds/api/videos/" + $( this ).data( "id" ) + "?v=2&alt=jsonc&callback=?",
				dataType: "json",
				cache: true
			} )
			.done( function( result ) {
				
				li
				.filter( "[data-host=youtube][data-id=" + result.data.id + "]" )
				.find( "img" )
				.attr( "src", result.data.thumbnail.sqDefault )
				.imagesLoaded( function() {
										
					li
					.filter( "[data-host=youtube][data-id=" + result.data.id + "]" )	
					.addClass( "ready" )
					
				} )
			
			} )
			
		} )
		
		li
		.filter( "[data-host=vimeo][data-id]" )
		.each( function() {
			
			$.ajax( {
				url: "http://vimeo.com/api/v2/video/" + $( this ).data( "id" ) + ".json?callback=?",
				dataType: "json",
				cache: true
			} )
			.done( function( result ) {
				
				result = result[ 0 ]
				
				li
				.filter( "[data-host=vimeo][data-id=" + result.id + "]" )
				.find( "img" )
				.attr( "src", result.thumbnail_small )
				.imagesLoaded( function() {
										
					li
					.filter( "[data-host=vimeo][data-id=" + result.id + "]" )	
					.addClass( "ready" )
					
				} )
			
			} )

		} )
		
	}
	
	if ( ! touch ) {
		
		wind.on( "scroll", function() {
			
			hold = true
			
			clearTimeout( timeout )
			
			timeout = setTimeout( function() {
		       	
		       	hold = false
		        
		    }, 400 )
		    			
		} )
		
		mini
		.filter( function() {
		
			return this.scrollWidth > $( this ).width()

        } )
		.on( "mousewheel", function( e, xy, x, y ) {
			
			if ( hold || x !== 0 )
				return

			this.scrollLeft -= y * 20
			
			e.preventDefault()
			
		} )	
		
	}

} );