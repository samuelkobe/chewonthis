<?php
/**
 * Block template file: fifty-fifty.php
 *
 * Fifty Fifty Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'fifty-fifty-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-fifty-fifty';
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

<?php
	// Get the colour scheme
	// Styles so they appear in the CSS aspect-square aspect-video aspect-portrait aspect-landscape
	$block_section_y_padding = 'last:pb-16';
	if ( is_single() ) : // Checking to see if the page is blog post
		$heading_tag = 'h2';
		$subheading_tag = 'h3';
		$block_y_padding = 'pb-8 md:pt-20';
	else :
		$heading_tag = 'h1';
		$subheading_tag = 'h2';
		$block_y_padding = 'py-8 lg:py-12 xl:py-28';
	endif;
	$colour_scheme = get_field( 'block_colour_scheme' );
	switch ($colour_scheme) {
		case 'bread':
			$background_colour = 'bg-bread-vivid';
			$heading_colour = 'text-paprika';
			$subheading_colour = 'text-paprika';
			$content_colour = 'text-dark';
			$button_styles = 'btn mt-6 xl:mt-12';
			break;
		case 'paprika':
			$background_colour = 'bg-paprika';
			$heading_colour = 'text-white';
			$subheading_colour = 'text-white';
			$content_colour = 'text-white';
			$button_styles = 'btn alt mt-6 xl:mt-12';
			break;
		case 'forest':
			$background_colour = 'bg-forest';
			$heading_colour = 'text-white';
			$subheading_colour = 'text-white';
			$content_colour = 'text-white';
			$button_styles = 'btn alt mt-6 xl:mt-12';
			break;
		case 'honey':
			$background_colour = 'bg-honey';
			$heading_colour = 'text-white';
			$subheading_colour = 'text-white';
			$content_colour = 'text-white';
			$button_styles = 'btn alt mt-6 xl:mt-12';
			break;
		case 'caramel':
			$background_colour = 'bg-caramel';
			$heading_colour = 'text-white';
			$subheading_colour = 'text-white';
			$content_colour = 'text-white';
			$button_styles = 'btn alt mt-6 xl:mt-12';
			break;
		case 'dark':
			$background_colour = 'bg-clay';
			$heading_colour = 'text-white';
			$subheading_colour = 'text-white';
			$content_colour = 'text-white';
			$button_styles = 'btn alt mt-6 xl:mt-12';
			break;
		case 'white':
			$background_colour = 'bg-white';
			$heading_colour = 'text-paprika';
			$subheading_colour = 'text-paprika';
			$content_colour = 'text-dark';
			$button_styles = 'btn mt-6 xl:mt-12';
			break;
		default:
			$background_colour = 'bg-bread';
			$heading_colour = 'text-paprika';
			$subheading_colour = 'text-paprika';
			$content_colour = 'text-dark';
			$button_styles = 'btn mt-6 xl:mt-12';
			break;
	}

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 <?php echo $background_colour;?> <?php echo $block_section_y_padding; ?>">

	<div class="container px-6 mx-auto relative xl:px-[10dvw] <?php echo $block_y_padding; ?>">

		<div class="flex flex-col lg:grid lg:grid-cols-[1fr_1fr] lg:grid-rows-[1fr] lg:[grid-template-areas:'lcontent_rcontent'] lg:gap-x-12">

			<?php if ( have_rows( 'left_side' ) ) : ?>
					<?php while ( have_rows( 'left_side' ) ) : the_row(); ?>

						<?php $left_content_type = get_sub_field( 'content_type' ); ?>
						<?php if ($left_content_type == 'text'): ?>
							<?php $heading = get_sub_field( 'heading' ); ?>
							<?php $subheading = get_sub_field( 'subheading' ); ?>
							<div class="flex flex-col items-start order-3 lg:order-1 md:[grid-area:lcontent] mb-4 lg:mb-0">
								<<?php echo $heading_tag?> class="font-sans font-semibold antialiased lowercase text-4xl md:text-5xl leading-[0.75em] xl:text-7xl xl:leading-[1] <?php echo $heading_colour;?>"><?php echo $heading; ?></<?php echo $heading_tag?>>
								<?php if (get_sub_field( 'subheading_toggle' ) == 1) : ?>
									<<?php echo $subheading_tag?> class="uppercase font-sans font-semibold tracking-widest text-base xl:text-[28px] xl:leading-normal w-full mt-3 xl:mt-6 <?php echo $subheading_colour; ?>"><?php echo $subheading; ?></<?php echo $subheading_tag?>>
								<?php endif; ?>
								<div class="font-main font-normal text-base leading-[2rem] xl:text-lg xl:leading-[2.5rem] mt-4 xl:mt-6 wysiwyg <?php echo $content_colour;?>"><?php the_sub_field( 'content' ); ?></div>
								<?php if ( get_sub_field( 'button_toggle' ) == 1 ) : ?>
									<?php $button = get_sub_field( 'button' ); ?>
									<?php if ( $button ) : ?>
										<div class="bg-clip-text w-fit">
											<a class="<?php echo $button_styles;?>" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>">
												<?php echo esc_html( $button['title'] ); ?>
											</a>
										</div>
									<?php endif; ?>
								<?php endif; ?>
							</div>
						<?php elseif  ($left_content_type == 'image'): ?>
							<div class="flex flex-col items-end order-2 md:[grid-area:lcontent] mb-4 lg:mb-0">
								<?php $image = get_sub_field( 'image' ); ?>
								<?php $aspect_ratio = get_sub_field( 'image_aspect_ratio' ); ?>
								<?php if ( $image ) : ?>
									<img class="w-full object-cover aspect-<?php echo $aspect_ratio;?>" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
								<?php endif; ?>
							</div>
						<?php elseif  ($left_content_type == 'video'): ?>
							<div class="flex flex-col items-end order-2 md:[grid-area:lcontent] mb-4 lg:mb-0">
								<?php if ( get_sub_field( 'video_source' ) == 1 ) : ?>

								<div class="w-full">
									<div class="video-embed">
											<?php echo get_sub_field( 'video_embed' ); ?>
									</div>
								</div>

								<?php else : ?>
									<div class="w-full aspect-video relative">
										<?php 
											if ( get_sub_field( 'video_file' ) ) :
												$video = get_sub_field( 'video_file' );
												$video_element = '<video
																						class="absolute top-0 left-0 w-full h-full object-cover"
																						preload="metadata"
																						muted
																						autoplay
																						loop
																						playsinline
																						src="' . $video . '"
																						type="video/mp4">
																						Sorry, your browser doesn\'t support embedded videos.
																					</video>';
											endif; ?>

										<?php echo $video_element;?>
									</div>
								<?php endif; ?>
							</div>

						<?php endif; ?>

					<?php endwhile; ?>
			<?php endif; ?>

			<?php if ( have_rows( 'right_side' ) ) : ?>
					<?php while ( have_rows( 'right_side' ) ) : the_row(); ?>

						<?php $right_content_type = get_sub_field( 'content_type' ); ?>
						<?php if ($right_content_type == 'text'): ?>
							<?php $heading = get_sub_field( 'heading' ); ?>
							<?php $subheading = get_sub_field( 'subheading' ); ?>
							<div class="flex flex-col items-start order-3 lg:order-1 md:[grid-area:rcontent] mb-4 lg:mb-0">
								<<?php echo $heading_tag?> class="font-sans font-semibold antialiased lowercase text-4xl md:text-5xl leading-[0.75em] xl:text-7xl xl:leading-[1] <?php echo $heading_colour;?>"><?php echo $heading; ?></<?php echo $heading_tag?>>
								<?php if (get_sub_field( 'subheading_toggle' ) == 1) : ?>
									<<?php echo $subheading_tag?> class="uppercase font-sans font-semibold tracking-widest text-base xl:text-[28px] xl:leading-normal w-full mt-3 xl:mt-6 <?php echo $subheading_colour; ?>"><?php echo $subheading; ?></<?php echo $subheading_tag?>>
								<?php endif; ?>
								<div class="font-main font-normal text-base leading-[2rem] xl:text-lg xl:leading-[2.5rem] mt-4 xl:mt-6 wysiwyg <?php echo $content_colour;?>"><?php the_sub_field( 'content' ); ?></div>
								<?php if ( get_sub_field( 'button_toggle' ) == 1 ) : ?>
									<?php $button = get_sub_field( 'button' ); ?>
									<?php if ( $button ) : ?>
										<div class="bg-clip-text w-fit">
											<a class="<?php echo $button_styles;?>" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>">
												<?php echo esc_html( $button['title'] ); ?>
											</a>
										</div>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						<?php elseif  ($right_content_type == 'image'): ?>
							<div class="flex flex-col items-end order-2 md:[grid-area:rcontent] mb-4 lg:mb-0">
								<?php $image = get_sub_field( 'image' ); ?>
								<?php $aspect_ratio = get_sub_field( 'image_aspect_ratio' ); ?>
								<?php if ( $image ) : ?>
									<img class="w-full object-cover aspect-<?php echo $aspect_ratio;?>" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
								<?php endif; ?>
							</div>
						<?php elseif  ($right_content_type == 'video'): ?>
							<div class="flex flex-col items-end order-2 md:[grid-area:rcontent] mb-4 lg:mb-0">
								<?php if ( get_sub_field( 'video_source' ) == 1 ) : ?>

								<div class="w-full h-full">
									<div class="video-embed">
											<?php echo get_sub_field( 'video_embed' ); ?>
									</div>
								</div>

								<?php else : ?>
									<div class="w-full aspect-video relative">
										<?php 
											if ( get_sub_field( 'video_file' ) ) :
												$video = get_sub_field( 'video_file' );
												$video_element = '<video
																						class="absolute top-0 left-0 w-full h-full object-cover"
																						preload="metadata"
																						muted
																						autoplay
																						loop
																						playsinline
																						src="' . $video . '"
																						type="video/mp4">
																						Sorry, your browser doesn\'t support embedded videos.
																					</video>';
											endif; ?>

										<?php echo $video_element;?>
									</div>
								<?php endif; ?>
							</div>

						<?php endif; ?>
						
					<?php endwhile; ?>
			<?php endif; ?>

		</div>

	</div>

</section>