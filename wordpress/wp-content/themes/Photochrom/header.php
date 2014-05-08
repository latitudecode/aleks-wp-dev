<!doctype html>

<!--[if IE 8]> <html class="no-touch ie ie8" <?php language_attributes(); ?>> <![endif]-->

<!--[if IE 9]> <html class="no-touch ie ie9" <?php language_attributes(); ?>> <![endif]-->

<!--[if !IE]><!--> <html class="no-touch" <?php language_attributes(); ?>> <!--<![endif]-->

	<!-- head -->
	<head>

		<!-- html class -->
		<script>
			i = document.documentElement,
			i.className = !! ( "ontouchstart" in i ) || window.DocumentTouch && document instanceof DocumentTouch ? i.className.replace( "no-touch", "touch" ) : i.className;
		</script>

		<!-- charset -->
		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<!-- ie -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">

		<!-- page title -->
		<title><?php wp_title( '-', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>
		
		<!-- pingback -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<!-- css -->
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>?v=<?php echo op_theme_version; ?>">
		
		<?php if ( $i = op_theme_opt( 'bookmark-icon' ) ) : ?>
		
		<!-- favicon -->
		<link rel="shortcut icon" href="<?php photochrom_get_media_url( $i, 'full' ); ?>">
		
		<?php endif; ?>
		
		<?php if ( $i = op_theme_opt( 'apple-touch-icon' ) ) : ?>

		<!-- apple touch icon -->
		<link rel="apple-touch-icon-precomposed" href="<?php photochrom_get_media_url( $i, 'full' ); ?>">
		
		<?php endif; ?>
		
		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
		<![endif]-->
				
		<?php wp_head(); ?>

	</head>
	<!-- end: head -->

	<!-- body -->
	<body <?php body_class(); ?>>
	
		<!-- header -->
		<nav id="bar">
			
			<?php if ( $i = op_theme_opt( 'title-image' ) ) : ?>
		
			<!-- logo -->
			<h3 class="logo"><a href="<?php echo home_url( '/' ); ?>"><img src="<?php photochrom_get_media_url( $i, 'full' ); ?>" alt="<?php esc_attr_e( op_theme_opt( 'title-textual' ) ); ?>" /></a></h3>
			
			<?php else : ?>
			
			<!-- logo -->
			<h3 class="logo"><a href="<?php echo home_url( '/' ); ?>" ><?php echo op_theme_opt( 'title-textual' ); ?></a></h3>
			
			<?php endif; ?>
			
			<!-- menu -->
			<ul class="menu">
				
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'menu', 'menu_id' => 'menu', 'depth' => 1, 'fallback_cb' => '', 'items_wrap' => '%3$s' ) ); ?>
				
				<?php get_template_part( 'part', 'social' ); ?>
				
			</ul>
			<!-- end: menu -->
			
			<!-- menu trigger -->
			<div class="trigger"><a href="#" title="<?php esc_attr_e( __( 'Sections', 'openframe' ) ); ?>"><span class="icon-menu"></span></a></div>
			
		</nav>
		<!-- end: header -->