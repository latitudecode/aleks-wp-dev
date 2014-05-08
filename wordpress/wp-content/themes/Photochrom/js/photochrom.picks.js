
/*
*	photochrom
*	written by stefano giliberti (stfno@me.com),
*	opendept.net
*/

jQuery( document ).ready( function( $ ) {
	
	var wind = $( window ),
		html = $( "html" ),
		touch = html.hasClass( "touch" ),
		ie8 = html.hasClass( "ie8" ),
		ie = html.hasClass( "ie" ),
		picks = $( "#picks" ),
		li = picks.find( "li" ),
		skip = picks.find( ".skip" ),
		hold = true,
		interval
	
	li
	.eq( 0 )
	.addClass( "current" )
	
	ph_picks_autocolor()
	
	li
	.imagesLoaded()
	.progress( function( e, i ) {
		
		if ( ie8 )
			return
			
		$( i.img )
		.parents( "li" )
		.css( "background-image", "url(" + i.img.src + ")" )	
							
	} )
	.always( function() {
		
		picks.addClass( "ready" )
				
		ph_picks_release()
		
	} )
	
	function ph_picks( side ) {
		
		if ( hold )
			return
					
		hold = true,
		current = li.filter( ".current" )
		
		if ( side == "next" ) {
			next = current.next( "li" ).length ? current.next( "li" ) : li.eq( 0 )			
		}
		else {
			next = current.prev( "li" ).length ? current.prev( "li" ) : li.filter( ":last" )
		}	
		
		current.removeClass( "current" )
	
		next.addClass( "current" )
		
		ph_picks_autocolor( next )
		
		ph_picks_release()
		
	}
	
	function ph_picks_auto() {
		
		if ( interval )
			clearInterval( interval )
		
		interval = setInterval( function() {
			
			ph_picks( "next" )
		
		}, 10000 )
		
	}
	
	function ph_picks_release() {
		
		if ( ie ) {
			
			hold = false
			
			ph_picks_auto()	
			
		}
		else {
			
			setTimeout( function() {
				
				hold = false
				
				ph_picks_auto()	
				
			}, 800 )	
			
		}
		
	}
	
	function ph_picks_autocolor( current ) {
		
		current = current ? current : li.filter( ".current" )
		
		skip.css( "border-color", current.children( "article" ).css( "color" ) )
		
	}
	
	wind.on( "keydown", function( e ) {
		
		if ( e.keyCode == 39 || e.keyCode == 37 ) {
			
			ph_picks( e.keyCode == 39 ? "next" : "prev" )
			
			e.preventDefault()
			
		}
				
	} )
	
	if ( ! touch ) {
	
		skip.on( "click", function( e ) {
			
			ph_picks( "next" )
					
			e.preventDefault()
			
		} )
	
	}
	else {
		
		picks
		.hammer()
		.on( "dragstart", function( e ) {
			
			e.gesture.preventDefault()
			
		} )
		.on( "dragend", function( e ) {
			
			var i = e.gesture
						
			if ( i.distance < 40 )
				return
			
			if ( i.direction == "left" ) {
				ph_picks( "next" )				
			}
			else if ( i.direction == "right" ) {
				ph_picks( "prev" )
			}
			
		} )
		
		skip
		.hammer()
		.on( "tap", function( e ) {
					
			ph_picks( "next" )
					
			e.gesture.preventDefault()
								
		} )
		
	}	
		
} );