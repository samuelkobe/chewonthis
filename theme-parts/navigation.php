	<?php if (is_front_page() && get_field( 'display_top_banner_toggle', 'option' ) == 1) : 
		 $front_page_banner_menu_spacer = true;
	else :
		$front_page_banner_menu_spacer = false; 
	endif; ?>

<nav x-data="{ mobileMenuIsOpen: false }" @click.away="mobileMenuIsOpen = false" class="flex items-center justify-between px-6 py-4 xl:py-8 bg-bread-vivid relative" aria-label="menu">
	
  <!-- Desktop Menu -->
  <?php webokstarter_nav_desktop(); ?>

	<a href="<?php echo get_home_url(); ?>" :class="mobileMenuIsOpen ? 'fill-white text-white z-20 duration-300' : null" class="fill-caramel md:hidden z-0 relative transition-colors duration-100 flex flex-row gap-x-2 items-center font-sans uppercase font-semibold text-paprika">
		<div :class="mobileMenuIsOpen ? 'fill-white text-white z-20 duration-300' : null" class="fill-caramel flex w-12 h-12">
			<?php $menu_icon_svg = get_field( 'menu_icon_svg', 'option', array('class' => 'w-16 md:hidden relative z-20') ); ?>
			<?php if ( is_string( $menu_icon_svg ) ) :
				echo $menu_icon_svg;
			endif; ?>
		</div>
		<?php bloginfo('name'); ?>
	</a>

	<!-- Mobile Menu Button -->
	<button x-data="{ bodyClass: 'overflow-hidden', $refs: { body: document.body }}" @click="mobileMenuIsOpen = !mobileMenuIsOpen; $nextTick(() => $refs.body.classList.toggle(bodyClass))" :aria-expanded="mobileMenuIsOpen" :class="mobileMenuIsOpen ? 'fixed right-6 z-20' : null" type="button" class="flex text-white dark:text-white md:hidden justify-end" aria-label="mobile menu" aria-controls="mobileMenu">
		<svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-8 stroke-caramel">
			<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
		</svg>
		<svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-8">
			<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
		</svg>
	</button>

	<!-- Mobile Menu -->
	<?php webokstarter_nav_mobile($front_page_banner_menu_spacer); ?>

	<?php require get_template_directory() . "/theme-parts/social-horizontal-mobile.php"; ?>	

</nav>