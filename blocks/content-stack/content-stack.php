<?php
/**
 * Block template file: content-stack.php
 *
 * Content Stack Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'content-stack-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-content-stack';
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
	$colour_scheme = get_field( 'block_colour_scheme' );
	$tag = get_field( 'tag' );
	$heading = get_field( 'heading' );
	$subheading = get_field( 'subheading' );
	$content = get_field( 'content' );
	if ( get_field( 'split_heading_toggle' ) == 1 ) {
		$heading_two = get_field( 'heading_two' );
	}
	if ($heading != '' && $content != '') {
		$button_margin = '';
	} else {
		$button_margin = '!my-4 xl:!my-12';
	}

	switch ($colour_scheme) {
		case 'bread':
			$background_colour = 'bg-bread-vivid';
			$tag_colour = 'text-paprika';
			$heading_colour = '!text-paprika';
			$subheading_colour = 'text-caramel';
			$heading_two_colour = 'text-caramel';
			$content_colour = 'text-dark'; // for all switch cases, the content colour is also the same colour for clusters and links
			$button_styles = 'btn mt-6 xl:mt-12';
			break;
		case 'paprika':
			$background_colour = 'bg-paprika';
			$tag_colour = 'text-white';
			$heading_colour = '!text-white';
			$subheading_colour = 'text-bread';
			$heading_two_colour = 'text-bread';
			$content_colour = 'text-white';
			$button_styles = 'btn alt mt-6 xl:mt-12';
			break;
		case 'forest':
			$background_colour = 'bg-forest';
			$tag_colour = 'text-white';
			$heading_colour = '!text-white';
			$subheading_colour = 'text-bread';
			$heading_two_colour = 'text-bread';
			$content_colour = 'text-white';
			$button_styles = 'btn alt mt-6 xl:mt-12';
			break;
		case 'honey':
			$background_colour = 'bg-honey';
			$tag_colour = 'text-white';
			$heading_colour = '!text-white';
			$subheading_colour = 'text-bread';
			$heading_two_colour = 'text-bread';
			$content_colour = 'text-white';
			$button_styles = 'btn alt mt-6 xl:mt-12';
			break;
		case 'caramel':
			$background_colour = 'bg-caramel';
			$tag_colour = 'text-white';
			$heading_colour = '!text-white';
			$subheading_colour = 'text-bread';
			$heading_two_colour = 'text-bread';
			$content_colour = 'text-white';
			$button_styles = 'btn alt mt-6 xl:mt-12';
			break;
		case 'dark':
			$background_colour = 'bg-clay';
			$tag_colour = 'text-white';
			$heading_colour = '!text-white';
			$subheading_colour = 'text-caramel';
			$heading_two_colour = 'text-bread';
			$content_colour = 'text-white';
			$button_styles = 'btn alt mt-6 xl:mt-12';
			break;
		case 'white':
			$background_colour = 'bg-white';
			$tag_colour = 'text-paprika';
			$heading_colour = '!text-paprika';
			$subheading_colour = 'text-caramel';
			$heading_two_colour = 'text-caramel';
			$content_colour = 'text-dark';
			$button_styles = 'btn mt-6 xl:mt-12';
			break;
		default:
			$background_colour = 'bg-bread';
			$tag_colour = 'text-paprika';
			$heading_colour = '!text-paprika';
			$subheading_colour = 'text-paprika';
			$heading_two_colour = 'text-caramel';
			$content_colour = 'text-dark';
			$button_styles = 'btn mt-6 xl:mt-12';
			break;
	}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 <?php echo $background_colour; ?>">

	<div class="container px-6 py-12 xl:py-28 mx-auto">

		<h3 class="text-center uppercase font-sans font-semibold tracking-widest text-[20px] xl:text-[32px] w-full mb-2 xl:mb-4 <?php echo $tag_colour; ?>"><?php echo $tag; ?></h3>
		<?php if (get_field( 'split_heading_toggle' ) == 1) : ?>
			<h1 class="heading-one text-center w-full mb-4 xl:mb-6 lg:px-1/8 2xl:px-[20%] xl:leading-[4rem] <?php echo $heading_colour; ?>"><?php echo $heading; ?> <span class="<?php echo $heading_two_colour; ?>"><?php echo $heading_two; ?></span></h1>	
			<?php elseif ($heading != '') : ?>
				<h1 class="heading-one text-center w-full mb-4 xl:mb-6 lg:px-1/8 2xl:px-[20%] xl:leading-[4rem] <?php echo $heading_colour; ?>"><?php echo $heading; ?></h1>
			<?php else : ?>
				<h1 class="heading-one text-center w-full mb-4 xl:mb-6 lg:px-1/8 2xl:px-[20%] xl:leading-[4rem] text-gray-400">Content Stack<br><span class="text-xl">(Add a Heading)</span></h1>
			<?php endif; ?>
				
		<?php if (get_field( 'subheading_toggle' ) == 1) : ?>
			<h3 class="text-center uppercase font-sans font-semibold tracking-widest text-[20px] xl:text-[32px] w-full mb-4 xl:mb-8 mt-6 xl:mt-12 <?php echo $subheading_colour; ?>"><?php echo $subheading; ?></h3>
		<?php endif; ?>

		<?php if (get_field( 'content_toggle' ) == 1): ?>
			<div class="w-full wysiwyg text-center content large px-0 lg:px-1/8 xl:px-[15%] <?php echo $content_colour; ?>"><?php echo $content; ?></div>
		<?php endif; ?>

		<?php if (get_field( 'clusters_toggle' ) == 1): ?>
			<?php if ( have_rows( 'clusters' ) ) : ?>
				<div class="grid grid-cols-4 lg:grid-cols-3 gap-x-4 xl:gap-x-16 2xl:gap-x-24 w-full py-4 md:py-8 <?php echo $content_colour; ?>">
					<?php while ( have_rows( 'clusters' ) ) : the_row(); ?>
						<div class="col-span-4 md:col-span-2 lg:col-span-1">
							<h3 class="uppercase font-sans font-semibold tracking-widest text-[20px] xl:text-[28px] 2xl:text-[32px] w-full mb-1 xl:mb-2 mt-4 xl:mt-8 <?php echo $heading_colour; ?>"><?php the_sub_field( 'cluster_title' ); ?></h3>
							<p class="text-base xl:text-xl <?php echo $content_colour; ?>"><?php the_sub_field( 'cluster_content' ); ?></p>
						</div>
					<?php endwhile; ?>
				</div>
			<?php else : ?>
				<?php // No rows found ?>
			<?php endif; ?>
		<?php endif; ?>

		<?php if (get_field( 'links_toggle' ) == 1): ?>
			<?php if ( have_rows( 'links' ) ) : ?>
				<div class="gap-4 lg:gap-6 py-4 md:py-8 xl:py-16 grid grid-flow-row lg:grid-flow-col [grid-template-columns:auto] sm:[grid-template-columns:auto_auto] md:[grid-template-columns:auto_auto_auto] [grid-template-rows:auto_auto_auto_auto_auto_auto_auto_auto_auto_auto_auto] lg:[grid-template-rows:auto_auto_auto_auto_auto_auto_auto_auto_auto_auto_auto_auto_auto_auto] xl:[grid-template-rows:auto_auto_auto_auto_auto_auto_auto_auto_auto_auto_auto_auto_auto_auto_auto_auto_auto_auto_auto]">
					<?php while ( have_rows( 'links' ) ) : the_row(); ?>
						<?php $link = get_sub_field( 'link' ); ?>
						<?php if ( $link ) : ?>
							<a class="underline uppercase font-sans font-semibold text-xl lg:text-2xl tracking-widest <?php echo $content_colour; ?>" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			<?php else : ?>
				<?php // No rows found ?>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( get_field( 'button_toggle' ) == 1 ) : ?>
			<?php $button = get_field( 'button' ); ?>
			<?php if ( $button ) : ?>
				<div class="bg-clip-text w-full flex justify-center">
					<a class="<?php echo $button_styles . ' '. $button_margin;?>" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>">
						<?php echo esc_html( $button['title'] ); ?>
					</a>
				</div>
			<?php endif; ?>
		<?php endif; ?>

	</div>

</section>