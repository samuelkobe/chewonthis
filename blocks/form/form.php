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
	$email = get_field( 'email' );
	$form = get_field( 'form' );

	switch ($colour_scheme) {
		case 'bread':
			$background_colour = 'bg-bread-vivid';
			$heading_colour = 'text-paprika';
			$content_colour = 'text-dark';
			break;
		case 'paprika':
			$background_colour = 'bg-paprika';
			$heading_colour = 'text-white';
			$content_colour = 'text-white';
			break;
		case 'forest':
			$background_colour = 'bg-forest';
			$heading_colour = 'text-white';
			$content_colour = 'text-white';
			break;
		case 'honey':
			$background_colour = 'bg-honey';
			$heading_colour = 'text-white';
			$content_colour = 'text-white';
			break;
		case 'caramel':
			$background_colour = 'bg-caramel';
			$heading_colour = 'text-white';
			$content_colour = 'text-white';
			break;
		case 'dark':
			$background_colour = 'bg-clay';
			$heading_colour = 'text-white';
			$content_colour = 'text-white';
			break;
		case 'white':
			$background_colour = 'bg-white';
			$heading_colour = 'text-paprika';
			$content_colour = 'text-dark';
			break;
		default:
			$background_colour = 'bg-bread';
			$heading_colour = 'text-paprika';
			$content_colour = 'text-dark';
			break;
	}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 <?php echo $background_colour; ?>">

	<div class="container px-6 py-12 xl:py-28 mx-auto font-semibold font-main">
		<div class="grid grid-cols-12">
			<div class="col-span-12 lg:col-span-4">
				<h1 class="uppercase font-sans font-semibold tracking-widest text-2xl xl:text-[35px] xl:leading-normal w-full mb-4 xl:mb-6 <?php echo $heading_colour; ?>"><?php echo $heading; ?></h1>
				<p class="w-full font-main font-normal text-sm xl:text-lg xl:leading-[2.5rem] <?php echo $content_colour; ?>"><?php echo $content; ?></p>
				<div class="mt-12 md:mt-16">
					<p>Questions? Email us at:</p>
					<a class="hover:text-paprika hover:border-paprika-vivid transition-colors duration-300 border-b-2 md:!border-none md:border-b-transparent border-b-dark w-fit" href="mailto:<?php echo get_field( 'email', 'option' ); ?>" target="_blank"><?php the_field( 'email', 'option' ); ?></a>
				</div>
			</div>
			<div class="col-span-12 lg:col-span-8">
				<?php echo $form; ?>
			</div>
		</div>
	</div>

</section>