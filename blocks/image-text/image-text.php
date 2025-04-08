<?php
/**
 * Block template file: image-text.php
 *
 * Image Text Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'image-text-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-image-text';
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
	$heading = get_field( 'heading' );
	$subtitle = get_field( 'subtitle' );
	$content = get_field( 'content' );
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 bg-honey">

	<div class="container px-6 pb-12 md:pb-16 pt-2 lg:pt-24 xl:py-28 mx-auto relative">

		<?php $icon = get_field( 'icon' ); ?>
		<?php if ( $icon ) : ?>
			<div class="w-full absolute -top-8 xl:-top-12 left-0 right-0 flex justify-center">
				<img class="w-36 h-36 xl:w-56 xl:h-56 object-cover aspect-square" src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
			</div>
		<?php endif; ?>

		<div class="mt-36 grid grid-cols-[1fr] lg:grid-cols-[1fr_1fr] grid-rows-[1fr_auto] lg:grid-rows-[1fr] [grid-template-areas:'lcontent''rcontent'] lg:[grid-template-areas:'lcontent_rcontent'] lg:space-x-12">
			<?php $image = get_field( 'image' ); ?>
			<?php if ( $image ) : ?>
				<div class="flex justify-end [grid-area:lcontent] mb-4 lg:mb-0">
					<img class="aspect-video lg:aspect-[5/6] object-cover xl:max-h-[67dvh] 2xl:max-h-[40dvh] h-full lg:min-h-[640px]" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
				</div>
			<?php endif; ?>
			<div class="flex flex-col items-start [grid-area:rcontent] w-auto 2xl:w-[70%]">
				<h1 class="text-white font-condensed font-semibold antialiased lowercase text-6xl md:text-7xl leading-[0.75em] xl:text-8xl xl:leading-[0.75em]"><?php echo $heading; ?></h1>
				<h2 class="text-white font-sans font-semibold text-3xl xl:text-5xl lowercase mt-2 xl:mt-6"><?php echo $subtitle; ?></h2>
				<p class="italic text-dark font-main font-normal text-base leading-[2rem] xl:text-lg xl:leading-[2.5rem] mt-4 xl:mt-6"><?php echo $content; ?></p>
				<?php $button = get_field( 'button' ); ?>
				<?php if ( $button ) : ?>
					<div class="bg-clip-text w-fit">
						<a class="btn transparent mt-4 xl:mt-6" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>">
							<?php echo esc_html( $button['title'] ); ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</div>

	</div>

</section>