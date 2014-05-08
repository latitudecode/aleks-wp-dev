jQuery( document ).ready( function( $ ) {
	
	var media = wp.media( { title: photochrom_metabox_string.add } ),
		picks = $( "#photochrom-picks" ),
		mirror = $( "#photochrom-picks-mirror" ),
		create = $( "#photochrom-picks-create" ),
		select = create.find( "a[href=#select]" ),
		image = create.find( "[name=image]" ),
		color = create.find( "[name=color]" ),
		add = create.find( "a[href=#add]" )
	
	if ( ! picks.val() )
		picks.val( JSON.stringify( [] ) )
		
	photochrom_picks_mirror_update( photochrom_picks_get() )
	
	select.on( "click", function( e ) {
		
		media.open()
			
		e.preventDefault()

	} )
	
	media.on( "select", function() {
		
		i = media.state().get( "selection" ).single()
		
		image.val( [ i.id, i.attributes.sizes.thumbnail.url, i.attributes.editLink ] )
	   	
	   	if ( ! select.hasClass( "button-primary-disabled" ) )
	   		select.toggleClass( "button-primary-disabled", "button-secondary" )
	   	  	
	} )
	
	add.on( "click", function( e ) {
		
		e.preventDefault()
				
		if ( ! image.val() )
			return
		
		list = photochrom_picks_get(),
		attachment = image.val().split( "," ),
		title = create.find( "[name=title]" ),
		url = create.find( "[name=link-url]" ),
		label = create.find( "[name=link-label]" ),
		caption = create.find( "[name=caption]" ),
		alignment = create.find( "[name=alignment]" ),
		
		item = {
			id: photochrom_uniqid(),
			media: attachment[ 0 ],
			title: title.val(),
			caption: caption.val(),
			link: { url: url.val(), label: label.val() },
			alignment: alignment.filter( ":checked" ).val(),
			color: color.val(),
			thumbnail: attachment[ 1 ],
			edit: attachment[ 2 ]
		}
				
		list.push( item )
		
		photochrom_picks_update( list )
		
		create
		.find( ":text" )
		.val( null )
		
		alignment
		.first()
		.attr( "checked", "checked" )
				
		select.toggleClass( "button-primary-disabled", "button-secondary" )
		
	} )
	
	create
	.find( ":text" )
	.on( "keypress", function( e ) {
		
		if ( e.keyCode == 13 ) {
			
			add.trigger( "click" )
						
			e.preventDefault()
			
		}
				
	} )
	
	mirror
	.sortable( {
		opacity: .9,
		scrollSensitivity: 200,
		scrollSpeed: 15
	} )
	.on( "sortupdate", function() {
		
		list = []
				
		$.each( mirror.sortable( "toArray" ), function( index, id ) {
			list.push( $.grep( photochrom_picks_get(), function( item ) { return item.id == id } )[ 0 ] )						
		} )
				
		photochrom_picks_update( list )
		
	} )
	
	mirror
	.find( ".delete" )
	.live( "click", function( e ) {
		
		id = this.hash.substring( 1 )
				
		photochrom_picks_update( $.grep( photochrom_picks_get(), function( item ) { return item.id !== id } ) )
				
		e.preventDefault()
		
	} )
		
	mirror
	.find( ".title" )
	.live( "change", function( e ) {

		list = photochrom_picks_get(),
		id = this.name
		
		$.grep( list, function( item ) { return item.id == id } )[ 0 ].title = this.value
				
		photochrom_picks_update( list )
				
	} )
	
	mirror
	.find( ".caption" )
	.live( "change", function( e ) {

		list = photochrom_picks_get(),
		id = this.name
		
		$.grep( list, function( item ) { return item.id == id } )[ 0 ].caption = this.value
				
		photochrom_picks_update( list )
				
	} )
	
	color.iris( {
		hide: true,
		palettes: true
	} )
	.on( "focus", function() {
		$( this ).iris( "show" )		
	} )
	
	create
	.find( "a[href=#more]" )
	.on( "click", function( e ) {
		
		$( this )
		.parent()
		.addClass( "hidden" )
		.nextAll( ".hidden" )
		.removeClass( "hidden" )
		
		e.preventDefault()
		
	} )
	
	function photochrom_picks_update( list ) {
		
		picks.val( JSON.stringify( list ) )
		
		photochrom_picks_mirror_update( list )
		
	}
	
	function photochrom_picks_get() {
		
		return JSON.parse( picks.val() )
		
	}
	
	function photochrom_picks_mirror_update( list ) {
		
		mirror.empty()
		
		$.each( list, function( index, item ) {
			
			li = "<li id=" + item.id + ">"
			li += "<a class=\"thumbnail\" href=\"" + item.edit + "\"><img src=\"" + item.thumbnail + "\" /></a>"
			li += "<p><input class=\"title\" type=\"text\" value=\"" + photochrom_escape( item.title ) + "\" name=\"" + item.id + "\" placeholder=\"" + photochrom_metabox_string.title + "\" /></p>"
			li += "<p><input class=\"caption\" type=\"text\" value=\"" + photochrom_escape( item.caption ) + "\" name=\"" + item.id + "\" placeholder=\"" + photochrom_metabox_string.caption + "\" /></p>"
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