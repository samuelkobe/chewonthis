<?php
/**
 * Block template file: testimonials.php
 *
 * Testimonials Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonials-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-testimonials';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
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
	}
</style>

<?php
	$args = array(
			'post_type' => 'testimonial',
			'posts_per_page' => -1,
	);

	$testimonials_query = new WP_Query( $args );
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 bg-caramel">
		
	<div class="py-12 xl:py-24">

		<h1 class="heading-one text-center w-full mb-4 xl:mb-6 text-white"><?php the_field( 'heading' ); ?></h1>
		<div class="swiper swiper-<?php echo $id; ?> h-full editor-disable !pt-8 xl:!pt-16 !pb-16 xl:!pb-24 mb-8 xl:mb-16 relative">

			<?php
				if ( $testimonials_query->have_posts() ) : ?>
					<div class="swiper-wrapper w-full h-full">
					<?php while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post(); ?>
					<?php $post_data = get_the_ID(); ?>
					<div class="swiper-slide !flex flex-col items-center justify-center h-full w-full relative px-6">

						<?php
							$rating = get_field('rating', $post_data);
							// Generate the SVG star shapes
							$stars = '';
							for ($i = 1; $i <= $rating; $i++) {
									$stars .= '<svg class="w-4 fill-white" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m11.322 2.923c.126-.259.39-.423.678-.423.289 0 .552.164.678.423.974 1.998 2.65 5.44 2.65 5.44s3.811.524 6.022.829c.403.055.65.396.65.747 0 .19-.072.383-.231.536-1.61 1.538-4.382 4.191-4.382 4.191s.677 3.767 1.069 5.952c.083.462-.275.882-.742.882-.122 0-.244-.029-.355-.089-1.968-1.048-5.359-2.851-5.359-2.851s-3.391 1.803-5.359 2.851c-.111.06-.234.089-.356.089-.465 0-.825-.421-.741-.882.393-2.185 1.07-5.952 1.07-5.952s-2.773-2.653-4.382-4.191c-.16-.153-.232-.346-.232-.535 0-.352.249-.694.651-.748 2.211-.305 6.021-.829 6.021-.829s1.677-3.442 2.65-5.44z" fill-rule="nonzero"/></svg>';
							}
						?>
						<div class="flex flex-row items-center justify-between mb-4">
							<?php echo $stars; ?>
						</div>

						<?php $testimonial_text = wp_trim_words( get_field( 'testimonial', $post_data ), 24, '...' ); ?>
						<div class="flex flex-col text-white items-center justify-center text-center">
							<p class="font-main font-normal text-base"><?php echo $testimonial_text; ?></p>
							<span class="mt-2">- <?php echo get_field( 'author', $post_data ); ?></span>
						</div>

						

						<?php $associated_tour = get_field( 'associated_tour', $post_data ); ?>
						<?php if ( $associated_tour ) : ?>
							<?php foreach ( $associated_tour as $post_ids ) : ?>
								<a class="font-sans font-bold antialiased uppercase text-sm text-white text-center w-full mt-4" href="<?php echo get_permalink( $post_ids ); ?>"><?php echo get_the_title( $post_ids ); ?></a>
							<?php endforeach; ?>
						<?php endif; ?>

					</div>
					<?php endwhile; ?>
					</div>
				<?php else :
						echo 'No testimonials found for this tour';
				endif;

				wp_reset_postdata();
			?>

			<div class="absolute bottom-0 left-0 right-0 w-auto mx-auto">
				<div class="swiper-pagination"></div>
			</div>
		</div>

		<?php $button = get_field( 'button' ); ?>
		<?php if ( $button ) : ?>
			<div class="bg-clip-text w-full flex justify-center">
				<a class="btn transparent" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>">
					<?php echo esc_html( $button['title'] ); ?>
				</a>
			</div>
		<?php endif; ?>

	</div>

</section>

<script type="module">
  import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

  const swiper = new Swiper('.swiper-<?php echo $id; ?>', {
  // Optional parameters
	loop: true,
	initialSlide: 2,
  slidesPerView: 1,
	centeredSlides: true,
  spaceBetween: 64,
	autoplay: {
		delay: 4000,
	},

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
		dynamicBullets: true,
		dynamicMainBullets: 1,
    clickable: true
  },
	breakpoints: {
		640: {
			slidesPerView: 2,
		},
		768: {
			slidesPerView: 3,
		},
		1280: {
			slidesPerView: 4,
		},
		1920: {
			slidesPerView: 6,
		},
		2560: {
			slidesPerView: 8,
		}
	}
});
</script>