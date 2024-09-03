<?php
/**
 * Block template file: cta.php
 *
 * Cta Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cta-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-cta';
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
	$heading = get_field( 'heading' );
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
		case 'default':
			$background_colour = 'bg-bread';
			$heading_colour = 'text-paprika';
			$heading_two_colour = 'text-caramel';
			$content_colour = 'text-dark';
			$button_styles = 'btn alt mt-6 xl:mt-12';
			break;
		case 'alt':
			$background_colour = 'bg-paprika';
			$heading_colour = 'text-bread';
			$heading_two_colour = 'text-white';
			$content_colour = 'text-white';
			$button_styles = 'btn alt mt-6 xl:mt-12';
			break;
		case 'tertiary':
			$background_colour = 'bg-white';
			$heading_colour = 'text-caramel';
			$heading_two_colour = 'text-caramel-vivid';
			$content_colour = 'text-dark';
			$button_styles = 'btn mt-6 xl:mt-12';
			break;
		case 'dark':
			$background_colour = 'bg-clay';
			$heading_colour = 'text-bread';
			$heading_two_colour = 'text-white';
			$content_colour = 'text-white';
			$button_styles = 'btn alt';
			break;

		default:
			# code...
			break;
	}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 <?php echo $background_colour; ?>">

	<div class="container px-6 py-12 xl:py-28 mx-auto">

		<?php if (get_field( 'split_heading_toggle' ) == 1 && $heading != '') : ?>
			<h1 class="heading-one text-center w-full mb-4 xl:mb-6 <?php echo $heading_colour; ?>"><?php echo $heading; ?> <span class="<?php echo $heading_two_colour; ?>"><?php echo $heading_two; ?></span></h1>	
		<?php elseif ($heading != ''): ?>
			<h1 class="heading-one text-center w-full mb-4 xl:mb-6 <?php echo $heading_colour; ?>"><?php echo $heading; ?></h1>
		<?php endif; ?>

		<?php if ($content != ''): ?>
			<p class="w-full text-center content large px-0 lg:px-1/8 xl:px-[15%] <?php echo $content_colour; ?>"><?php echo $content; ?></p>
		<?php endif; ?>

		<?php $button = get_field( 'button' ); ?>
		<?php if ( $button ) : ?>
			<div class="bg-clip-text w-full flex justify-center">
				<a class="<?php echo $button_styles . ' '. $button_margin;?>" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>">
					<?php echo esc_html( $button['title'] ); ?>
				</a>
			</div>
		<?php endif; ?>

	</div>

</section>