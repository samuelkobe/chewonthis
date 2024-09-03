<?php
/**
 * Block template file: featured.php
 *
 * Featured Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'featured-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-featured';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 bg-bread">

	<div class="container px-6 py-12 xl:py-24 mx-auto">
		<h1 class="heading-one text-paprika text-center w-full mb-4 xl:mb-6"><?php the_field( 'heading' ); ?></h1>
		<p class="w-full text-center content large px-0 xl:px-1/12"><?php echo get_field( 'content', false, false ); ?></p>
		<?php if ( have_rows( 'featured_tours' ) ) : ?>
			<div class="flex flex-col gap-y-12 lg:gap-y-0 lg:flex-row lg:gap-x-12 justify-between px-6 sm:px-1/8 lg:px-0 2xl:px-1/12 mx-auto mt-6 xl:mt-12">
				<?php while ( have_rows( 'featured_tours' ) ) : the_row(); ?>
					<?php $tour = get_sub_field( 'tour' ); ?>
					<?php if ( $tour ) : ?>
						<?php $post = $tour;
							setup_postdata( $post );
							$tour_title = get_field('title', $post );
							// Get the location terms using $post
							$location_terms = get_the_terms( $post->ID, 'location' );
							if ( ! empty( $location_terms ) ) {
								// Display the location terms
								$location_names = array();
								foreach ( $location_terms as $term ) {
										$location_names[] = $term->name;
								}
								$locations = implode(', ', $location_names);
								}
							// $location_terms = get_field('location', $post );
							$thumbnail_url = get_the_post_thumbnail_url($post);
							?> 

							<div class="flex justify-center w-full h-auto lg:aspect-[5/7]">
								<div class="bg-caramel flex flex-col w-full h-full rounded-xl overflow-hidden">
									<a href="<?php the_permalink($post); ?>" class="h-56 lg:h-[55%] flex w-full">
										<img class="object-cover h-full w-full" src="<?php echo $thumbnail_url; ?>" alt="<?php echo $tour_title; ?>">
									</a>
									<div class="bg-white h-auto lg:h-[45%] py-6 px-12 flex items-center justify-center flex-col gap-y-4">
										<a href="<?php the_permalink($post); ?>" class="flex items-center justify-center flex-col">
											<h2 class="font-condensed font-semibold uppercase tracking-wide text-3xl lg:text-xl xl:text-3xl text-dark text-center w-full mb-1"><?php echo $locations . ": " . $tour_title; ?></h2>
											<h3 class="uppercase font-condensed tracking-wider text-2xl lg:text-base xl:text-2xl antialiased"><?php the_field( 'tour_discriptor', $post ); ?></h3>
										</a>
										<h4 class="capitalize font-main italic tracking-wider text-sm xl:text-base antialiased"><?php the_field( 'tour_features', $post ); ?></h4>
										<a href="<?php the_permalink($post); ?>" class="font-medium text-base lg:text-sm xl:text-base hover:text-paprika transition-colors duration-300">book now +</a>
									</div>
								</div>
							</div>
							
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<?php // No rows found ?>
		<?php endif; ?>
		<?php $button = get_field( 'button' ); ?>


		<?php if ( $button ) : ?>
			<div class="bg-clip-text w-full flex justify-center">
				<a class="btn mt-6 xl:mt-12" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>">
					<?php echo esc_html( $button['title'] ); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>

</section>