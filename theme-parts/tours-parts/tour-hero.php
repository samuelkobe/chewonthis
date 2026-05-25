<?php
  $featured_image_id = get_post_thumbnail_id( $tour_id ); // Get the featured image ID.
  $featured_image_src = wp_get_attachment_image_src( $featured_image_id, 'full' ); // Get the featured image source.
?>

<section id="gallery_<?php echo $tour_id; ?>" class="scroll-m-20 bg-black">
  <div class="flex items-center justify-center h-[60dvh] w-full min-h-fit py-20 px-6 relative">
    <div class="bg-[#000] absolute inset-0 z-1 opacity-40"></div>
    <?php if ( $featured_image_id ) : ?>
      <img class="object-cover w-full h-full aspect-video absolute inset-0 z-0" src="<?php echo esc_url( $featured_image_src[0] ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
    <?php endif; ?>
    <div class="text-white font-main font-bold text-center uppercase z-[2] flex flex-col items-center justify-center space-y-4 xl:space-y-8 [text-shadow:2px_2px_16px_rgba(8,8,8,0.25),0_0_1em_rgba(8,8,8,0.25),0_0_0.2em_rgba(8,8,8,0.25)]">
      <span class="text-xl xl:text-3xl inline-block tracking-[0.2em]"><?php echo $locations; ?></span>
      <h1 class="text-4xl md:text-6xl xl:text-7xl tracking-widest !mt-2"><?php echo $tour_title; ?></h1>
      <h2 class="font-main italic font-light text-base xl:text-2xl text-white"><?php the_field( 'tour_features' ); ?></h2>
      <p class="text-base lg:text-lg font-main text-white normal-case font-normal sm:max-w-[80%] lg:max-w-2/3 transform lg:-translate-y-2">
        <?php if ( get_field('short_description') ) : ?>
          <?php the_field('short_description'); ?>
        <?php else: ?>
          Explore <?php echo $locations . "'s unforgettable <span class='font-bold'>" . $tour_title; ?></span> experience with Chew On This Tours. Discover breathtaking landscapes, rich culture, and unique adventures tailored just for you.
        <?php endif; ?>
      </p>

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
          <?php
            // Check if hero button override is enabled
            $hero_button_override = get_field( 'hero_button_override' );

            if ( $hero_button_override == 'on' ) {
              // Override enabled: Show individual booking type buttons (old behavior)
              $buttons = [];

              while ( have_rows( 'various_bookings_options' ) ) : the_row();
                $layout = get_row_layout();

                // Build buttons array based on layout type
                if ( $layout === 'digitally_guided' && get_sub_field( 'digitally_guided_url' ) != '' ) {
                  $buttons[] = [
                    'url' => get_sub_field( 'digitally_guided_url' ),
                    'label' => 'View Signature Itinerary Dates',
                    'target' => '_blank'
                  ];
                } elseif ( $layout === 'vip_guided' && get_sub_field( 'vip_guided_url' ) != '' ) {
                  $buttons[] = [
                    'url' => get_sub_field( 'vip_guided_url' ),
                    'label' => 'View Hosted Dates',
                    'target' => '_blank'
                  ];
                } elseif ( $layout === 'e-bike_tour' && get_sub_field( 'ebike_guided_url' ) != '' ) {
                  $buttons[] = [
                    'url' => get_sub_field( 'ebike_guided_url' ),
                    'label' => 'View E-Bike Dates',
                    'target' => '_blank'
                  ];
                } elseif ( $layout === 'chauffeur_guided' && get_sub_field( 'chauffeur_guided_url' ) != '' ) {
                  $buttons[] = [
                    'url' => get_sub_field( 'chauffeur_guided_url' ),
                    'label' => 'View Chauffeured Dates',
                    'target' => '_blank'
                  ];
                } elseif ( $layout === 'private_guided' && get_sub_field( 'private_guided_url' ) != '' ) {
                  $buttons[] = [
                    'url' => get_sub_field( 'private_guided_url' ),
                    'label' => 'View Private Dates',
                    'target' => '_blank'
                  ];
                } elseif ( $layout === 'group_option' && get_sub_field( 'group_url' ) != '' ) {
                  $buttons[] = [
                    'url' => get_sub_field( 'group_url' ),
                    'label' => 'Join a Group',
                    'target' => '_blank'
                  ];
                } elseif ( $layout === 'by_request' && get_sub_field( 'request_form' ) != '' ) {
                  $buttons[] = [
                    'url' => '#request_form',
                    'label' => get_sub_field('request_button_text') ?: 'Request Experience',
                    'target' => ''
                  ];
                }
              endwhile;

              // Reset rows
              reset_rows();
            } else {
              // Override disabled: Show simplified buttons (new behavior)
              $has_request = false;
              $has_other_bookings = false;
              $request_button_label = 'Request Experience';

              while ( have_rows( 'various_bookings_options' ) ) : the_row();
                $layout = get_row_layout();

                if ( $layout === 'by_request' ) {
                  $has_request = true;
                  $request_button_label = get_sub_field('request_button_text') ?: 'Request Experience';
                } else {
                  $has_other_bookings = true;
                }
              endwhile;

              // Reset the rows to use them again if needed
              reset_rows();
            }
          ?>

          <div class="bg-clip-text w-full flex flex-col items-center sm:flex-row sm:justify-center gap-4 mt-4 xl:mt-8">
            <?php if ( $hero_button_override == 'on' ) : ?>
              <?php // Display individual booking type buttons (override enabled) ?>
              <?php foreach ( $buttons as $button ) : ?>
                <a
                  class="anchor-link btn alt-tour-<?php echo $tour_theme; ?>"
                  href="<?php echo esc_url( $button['url'] ); ?>"
                  <?php if ( $button['target'] ) echo 'target="' . esc_attr( $button['target'] ) . '"'; ?>
                >
                  <?php echo esc_html( $button['label'] ); ?>
                </a>
              <?php endforeach; ?>
            <?php else : ?>
              <?php // Display simplified buttons (default behavior) ?>
              <?php if ( $has_other_bookings ) : ?>
                <a
                  class="anchor-link btn alt-tour-<?php echo $tour_theme; ?>"
                  href="#bookings_<?php echo $tour_id; ?>"
                >
                  View Dates + Options
                </a>
              <?php endif; ?>

              <?php if ( $has_request ) : ?>
                <a
                  class="anchor-link btn alt-tour-<?php echo $tour_theme; ?>"
                  href="#request_form"
                >
                  <?php echo esc_html( $request_button_label ); ?>
                </a>
              <?php endif; ?>
            <?php endif; ?>
          </div>
        <?php endif; ?>

      <?php endif; ?>


    </div>
  </div>
</section>