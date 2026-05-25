<?php
/**
 * Block template file: partners.php
 *
 * Partners Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'partners-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-partners';
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
			background-color: #BF4427;
			width: 20px;
			height: 20px;
			/* opacity: 0; */
		}
		.swiper-pagination-bullet-active {
			width: 20px;
			height: 20px;
			opacity: 1;
		}
		.swiper-pagination-bullet-active-prev,
		.swiper-pagination-bullet-active-next {
			opacity: 0.7;
		}
		/* .swiper-pagination-bullet-active-prev-prev,
		.swiper-pagination-bullet-active-next-next {
			opacity: 0;
		} */
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

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 bg-white">

	<div class="py-6">
		<h2 class="font-condensed font-semibold antialiased uppercase tracking-widest text-base xl:text-lg text-dark text-center w-full"><?php the_field( 'title' ); ?></h2>
		<div class="swiper swiper-<?php echo $id; ?> h-full editor-disable !pt-8 xl:!pt-16 !pb-16 xl:!pb-24 relative">
			<?php if ( have_rows( 'partners' ) ) : ?>
				<div class="swiper-wrapper w-full h-full">
				<?php while ( have_rows( 'partners' ) ) : the_row(); ?>

				<div class="swiper-slide !flex items-center justify-center h-full w-full relative">
					<?php $link = get_sub_field( 'link' ); ?>
					<?php if ( $link ) : ?>
						<a class="w-fit inline-block" href="<?php echo esc_url( $link['url'] ); ?>" aria-label="<?php echo esc_html( $link['title'] ); ?>" title="Visit: <?php echo esc_html( $link['title'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>">
							<?php $logo = get_sub_field( 'logo' ); ?>
							<?php if ( $logo ) : ?>
								<img class="w-24 max-h-24 object-cover aspect-square" src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_html( $link['title'] ); ?> logo or icon" />
							<?php endif; ?>
						</a>
					<?php endif; ?>
				</div>

					<?php endwhile; ?>
			</div>
				<?php else : ?>
					<?php // No rows found ?>
				<?php endif; ?>
				<div class="absolute bottom-0 left-0 right-0 w-auto mx-auto">
					<!-- <div class="swiper-button-prev absolute left-0"></div> -->
					<div class="swiper-pagination"></div>
					<!-- <div class="swiper-button-next absolute right-0"></div> -->
				</div>
		</div>
	</div>

</section>

<script type="module">
  import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

  // Count the number of slides
  const slideCount = document.querySelectorAll('.swiper-<?php echo $id; ?> .swiper-slide').length;
  // Set the maximum slidesPerView from breakpoints
  const maxSlidesPerView = 12;
  // Only enable loop if there are more slides than the maximum slidesPerView
  const enableLoop = slideCount > maxSlidesPerView;

  const swiper = new Swiper('.swiper-<?php echo $id; ?>', {
	loop: enableLoop,
	initialSlide: Math.floor(slideCount / 2),
	slidesPerView: 3,
	centeredSlides: true,
	autoplay: {
	  delay: 4000,
	},
	// navigation: {
	//   nextEl: '.swiper-button-next',
	//   prevEl: '.swiper-button-prev',
	// },
	pagination: {
	  el: '.swiper-pagination',
	  dynamicBullets: true,
	  dynamicMainBullets: 1,
	  clickable: true
	},
	breakpoints: {
	  768: {
		slidesPerView: 4,
	  },
	  1024: {
		slidesPerView: 6,
	  },
	  1280: {
		slidesPerView: 8,
	  },
	  1920: {
		slidesPerView: 12,
	  },
	}
  });
</script>