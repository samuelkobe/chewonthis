<?php
/**
 * Block template file: main-hero.php
 *
 * Main Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'main-hero-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-main-hero';
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

<?php if ( get_field( 'main_hero_image' ) ) : 
	$background_image_url = get_field( 'main_hero_image' );
endif ?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> bg-bread-vivid bg-center bg-cover relative" style="<?php echo $background_image_url ? 'background-image: url(' . esc_url( $background_image_url ) . ');' : ''; ?>">
	<div class="absolute inset-0 bg-black opacity-50 z-0"></div>
	<div class="container py-16 px-6 lg:py-24 mx-auto min-h-[400px] flex flex-col items-center justify-center text-center lg:min-h-[50rem] relative z-1">
		<div class="mb-4">
			<h1 class="heading-one text-white text-center w-full mb-4 xl:mb-6"><?php the_field( 'main_hero_heading' ); ?></h1>
			<div class="w-full text-center text-white content large px-0 xl:px-1/12"><?php the_field( 'main_hero_content' ); ?></div>
		</div>

		<?php $main_hero_button = get_field( 'main_hero_button' ); ?>
		<?php if ( $main_hero_button ) : ?>
			<a class="btn btn-paprika my-4" href="<?php echo esc_url( $main_hero_button['url'] ); ?>" target="<?php echo esc_attr( $main_hero_button['target'] ); ?>"><?php echo esc_html( $main_hero_button['title'] ); ?></a>
		<?php endif; ?>

		<?php if ( have_rows( 'emphasized_points' ) ) : ?>
			<div class="main-hero-emphasized-points flex flex-col xl:flex-row text-white gap-x-2 my-6">
				<?php while ( have_rows( 'emphasized_points' ) ) : the_row(); ?>
					<?php
						$icon = get_sub_field( 'point_icon' );
						$title = get_sub_field( 'point_title' );
					?>
					<div class="main-hero-point inline xl:inline-block whitespace-nowrap my-1 xl:my-0">
						<?php
						// Only handle dashicon array method
						if ( is_array( $icon ) && isset( $icon['type'], $icon['value'] ) && $icon['type'] === 'dashicons' ) {
							echo '<span class="xl:hidden dashicons ' . esc_attr( $icon['value'] ) . '"></span>';
						}
						?>
						<?php if ( $title ) : ?>
							<span class="main-hero-point-title content large"><?php echo esc_html( $title ); ?></span>
						<?php endif; ?>
						<?php
						// Add comma after each point except the last one (on desktop)
						if ( get_row_index() < count( get_field( 'emphasized_points' ) ) ) {
							echo '<span class="hidden xl:inline">, </span>';
						}
						?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

	</div>
</section>


