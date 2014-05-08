
/*
*	photochrom
*	written by stefano giliberti (stfno@me.com),
*	opendept.net
*/

jQuery( document ).ready( function( $ ) {
	
	var wind = $( window ),
		body = $( "body" ),
		touch = $( "html" ).hasClass( "touch" ),
		title = document.title,
		set = $( "#set" ),
		hat = set.children( ".hat" ),
		of = hat.find( ".index" ),
		caption = hat.find( ".caption" ),
		ul = set.children( ".raws" ),
		li = ul.children( "li" ),
		images = li.filter( "[data-li=image]" ),
		videos = li.filter( "[data-li=video]" ),
		compass = set.children( ".compass" ),
		mini = compass.find( ".mini" ),
		minili = mini.children( "li" )
	
	body.addClass( "choosing peeking" )
	
	setTimeout( function() {
		
		if ( ! set.find( ".hat:hover" ).length )
			body.removeClass( "choosing" )
		
		if ( ! set.find( ".compass:hover" ).length )
			body.removeClass( "peeking" )
	
	}, 3000 )
	
	ph_raw( li.filter( window.location.hash ).length ? li.filter( window.location.hash ) : li.eq( 0 ) )
	
	images
	.imagesLoaded()
	.progress( function( e, i ) {
				
		ph_raw_update( $( i.img ) )
		
	} )
	
	videos
	.find( "iframe" )
	.load( function() {
						
		ph_raw_update( $( this ) )
		
		$( this )
		.parent( ".video-frame" )
		.fitVids()
		
	} )
	
	wind.on( "resize", function() {
		images
		.find( "img" )
		.css( "max-height", set.height() )			
	} )

	wind.trigger( "resize" )
	
	hat
	.find( ".total" )
	.text( li.filter( "[data-li]" ).length )
	
	function ph_raw( next ) {
				
		if ( ! next.length )
			return
				
		current = li.filter( ".current" )
		
		current.removeClass( "current" )
		
		next.addClass( "current" )
		
		if ( set.hasClass( "video" ) )
			ph_raw_video( current )
		
		if ( compass.length )
			ph_raw_square( next.attr( "id" ) )
		
		ph_raw_status( next )
				
	}
	
	function ph_raw_video( current ) {
		
		if ( ! current.hasClass( "ready" ) )
			return
		
		iframe = current.find( "iframe" )
				
		if ( iframe.is( "[src^='http://www.youtube.com/embed']" ) ) {
		
			iframe[ 0 ]
			.contentWindow
			.postMessage( JSON.stringify( { "event": "command", "func": "pauseVideo", "args": [], "id": iframe.attr( "id" ) } ), "*" )	
					
		}
		else if ( iframe.is( "[src^='http://player.vimeo.com/video']" ) ) {
						
			iframe[ 0 ]
			.contentWindow
			.postMessage( JSON.stringify( { "method": "pause" } ), iframe.attr( "src" ).split( "?" )[ 0 ] )
						
		}	
				
	}
	
	function ph_raw_status( next ) {
		
		var format = next.data( "li" ) || null,
			text = next.data( "caption" ),
			index = next.index() + 1
		
		set.attr( "class", format )
		
		if ( body.hasClass( "start" ) || body.hasClass( "over" ) )
			body.removeClass( "start over" )
		
		if ( ! next.index() ) {
			body.addClass( "start")
		}
		else if ( next.is( ":last-child" ) ) {
			body.addClass( "over")
		}
		
		if ( body.hasClass( "over" ) || next.hasClass( "ready" ) ) {
			set.addClass( "ready" )
		}
		else if ( set.hasClass( "ready" ) ) {
			set.removeClass( "ready" )
		}
		
		if ( hat.length ) {
			caption.text( text )
			of.text( index )				
		}
		
		if ( ph_set_title )
			document.title = format ? text + " #" + index + " - " + title : title
		
	}
	
	function ph_raw_square( id ) {
		
		var current = minili.filter( ".current" ),
			next = minili.filter( ":has([href$=#" + id + "])" )
				
		current.removeClass( "current" )
		
		next.addClass( "current" )
				
		mini.animate( { scrollLeft: next.width() * next.index() - mini.width() / 2 }, { duration: 400, queue: false } )
		
	}
	
	function ph_raw_skip( side ) {
		
		var current = li.filter( ".current" ),
			next = side == "next" ? current.next( "li" ) : current.prev( "li" )
		
		if ( next.length )
			window.location.hash = next.attr( "id" )
		
	}
	
	function ph_raw_update( li ) {
		
		li = li.parents( "li" )
		
		li.addClass( "ready" )
		
		if ( li.hasClass( "current" ) )
			set.addClass( "ready" )
		
	}
	
	wind.on( "hashchange", function( e ) {
				
		ph_raw( li.filter( window.location.hash ) )
		
	} )

	wind.on( "keydown", function( e ) {
				
		if ( e.keyCode == 39 || e.keyCode == 37 ) {
			
			ph_raw_skip( e.keyCode == 39 ? "next" : "prev" )
			
			e.preventDefault()
			
		}
				
	} )

	if ( ! touch ) {
		
		set
		.children( ".hat, .hot" )
		.on( "mouseover", function() {
		
			body.addClass( "choosing" )		
			
		} )
		
		set
		.children( ".hat, .hot" )
		.on( "mouseout", function() {
		
			body.removeClass( "choosing" )		
			
		} )
		
		set
		.children( ".compass, .cold" )
		.on( "mouseover", function() {
		
			body.addClass( "peeking" )
				
		} )
		
		set
		.children( ".compass, .cold" )
		.on( "mouseout", function() {
		
			body.removeClass( "peeking" )	
			
		} )
		
		set
		.find( ".next, .prev" )
		.on( "click", function( e ) {
					
			ph_raw_skip( $( this ).attr( "class" ) )
			
			e.preventDefault()
					
		} )
		
		set
		.find( ".skip" )
		.on( "click", function( e ) {
					
			ph_raw_skip( "next" )
			
			e.preventDefault()
					
		} )
		
	}
	else {
					
		ul
		.hammer()
		.on( "tap", function() {
						
			body.is( ".choosing.peeking" ) ? body.removeClass( "choosing peeking" ) : body.addClass( "choosing peeking" )

		} )
		.on( "dragstart", function( e ) {
			
			e.gesture.preventDefault()
			
		} )
		.on( "dragend", function( e ) {
			
			var i = e.gesture
			
			if ( i.distance < 40 )
				return
			
			if ( i.direction == "left" ) {
				ph_raw_skip( "next" )				
			}
			else if ( i.direction == "right" ) {
				ph_raw_skip( "prev" )
			}
			else if ( i.direction == "down" ) {
				body.hasClass( "peeking" ) ? body.removeClass( "peeking" ) : body.addClass( "choosing" )
			}
			else {
				body.hasClass( "choosing" ) ? body.removeClass( "choosing" ) : body.addClass( "peeking" )
			}
			
		} )
		
		set
		.find( ".next, .prev" )
		.hammer()
		.on( "tap", function( e ) {
					
			ph_raw_skip( $( this ).attr( "class" ) )
			
			if ( body.is( ".choosing.peeking" ) )
				body.removeClass( "choosing peeking" )
				
			e.gesture.preventDefault()
								
		} )
		
		set
		.find( ".skip" )
		.hammer()
		.on( "tap", function( e ) {
					
			ph_raw_skip( "next" )
							
			e.gesture.preventDefault()
								
		} )
		
	}

} );