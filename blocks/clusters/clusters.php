<?php
/**
 * Block template file: clusters.php
 *
 * Clusters Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'clusters-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-clusters';
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
	if ( get_field( 'padding_toggle' ) == 1 ) :
		$padding = 'py-12 xl:py-28';
	else :
		$padding = 'pb-4 xl:pb-12';
	endif;

	switch ($colour_scheme) {
		case 'bread':
			$background_colour = 'bg-bread-vivid';
			$tag_colour = 'text-paprika';
			$heading_colour = 'text-paprika';
			$subheading_colour = 'text-paprika';
			$heading_two_colour = 'text-caramel';
			$content_colour = 'text-dark'; // for all switch cases, the content colour is also the same colour for clusters and links
			break;
		case 'paprika':
			$background_colour = 'bg-paprika';
			$tag_colour = 'text-white';
			$heading_colour = 'text-white';
			$subheading_colour = 'text-bread';
			$heading_two_colour = 'text-bread';
			$content_colour = 'text-white';
			break;
		case 'forest':
			$background_colour = 'bg-forest';
			$tag_colour = 'text-white';
			$heading_colour = 'text-white';
			$subheading_colour = 'text-bread';
			$heading_two_colour = 'text-bread';
			$content_colour = 'text-white';
			break;
		case 'honey':
			$background_colour = 'bg-honey';
			$tag_colour = 'text-white';
			$heading_colour = 'text-white';
			$subheading_colour = 'text-bread';
			$heading_two_colour = 'text-bread';
			$content_colour = 'text-white';
			break;
		case 'caramel':
			$background_colour = 'bg-caramel';
			$tag_colour = 'text-white';
			$heading_colour = 'text-white';
			$subheading_colour = 'text-bread';
			$heading_two_colour = 'text-bread';
			$content_colour = 'text-white';
			break;
		case 'dark':
			$background_colour = 'bg-clay';
			$tag_colour = 'text-white';
			$heading_colour = 'text-white';
			$subheading_colour = 'text-caramel';
			$heading_two_colour = 'text-bread';
			$content_colour = 'text-white';
			break;
		case 'white':
			$background_colour = 'bg-white';
			$tag_colour = 'text-paprika';
			$heading_colour = 'text-paprika';
			$subheading_colour = 'text-caramel';
			$heading_two_colour = 'text-caramel';
			$content_colour = 'text-dark';
			break;	
		default:
			$background_colour = 'bg-bread';
			$tag_colour = 'text-paprika';
			$heading_colour = 'text-paprika';
			$subheading_colour = 'text-paprika';
			$heading_two_colour = 'text-caramel';
			$content_colour = 'text-dark';
			break;
	}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 <?php echo $background_colour; ?>">

	<div class="container px-6 mx-auto <?php echo $padding; ?>">
		
		<?php if ( have_rows( 'clusters' ) ) : ?>
			<div class="grid grid-cols-4 lg:grid-cols-3 gap-x-4 xl:gap-x-16 w-full <?php echo $content_colour; ?>">
				<?php while ( have_rows( 'clusters' ) ) : the_row(); ?>
					<div class="col-span-4 md:col-span-2 lg:col-span-1">
						<?php if (get_sub_field( 'cluster_type_toggle' ) == 0): ?>
							<h3 class="uppercase font-sans font-semibold tracking-widest text-[1.875rem] xl:text-[48px] w-full mb-1 xl:mb-2 mt-4 xl:mt-8 2xl:w-3/4"><?php the_sub_field( 'cluster_title' ); ?></h3>
						<?php else: ?>
							<h3 class="uppercase font-sans font-semibold tracking-widest text-[20px] xl:text-[32px] w-full mb-1 xl:mb-2 mt-4 xl:mt-8"><?php the_sub_field( 'cluster_title' ); ?></h3>
						<?php endif; ?>
						<p class="text-base xl:text-xl <?php echo $content_colour; ?>"><?php the_sub_field( 'cluster_content' ); ?></p>
					</div>
				<?php endwhile; ?>
			</div>
			
		<?php else : ?>
			<?php // No rows found ?>
		<?php endif; ?>

	</div>

</section>