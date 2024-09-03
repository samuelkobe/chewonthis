<?php
/**
 * Block template file: hero.php
 *
 * Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-hero';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

// Query the tours post type
$args = array(
  'post_type'       => 'tour', // Tours post type
  'posts_per_page'  => -1, // Set to -1 to show all events
	'tax_query' => array(
        array(
            'taxonomy' => 'location', // Replace 'location' with your actual taxonomy name
            'field' => 'slug',
            'operator' => 'EXISTS'
        )
    )
);
$query = new WP_Query($args); // run the query.
$thumbnail_url = 'temp'

?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		.swiper-pagination-bullet {
			background-color: #FFF;
			width: 24px;
			height: 24px;
			opacity: 0;
		}
		.swiper-pagination-bullet-active {
			width: 28px;
			height: 28px;
			opacity: 1;
		}
		.swiper-pagination-bullet-active-prev,
		.swiper-pagination-bullet-active-next {
			opacity: 0.7;
		}
		.swiper-pagination-bullet-active-prev-prev,
		.swiper-pagination-bullet-active-next-next {
			opacity: 0;
		}
		/* .swiper-button-next,
		.swiper-button-prev {
			height: 48px;
			transform: translateY(-48%);
		}
		.swiper-button-prev:after {
			content: '◀';
			font-size: 24px;
			color: #FFF;
		}
		.swiper-button-next:after {
			content: '▶';
			font-size: 24px;
			color: #FFF;
		} */
	}
</style>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> bg-bread-vivid">

	<div class="container py-6 xl:pb-24 mx-auto">
		<div class="grid grid-cols-[64px_minmax(0,_auto)_64px] grid-rows-[120px_24dvh_24dvh_120px] [grid-template-areas:'social_slider_empty''social_slider_empty''arrow_slider_empty''arrow_slider_empty'] w-full h-full">

			<div class="[grid-area:social/social] flex justify-end px-6">
				<?php if ( get_field( 'social_media' ) == 1 ) : ?>
					<?php require get_template_directory() . "/theme-parts/social-vertical.php"; ?>
				<?php endif; ?>
			</div>
			
			<div class="[grid-area:slider/slider] flex">
				<div class="flex w-full h-full">
					<div class="swiper swiper-<?php echo $id; ?> h-full editor-disable">
						<?php if ($query->have_posts()) : ?>
							<div class="swiper-wrapper w-full h-full">
								<?php while ($query->have_posts()) : ?>

									<?php $query->the_post();
									// Get the post, ACF fields and taxonomies
									$tour_title = get_post_meta( get_the_ID(), 'title', true );
									$location_terms = get_the_terms( get_the_ID(), 'location' );
									$permalink = get_permalink();
									// Check if there are any location terms
									if ( ! empty( $location_terms ) ) {
										// Display the location terms
										$location_names = array();
										foreach ( $location_terms as $term ) {
												$location_names[] = $term->name;
										}
										$locations = implode(', ', $location_names);
										}
										?>

									<div class="swiper-slide flex items-center h-full w-full relative">
										<a href="<?php echo $permalink; ?>" title="Explore <?php echo $locations . ': ' . $tour_title; ?>" aria-label="Explore <?php echo $locations . ': ' . $tour_title; ?>">
											<?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover mix-blend-multiply' ) ); ?>
											<div class="absolute inset-0 w-full h-full bg-black opacity-50"></div>
											<div class="absolute left-0 bottom-0 pl-12 py-6">
												<span class="antialiased font-condensed font-bold text-3xl uppercase text-white tracking-widest [text-shadow:1px_1px_2px_rgba(2,2,2,0.25),0_0_1em_rgba(2,2,2,0.25),0_0_0.2em_rgba(2,2,2,0.25)]"><?php echo $locations . ': ' . $tour_title; ?></span>
											</div>
										</a>
									</div>
								<?php endwhile; ?>
							</div>
						<?php else :
							// No posts found
							echo 'No tours found.';
						endif;
						wp_reset_postdata(); ?>
						
						<div class="relative bottom-24 lg:bottom-4 left-0 right-0 w-48 mx-auto">
							<!-- <div class="swiper-button-prev absolute left-0"></div> -->
							<div class="swiper-pagination"></div>
							<!-- <div class="swiper-button-next absolute right-0"></div> -->
						</div>

					</div>
				</div>
			</div>

			<div class="[grid-area:arrow/arrow] flex justify-end px-6">	
				<?php $next_section_link = get_field( 'next_section_link' ); ?>
				<?php if ( $next_section_link ) : ?>
					<a href="<?php echo esc_url( $next_section_link['url'] ); ?>" target="<?php echo esc_attr( $next_section_link['target'] ); ?>" aria-label="Go to next section" role="button" tabindex="0" class="flex flex-col justify-end section_btn">				
						<span class="text-caramel text-xl font-bold font-main [writing-mode:vertical-rl] [text-orientation:mixed] transform -translate-x-[3px] rotate-180 mb-4"><?php echo esc_html( $next_section_link['title'] ); ?></span>
						<svg class="!fill-caramel" xmlns="http://www.w3.org/2000/svg " width="24" height="96" viewBox="0 0 6 24"><path d="M3.28,19.55V0.37H2.72v19.18H0.64L3,23.63l2.36-4.08H3.28z M1.6,20.1h2.8L3,22.53L1.6,20.1z"/></svg>
					</a>
				<?php endif; ?>
			</div>
		

			<div class="[grid-area:empty/empty]"></div>

		</div>
	</div>

</section>

<script type="module">
  import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

  const swiper = new Swiper('.swiper-<?php echo $id; ?>', {
  // Optional parameters
	loop: true,
	initialSlide: 1,
  slidesPerView: 1,
		autoplay: {
			delay: 10000,
		},
  // navigation: {
  //   nextEl: '.swiper-button-next',
  //   prevEl: '.swiper-button-prev',
  // },
  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
		dynamicBullets: true,
		dynamicMainBullets: 1,
    clickable: true
  },
});
</script>