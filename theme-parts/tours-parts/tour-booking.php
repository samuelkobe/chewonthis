<section id="bookings_<?php echo $tour_id; ?>" class="scroll-m-20 bg-<?php echo $tour_theme; ?>">
  <div class="container mx-auto px-6 py-6 lg:py-20">

    <div class="w-full flex space-x-6 justify-center pb-12">
      <?php if ( get_field( 'booking_type_toggle' ) == 1 ) : ?>
        <?php require get_template_directory() . "/theme-parts/icons/van-icon.php"; // Include van icon ?>
      <?php else : ?>
        <?php if ( have_rows( 'various_bookings_options' ) ): ?>
          <?php while ( have_rows( 'various_bookings_options' ) ) : the_row(); ?>
            <?php if ( get_row_layout() == 'digitally_guided' ) : ?>
              <?php require get_template_directory() . "/theme-parts/icons/flag-icon.php"; // Include flag icon ?>
            <?php elseif ( get_row_layout() == 'vip_guided' ) : ?>
              <?php require get_template_directory() . "/theme-parts/icons/star-icon.php"; // Include star icon ?>
            <?php elseif ( get_row_layout() == 'e-bike_tour' ) : ?>
              <?php require get_template_directory() . "/theme-parts/icons/ebike-icon.php"; // Include e-bike icon ?>
            <?php elseif ( get_row_layout() == 'chauffer_guided' ) : ?>
              <?php require get_template_directory() . "/theme-parts/icons/van-icon.php"; // Include van icon ?>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php else: ?>
          <?php // No layouts found ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>

    <h2 class="heading-one w-full mb-12 xl:mb-16 text-white lg:text-center"><?php the_field( 'heading_booking' ); ?></h2>
    
    <?php if ( get_field( 'booking_type_toggle' ) == 1 ) : ?>
      <div class="wysiwyg xl:text-lg xl:leading-[1.80em] text-white w-full text-center">
        <?php the_field( 'content_single_booking' ); ?>
      </div>
      <?php $button_digitally_guided = get_field( 'digitally_guided_url' ); ?>
      <?php if ( $button_digitally_guided != '' ) : ?>
        <div class="bg-clip-text w-full flex justify-center">
          <a class="btn alt mt-4 xl:mt-8" href="<?php echo $button_digitally_guided; ?>" target="_blank">
            Book Now
          </a>
        </div>
      <?php endif; ?>

    <?php else : ?>

      <?php if ( have_rows( 'various_bookings_options' ) ): ?>
        <?php 
          $booking_options_count = count( get_field( 'various_bookings_options' ) ); // Get the number of booking options.
          $booking_options_count_col_class = '1fr'; // Set the default column class.
          for ( $i = 1; $i < $booking_options_count; $i++ ) { // Loop through the booking options.
            $booking_options_count_col_class = $booking_options_count_col_class . '_1fr'; // Create the column class based on the number of booking options.
          }
        ?>
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-[<?php echo $booking_options_count_col_class; //Add the column class to the grid ?>] text-white">
          
          <?php while ( have_rows( 'various_bookings_options' ) ) : the_row(); ?>
            <?php if ( get_row_layout() == 'digitally_guided' ) : ?>
              <div class="col-span-1 relative h-full flex flex-col justify-between">
                <div class="mb-2 xl:mb-4">
                  <h3 class="uppercase mb-2 xl:mb-4 text-xl xl:text-3xl tracking-wide font-main font-bold antialiased">Digitally Guided:</h3>
                  <div class="wysiwyg xl:text-lg xl:leading-[1.80em]">
                    <?php echo get_sub_field( 'booking_info' ); ?>
                  </div>
                </div>
                <?php $button_digitally_guided = get_sub_field( 'digitally_guided_url' ); ?>
                <?php if ( $button_digitally_guided != '' ) : ?>
                  <div class="bg-clip-text w-full flex">
                    <a class="btn alt w-[200px] lg:w-full text-center flex items-center justify-center mt-4 xl:mt-8" href="<?php echo $button_digitally_guided; ?>" target="_blank">
                      Digitally Guided
                    </a>
                  </div>
                <?php endif; ?>
              </div>
            <?php elseif ( get_row_layout() == 'vip_guided' ) : ?>
              <div class="col-span-1 relative h-full flex flex-col justify-between">
                <div class="mb-2 xl:mb-4">         
                  <h3 class="uppercase mb-2 xl:mb-4 text-xl xl:text-3xl tracking-wide font-main font-bold antialiased">VIP Guided:</h3>
                  <div class="wysiwyg xl:text-lg xl:leading-[1.80em]">
                    <?php echo get_sub_field( 'booking_info' ); ?>
                  </div>
                </div>
                <?php $vip_guided_url = get_sub_field( 'vip_guided_url' ); ?>
                <?php if ( $vip_guided_url != '' ) : ?>
                  <div class="bg-clip-text w-full flex">
                    <a class="btn alt w-[200px] lg:w-full text-center flex items-center justify-center mt-4 xl:mt-8" href="<?php echo $vip_guided_url; ?>" target="_blank">
                      VIP Guided
                    </a>
                  </div>
                <?php endif; ?>
              </div>
            <?php elseif ( get_row_layout() == 'e-bike_tour' ) : ?>
              <div class="col-span-1 relative h-full flex flex-col justify-between">
                <div class="mb-2 xl:mb-4">
                  <h3 class="uppercase mb-2 xl:mb-4 text-xl xl:text-3xl tracking-wide font-main font-bold antialiased">E-Bike Tour:</h3>
                  <div class="wysiwyg xl:text-lg xl:leading-[1.80em]">
                    <?php echo get_sub_field( 'booking_info' ); ?>
                  </div>
                </div>
                <?php $ebike_guided_url = get_sub_field( 'ebike_guided_url' ); ?>
                <?php if ( $ebike_guided_url != '' ) : ?>
                  <div class="bg-clip-text w-full flex">
                    <a class="btn alt w-[200px] lg:w-full text-center flex items-center justify-center mt-4 xl:mt-8" href="<?php echo $ebike_guided_url; ?>" target="_blank">
                     E-Bike Tour
                    </a>
                  </div>
                <?php endif; ?>
              </div>
            <?php elseif ( get_row_layout() == 'chauffer_guided' ) : ?>
              <div class="col-span-1 relative h-full flex flex-col justify-between">
                <div class="mb-2 xl:mb-4">
                  <h3 class="uppercase mb-2 xl:mb-4 text-xl xl:text-3xl tracking-wide font-main font-bold antialiased">Chauffer Guided:</h3>
                  <div class="wysiwyg xl:text-lg xl:leading-[1.80em]">
                    <?php echo get_sub_field( 'booking_info' ); ?>
                  </div>
                </div>
                <?php $chauffer_guided_url = get_sub_field( 'chauffer_guided_url' ); ?>
                <?php if ( $chauffer_guided_url != '' ) : ?>
                  <div class="bg-clip-text w-full flex">
                    <a class="btn alt w-[200px] lg:w-full text-center flex items-center justify-center mt-4 xl:mt-8" href="<?php echo $chauffer_guided_url; ?>" target="_blank">
                      Chauffer Guided
                    </a>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          <?php endwhile; ?>
        </div>
      <?php else: ?>
        <?php // No layouts found ?>
      <?php endif; ?>

    <?php endif; ?>

  </div>
</section>