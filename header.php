<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<meta property="og:title" content="<?php bloginfo('title'); ?>" />
		<meta property="og:type" content="website" />
		<!-- <meta property="og:image" content="CONTENT NEEDED" /> -->
		<!-- <meta property="og:url" content="CONTENT NEEDED" /> -->
		<meta property="og:description" content="<?php bloginfo('description'); ?>" />

		<style>
			/* Alpine Styles */
			[x-cloak] {
				display: none !important;
			}
		</style>

		<?php wp_head(); ?>

		<script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

		<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

	</head>
	<body <?php body_class(); ?> x-cloak x-data="{ loaded: true }" x-show="loaded">
		<?php if ( ! function_exists( 'wp_body_open' ) ) {
			function wp_body_open() {
				do_action( 'wp_body_open' );
			}
		} ?>

		<?php require get_template_directory() . "/theme-parts/load-menu-functionality.php"; ?>
		
		<header class="bg-bread-vivid" role="banner"  x-cloak x-data="{ menu_loaded: true }" x-show="menu_loaded">
			<?php if (is_front_page()) : require get_template_directory() . "/theme-parts/top-banner.php"; endif; ?>
			<?php require get_template_directory() . "/theme-parts/navigation.php"; // load-brand.php above inject the brand's logo from the theme's settings in the backend. ?> 				
		</header>