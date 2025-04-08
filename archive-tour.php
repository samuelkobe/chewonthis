<?php get_header(); ?>

		<?php $img_args = array(
				'post_type' => 'tour',
				'posts_per_page' => -1, // Display all tours
				'order' => 'DESC',
				'orderby' => 'date',
		);
		$the_img_query = new WP_Query($img_args);

		$args = array(
				'post_type' => 'tour',
				'search_filter_query_id' => 1,
				'posts_per_page' => -1, // Display all tours
				'order' => 'DESC',
				'orderby' => 'date',
		);
		$the_query = new WP_Query($args);

		$location_filter_shortcode = do_shortcode('[searchandfilter field="Location Field"]');
		$duration_filter_shortcode = do_shortcode('[searchandfilter field="Duration Field"]');
		$exp_type_filter_shortcode = do_shortcode('[searchandfilter field="Experience Type"]');
	?>
	<main role="main" class="bg-white">
		<section role="banner" class="relative">
			<div class="absolute inset-0 z-[5] flex items-center justify-center">
				<h1 class="heading-one text-white text-center w-full px-6">
					<span class="block">Chew On This</span>
						<span class="block text-5xl md:text-8xl xl:text-[8rem] font-main font-normal mt-4 md:mt-8">Tasty Tours</span>
					</h1>
			</div>
			<div class="swiper swiper-tours-loop">
				<?php if ($the_img_query->have_posts()) : ?>
					<div class="swiper-wrapper">
						<?php while ($the_img_query->have_posts()) : $the_img_query->the_post(); ?>
							<div class="swiper-slide">
								<?php 
									$img_title = get_the_title($the_img_query->ID);
									$img_url = get_the_post_thumbnail_url($the_img_query->ID);
								?>
								<?php if ($img_url) : ?>
									<div class="w-full h-[25dvh] min-h-[240px] md:min-h-[400px] md:h-[40dvh] xl:h-[60dvh] xl:min-h-[640px] bg-cover bg-center relative" style="background-image: url('<?php echo $img_url; ?>');">
										<div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center"></div>
									</div>
								<?php endif; ?>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
		<section class="container mx-auto bg-[#ffffff] shadow-md px-6 md:px-12 py-6 md:py-12 md:rounded-xl transform md:-translate-y-20 xl:-translate-y-24 relative z-[5]" aria-label="filter wrapper">
			<div class="w-full container mx-auto grid grid-cols-12 gap-4 xl:gap-8"> 
				<div class="col-span-10 lg:col-span-6 2xl:col-span-5 flex items-center mb-2 lg:mb-0">
					<p class="text-xl sm:text-2xl 2xl:text-4xl font-sans font-normal text-clay lowercase"><?php bloginfo('description'); ?></p>
				</div>
				<div class="col-span-12 sm:col-span-6 lg:col-start-7 lg:col-span-2">
					<?php echo $location_filter_shortcode; ?>
				</div>
				<div class="col-span-12 sm:col-span-6 lg:col-span-2">
					<?php echo $duration_filter_shortcode; ?>
				</div>
				<div class="col-span-12 sm:col-span-6 lg:col-span-2">
					<?php echo $exp_type_filter_shortcode; ?>
				</div>
			</div>
		</section>
		<section class="px-6 py-12 md:pt-0 xl:pb-24">
			<div class="container mx-auto">
				<?php if ($the_query->have_posts()) : ?>
					<div class="grid grid-cols-12 gap-y-8 sm:gap-8 2xl:gap-16">
						<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

						<?php 
							//Get ACF title, discriptor for tour
							$tour_title = get_field('title', $the_query->ID );
							$tour_discriptor = get_field( 'tour_discriptor', $the_query->ID );
							$tour_features = get_field( 'tour_features', $the_query->ID );
							$tour_theme = get_field( 'tour_theme', $the_query->ID );
							$starting_cost = get_field( 'starting_cost', $the_query->ID );
							$starting_cost_text = get_field( 'starting_cost_text', $the_query->ID );
							// Get the location terms using $post
							$location_terms = get_the_terms( $the_query->ID, 'location' );
							if ( ! empty( $location_terms ) ) {
								// Display the location terms
								$location_names = array();
								foreach ( $location_terms as $term ) {
										$location_names[] = $term->name;
								}
								$locations = implode(', ', $location_names);
								}
						?>
							
						<div class="max-w-[320px] mx-auto md:mx-0 md:max-w-none col-span-12 md:col-span-6 lg:col-span-4 2xl:col-span-3 shadow-md rounded-md overflow-hidden">
							<div class="flex justify-center w-full h-auto rounded-md">
								<div class="rounded-md flex flex-col w-full h-full">

									<a class="h-56 xl:h-64 flex w-full relative" href="<?php the_permalink(); ?>" title="View the <?php echo $locations . ": " . $tour_title; ?> tour." aria-label="Open the <?php echo $locations . ": " . $tour_title; ?> tour.">
										<?php the_post_thumbnail('full', array('class' => 'object-cover h-full w-full')); ?>
										<span class="capitalize font-main italic font-semibold tracking-wider text-sm lg:text-xs xl:text-sm antialiased bg-<?php echo $tour_theme; ?> absolute bottom-0 left-0 right-0 text-center text-white p-1"><?php echo $tour_features; ?></span>
									</a>

									<div class="bg-[#ffffff] min-h-[280px] lg:h-[45%] py-6 px-12 flex items-center justify-between flex-col gap-y-4">
										<div class="flex flex-col justify-between">
											<a href="<?php the_permalink(); ?>" class="flex items-center h-[4.5rem] lg:h-[4rem] xl:h-[4.5rem]">
												<h2 class="font-condensed font-semibold uppercase tracking-wide text-3xl lg:text-2xl xl:text-3xl text-dark text-center w-full"><?php echo $locations . ": " . $tour_title; ?></h2>
											</a>
										</div>
										<div class="flex items-center">
											<h4 class="text-center uppercase font-condensed tracking-wider text-xl lg:text-lg xl:text-xl antialiased"><?php echo $tour_discriptor; ?></h4>
										</div>
										<div class="flex flex-col items-center justify-center">
											<a class="btn small hover:!bg-<?php echo $tour_theme; ?>" href="<?php the_permalink(); ?>" title="View the <?php echo $locations . ": " . $tour_title; ?> tour." aria-label="Open the <?php echo $locations . ": " . $tour_title; ?> tour.">
												View Tour
											</a>
											<?php if ( get_field( 'cost_type_toggle' ) == 1 ) : ?>
													<h5 class="font-sans uppercase text-xs lg:text-sm text-clay text-center font-medium mt-2">From <span class="text-lg lg:text-xl font-medium text-dark">$<?php echo $starting_cost; ?></h5>
												<?php else : ?>
													<h5 class="font-sans uppercase text-xs lg:text-sm text-clay text-center font-medium mt-2"><span class="text-lg lg:text-xl font-medium text-dark"><?php echo $starting_cost_text; ?></h5>
											<?php endif; ?>
										</div>
									</div>

								</div>
							</div>
						</div>
							
						<?php endwhile;?>

						<?php wp_reset_postdata(); ?>
					</div>
					<?php else : ?>
						// No tours found
				<?php endif; ?>
			</div>
		</section>
	</main>

	<script type="module">
		import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

		const swiper = new Swiper('.swiper-tours-loop', {
		// Optional parameters
		loop: true,
		slidesPerView: 1,
		centeredSlides: true,
		autoplay: {
			pauseOnMouseEnter: true,
			delay: 4000,
		},

		// If we need pagination
		pagination: {
			el: '.swiper-pagination',
			dynamicBullets: true,
			dynamicMainBullets: 1,
			clickable: true
		},
	});
	</script>

<?php get_footer(); ?>