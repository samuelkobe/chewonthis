<?php
  $featured_image_id = get_post_thumbnail_id( $tour_id ); // Get the featured image ID.
  $featured_image_src = wp_get_attachment_image_src( $featured_image_id, 'full' ); // Get the featured image source.
?>

<section id="gallery_<?php echo $tour_id; ?>" class="scroll-m-20 bg-black">
  <div class="flex items-center justify-center h-[60dvh] w-full px-6 relative">
    <div class="bg-[#000] absolute inset-0 z-1 opacity-25"></div>
    <?php if ( $featured_image_id ) : ?>
      <img class="object-cover w-full h-full aspect-video absolute inset-0 z-0" src="<?php echo esc_url( $featured_image_src[0] ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
    <?php endif; ?>
    <div class="text-white font-main font-bold text-center uppercase z-[2] flex flex-col items-center justify-center space-y-4 xl:space-y-8 [text-shadow:2px_2px_16px_rgba(8,8,8,0.25),0_0_1em_rgba(8,8,8,0.25),0_0_0.2em_rgba(8,8,8,0.25)]">
      <span class="text-2xl xl:text-4xl inline-block tracking-[0.2em]"><?php echo $locations; ?></span>
      <h1 class="text-4xl md:text-6xl xl:text-8xl tracking-widest"><?php echo $tour_title; ?></h1>




      <?php if ( get_field( 'booking_type_toggle' ) == 1 ) : ?>

        <?php $button_hero = get_field( 'digitally_guided_url' ); ?>
        <?php if ( $button_hero != '' ) : ?>
          <div class="bg-clip-text w-full flex justify-center">
            <a class="btn alt-tour-<?php echo $tour_theme; ?> mt-4 xl:mt-8" href="<?php echo $button_hero; ?>" target="_blank">
              Book Now
            </a>
          </div>
        <?php endif; ?>

      <?php else: ?>

        <?php if ( have_rows( 'various_bookings_options' ) ): ?>
          <?php while ( have_rows( 'various_bookings_options' ) ) : the_row(); ?>
            <?php if ( get_row_layout() == 'digitally_guided' ) : ?>
              <?php $button_hero = get_sub_field( 'digitally_guided_url' ); ?>
              <?php if ( $button_hero != '' ) : ?>
                <div class="bg-clip-text w-full flex justify-center">
                  <a class="btn alt-tour-<?php echo $tour_theme; ?> mt-4 xl:mt-8" href="<?php echo $button_hero; ?>" target="_blank">
                    Book Now
                  </a>
                </div>
              <?php endif; ?>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>
        
      <?php endif; ?>


    </div>
  </div>
</section>