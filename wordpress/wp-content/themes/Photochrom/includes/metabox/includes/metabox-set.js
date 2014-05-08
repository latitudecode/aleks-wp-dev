jQuery( document ).ready( function( $ ) {
		
	var media = wp.media( { title: photochrom_metabox_string.add, multiple: "add" } ),
		set = $( "#photochrom-set" ),
		mirror = $( "#photochrom-set-mirror" )
	
	if ( ! set.val() )
		set.val( JSON.stringify( [] ) )
	
	photochrom_mirror_update( photochrom_set_get() )
	
	$( "a[href=#add]" ).on( "click", function( e ) {
		
		media.open()
		
		e.preventDefault()
		
	} )
	
	media.on( "select", function() {
		
		list = photochrom_set_get()
					
		media
		.state()
		.get( "selection" )
		.map( function( attachment ) {
																	
			item = {
				id: photochrom_uniqid(),
				type: "image",
				media: attachment.attributes.id,
				caption: attachment.attributes.caption,
				thumbnail: attachment.attributes.sizes.thumbnail.url,
				edit: attachment.attributes.editLink
			}
			
			list.push( item )

	    } )
	    	    
	    photochrom_set_update( list )
	    
	    var li = mirror.find( "li" )
		
		mirror.animate( { scrollLeft: li.first().width() * li.length }, { duration: 400, queue: false } )
	    	    	
	} )
		
	$( "[name=url]" ).on( "keydown", function( e ) {		
		
		if ( e.keyCode != 13 )
			return
		
		e.preventDefault()
		
		if ( ( url = $.trim( this.value ) ) ) {
			
			parser = document.createElement( "a" ),
			parser.href = url,
			parser.hostname = parser.hostname.replace( "www.", "" )
					
			if ( parser.hostname == "youtube.com" || parser.hostname == "youtu.be" || parser.hostname == "vimeo.com" ) {
				
				list = photochrom_set_get()
			
				item = {
					id: photochrom_uniqid(),
					type: "video",
					url: url,
					caption: ""
				}
								
				list.push( item )
				
				photochrom_set_update( list )
								
			}
			
		}
		
		this.value = null
		
		var li = mirror.find( "li" )
		
		mirror.animate( { scrollLeft: li.first().width() * li.length }, { duration: 400, queue: false } )
		
	} )
	
	$( "a[href=#shuffle]" ).on( "click", function( e ) {

		photochrom_set_update( photochrom_set_get().sort( function() { return ( .5 - Math.random() ) } ) )
		
		e.preventDefault()
		
	} )
	
	mirror
	.sortable( {
		tolerance: "pointer",
		opacity: .9,
		scrollSensitivity: 200,
		scrollSpeed: 15
	} )
	.on( "sortupdate", function() {
		
		list = []
				
		$.each( mirror.sortable( "toArray" ), function( index, id ) {
			list.push( $.grep( photochrom_set_get(), function( item ) { return item.id == id } )[ 0 ] )						
		} )
				
		photochrom_set_update( list )

	} )
	
	mirror
	.find( ".delete" )
	.live( "click", function( e ) {
		
		id = this.hash.substring( 1 )
				
		photochrom_set_update( $.grep( photochrom_set_get(), function( item ) { return item.id !== id } ) )
				
		e.preventDefault()
		
	} )
	
	mirror
	.find( ".caption" )
	.live( "change", function( e ) {

		list = photochrom_set_get(),
		id = this.name
		
		$.grep( list, function( item ) { return item.id == id } )[ 0 ].caption = this.value
				
		photochrom_set_update( list )
				
	} )
	
	function photochrom_set_update( list ) {
		
		set.val( JSON.stringify( list ) )
		
		photochrom_mirror_update( list )
		
	}
	
	function photochrom_set_get() {
		
		return JSON.parse( set.val() )
		
	}
	
	function photochrom_mirror_update( list ) {
		
		mirror.empty()
		
		$.each( list, function( index, item ) {
			
			li = "<li id=" + item.id + " class=\"" + item.type + "\">"
		
			if ( item.type == "image" ) {
				li += "<a class=\"thumbnail\" href=\"" + item.edit + "\" target=\"_blank\"><img src=\"" + item.thumbnail + "\" /></a>"
			}
			else if ( item.type == "video" ) {
				li += "<a class=\"thumbnail\" href=\"" + item.url + "\" target=\"_blank\"></a>"
			}
				
			li += "<p><input class=\"caption\" type=\"text\" value=\"" + photochrom_escape( item.caption ) + "\" name=\"" + item.id + "\" placeholder=\"" + photochrom_metabox_string.no_caption + "\" /></p>"
			li += "<p><a class=\"delete\" href=\"#" + item.id + "\">" + photochrom_metabox_string.remove + "</a></p>"
			li += "</li>"
			
			mirror.append( li )
			
		} )
		
	}
	
	function photochrom_uniqid() {
		return "p" + Math.round( Math.random() * 1000 )
	}
	
	function photochrom_escape( string ) {
		photochrom_entities = {
			"&": "&amp;",
			"<": "&lt;",
			">": "&gt;",
			'"': '&quot;',
			"'": '&#39;',
			"/": '&#x2F;'
		}
		return String( string ).replace( /[&<>"'\/]/g, function ( s ) { return photochrom_entities[ s ] } )
	}
		
} );