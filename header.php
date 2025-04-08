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
			.scroll-buttons {
					position: fixed;
					bottom: 20px;
					left: 20px;
					display: none;
					z-index: 20; /* Increased z-index */
			}

			.scroll-buttons button {
					color: #fff;
					border: none;
					border-radius: 50%;
					padding: 10px;
					cursor: pointer;
			}
		</style>

		<?php wp_head(); ?>

		<script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

		<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

	</head>
	<body <?php body_class(); ?> 
		x-cloak 
		x-data="{ loaded: true,
		faqs_open_0:false,
		faqs_open_1:false,
		faqs_open_2:false,
		faqs_open_3:false,
		faqs_open_4:false,
		faqs_open_5:false,
		faqs_open_6:false,
		faqs_open_7:false,
		faqs_open_8:false,
		faqs_open_9:false,
		faqs_open_10:false,
		faqs_open_11:false,
		faqs_open_12:false
		}" 
		x-show="loaded"
		x-ref="body">
		<div class="scroll-buttons">
			<button class="back-to-top bg-paprika-vivid hover:bg-paprika duration-300 transition-colors">
					<i class="fas fa-arrow-up !flex !items-center !justify-center !w-4 !h-4 lg:!w-6 lg:!h-6"></i>
			</button>
			<button class="back-to-tours bg-paprika-vivid hover:bg-paprika duration-300 transition-colors" style="display: none;" title="Back to all tours">
					<i class="fas fa-flag !flex !items-center !justify-center !w-4 !h-4 lg:!w-6 lg:!h-6"></i>
			</button>
		</div>
		<?php if ( ! function_exists( 'wp_body_open' ) ) {
			function wp_body_open() {
				do_action( 'wp_body_open' );
			}
		} ?>

		<?php require get_template_directory() . "/theme-parts/load-menu-functionality.php"; ?>
		
		<header class="bg-bread-vivid" role="banner" x-cloak x-data="{ menu_loaded: true }" x-show="menu_loaded">
			<?php if (is_front_page()) : require get_template_directory() . "/theme-parts/top-banner.php"; endif; ?>
			<?php require get_template_directory() . "/theme-parts/navigation.php"; // load-brand.php above inject the brand's logo from the theme's settings in the backend. ?> 				
		</header>