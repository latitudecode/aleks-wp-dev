
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
		scrollduo = $( "html, body" ),
		bar = $( "#bar" ),
		intro = $( "#intro" ),
		content = $( ".post-content" ),
		commentlist = $( ".commentlist" ),
		morecontent = $( ".more-content" ),
		morecomment = $( ".more-comment" )
	
	if ( intro.length ) {
				
		intro.imagesLoaded( function( e ) {			
			
			if ( ! ie8 )
				intro
				.children( "figure" )
				.css( "background-image", "url(" + intro.children( "img" ).attr( "src" ) + ")" )
			
			intro.addClass( "ready" )
			
		} )
		
		if ( ! touch ) {
			
			var figcaption = intro.find( "figcaption" ),
				scroll
			
			wind.on( "scroll", function() {
				
				scroll = Math.abs( wind.scrollTop() )

				if ( scroll < wind.height() )
					figcaption.css( { "left": scroll / 3, "opacity": 1 - ( scroll / ( wind.height() / 2 ) ) } )	
				
			} )
			
		}
		
		intro.on( "click", function() {
			
			scrollduo.animate( { scrollTop: wind.height() - bar.height() }, { duration: 400, queue: false } )
			
		} )
		
	}
	
	$( "#respond #comment" ).on( "keyup", function( e ) {
	
		var textarea = $( this ),
			maximum = parseInt( textarea.css( "max-height" ) ),
			minimum = parseInt( textarea.css( "min-height" ) )
				
		if ( e.keyCode == 8 || e.keyCode == 46 )
            textarea.css( "height", minimum )
            
        if ( textarea.height() <= this.scrollHeight && textarea.height() <= maximum )
        	textarea.css( "height", this.scrollHeight )
        	
	} )
	
	morecontent.on( "click", function( e ) {
		
		e.preventDefault()
		
		if ( morecontent.hasClass( "idle" ) )
			return
		
		morecontent.addClass( "idle" )
				
		$.ajax( {
			url: morecontent.children( "a" ).attr( "href" ),
			dataType: "html"
		} )
		.done( function( result ) {
			
			var data = $( result ),
				page = data.find( ".post-content" ),
				href = data.find( ".more-content a" ).attr( "href" ),
				newbreak = $( "<hr class=\"page-break\" />" )
						
			content
			.append( newbreak )													
			.append( page.html() )
						
			href ? morecontent.children( "a" ).attr( "href", href ) : morecontent.remove()
									
			scrollduo.animate( { scrollTop: newbreak.offset().top - bar.height() * 2 }, { duration: 450, queue: false } )
			
			new View( $( "a[href$='.jpg'], a[href$='.png'], a[href$='.gif'], a[href$='.bmp']" ) )
			
			$( ".post-content" ).fitVids()
						
		} )
		.always( function() {
		
			morecontent.removeClass( "idle" )
			
		} )
		
	} )
	
	morecomment.on( "click", function( e ) {
		
		e.preventDefault()
		
		if ( morecomment.hasClass( "idle" ) )
			return
		
		morecomment.addClass( "idle" )
		
		$.ajax( {
			url: morecomment.children( "a" ).attr( "href" ),
			dataType: "html"
		} )
		.done( function( result ) {
		
			var data = $( result ),
				comment = data.find( ".commentlist" ).children(),
				href = data.find( ".more-comment a" ).attr( "href" )
																				
			comment
			.addClass( "invisible" )
			.appendTo( commentlist )
		
			comment
			.each( function( i ) {
				setTimeout( ( function( item ) {
					return function() {
						item.removeClass( "invisible" )
					}
				} ) ( $( this ) ), i * 200 )
			} )
				
			href ? morecomment.children( "a" ).attr( "href", href ) : morecomment.remove()
							
			scrollduo.animate( { scrollTop: comment.first().offset().top - bar.height() * 2 }, { duration: 450, queue: false } )
				
		} )
		.always( function() {
		
			morecomment.removeClass( "idle" )
		
		} )
	
	} )

} );