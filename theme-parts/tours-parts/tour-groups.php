<?php if ( get_field( 'group_info_toggle' ) !== 0 ) : ?>

<style type="text/css">
	<?php echo '#group_' . $tour_id; ?> {
		/* Add styles that use ACF values here */
	}
</style>


<?php
	// Get the colour scheme
	$heading = get_field( 'heading' );
	$content = get_field( 'content' );
?>

<section id="<?php echo esc_attr( $tour_id); ?>" class="scroll-m-20 bg-paprika">

	<div class="container px-6 py-12 xl:py-28 mx-auto">

		<h2 class="heading-one text-center w-full mb-4 xl:mb-6 text-white"><?php echo $heading; ?></h2>

		<?php if ($content != ''): ?>
			<p class="w-full text-center content large px-0 lg:px-1/8 xl:px-[15%] text-white"><?php echo $content; ?></p>
		<?php endif; ?>

		<?php $button_groups = get_field( 'button_groups' ); ?>
		<?php if ( $button_groups ) : ?>
			<div class="bg-clip-text w-full flex justify-center">
				<a class="anchor-link btn alt-tour-<?php echo $tour_theme; ?> mt-6 xl:mt-12" href="<?php echo esc_url( $button_groups['url'] ); ?>" target="<?php echo esc_attr( $button_groups['target'] ); ?>">
					<?php echo esc_html( $button_groups['title'] ); ?>
				</a>
			</div>
		<?php endif; ?>

	</div>

</section>

<?php endif; ?>
