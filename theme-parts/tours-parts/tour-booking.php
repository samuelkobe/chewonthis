<section id="bookings_<?php echo $tour_id; ?>" class="scroll-m-20 bg-<?php echo $tour_theme; ?>">
  <div class="container mx-auto px-6 py-6 lg:py-20">

    <div class="w-full flex space-x-6 justify-center pb-12">
      <?php if ( get_field( 'booking_type_toggle' ) == 1 ) : ?>
        <?php require get_template_directory() . "/theme-parts/icons/fork-knife-icon.php"; // Include fork and knife icon ?>
      <?php else : ?>
        <?php if ( have_rows( 'various_bookings_options' ) ): ?>
          <?php while ( have_rows( 'various_bookings_options' ) ) : the_row(); ?>
            <?php if ( get_row_layout() == 'digitally_guided' ) : ?>
              <?php require get_template_directory() . "/theme-parts/icons/flag-icon.php"; // Include flag icon ?>
            <?php elseif ( get_row_layout() == 'vip_guided' ) : ?>
              <?php require get_template_directory() . "/theme-parts/icons/star-icon.php"; // Include star icon ?>
            <?php elseif ( get_row_layout() == 'e-bike_tour' ) : ?>
              <?php require get_template_directory() . "/theme-parts/icons/ebike-icon.php"; // Include e-bike icon ?>
            <?php elseif ( get_row_layout() == 'chauffeur_guided' ) : ?>
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
          $col_start_counter = 1;
          $col_start_pos = ''; // Set the default column start position lg:col-start-1 lg:col-start-2.
        ?>
        <!-- <div class="grid grid-cols-1 gap-12 lg:grid-cols-[<?//php echo $booking_options_count_col_class; //Add the column class to the grid ?>] text-white"> -->
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-[1fr_1fr_1fr_1fr] text-white">
          
          <?php while ( have_rows( 'various_bookings_options' ) ) : the_row(); ?>
            <?php if ( get_row_layout() == 'digitally_guided' ) : ?>

              <?php 
                if ($booking_options_count <= 2) {
                  $col_start_counter = $col_start_counter + 1;
                  $col_start_pos = ' lg:col-start-' . $col_start_counter;
                } 
              ?>
              
              <div class="col-span-1<?php echo $col_start_pos; ?> relative h-full flex flex-col justify-between">
                <div class="mb-2 xl:mb-4">
                  <h3 class="uppercase mb-2 xl:mb-4 text-xl xl:text-3xl tracking-wide font-main font-bold antialiased">Itinerary Guided:</h3>
                  <div class="wysiwyg xl:text-lg xl:leading-[1.80em]">
                    <?php echo get_sub_field( 'booking_info' ); ?>
                  </div>
                </div>
                <?php $button_digitally_guided = get_sub_field( 'digitally_guided_url' ); ?>
                <?php if ( $button_digitally_guided != '' ) : ?>

                  <?php if ( get_sub_field( 'digitally_guided_off_season' ) == 1 ) : ?>
                    <p class="font-main font-semibold text-white p-1 bg-caramel lg:text-cente rounded-md">Currently unavailable during the offseason.</p>
                  <?php else : ?>
                    <div class="bg-clip-text w-full flex">                  
                      <a class="group btn alt w-[200px] lg:w-full text-center flex items-center justify-center mt-4 xl:mt-8 relative" data-tooltip-target="tooltip-light" data-tooltip-style="light" href="<?php echo $button_digitally_guided; ?>" target="_blank">
                        Itinerary Guided
                        <!-- <span class="group-hover:opacity-100 transition-opacity duration-300 opacity-0 flex absolute -bottom-10 xl:-bottom-16 2xl:-bottom-10 text-xs xl:text-sm w-fit capitalize">Curated. Hosted. Experiential. Wanderings.</span> -->
                      </a>
                    </div>
                  <?php endif; ?>
                
                <?php endif; ?>
              </div>
            <?php elseif ( get_row_layout() == 'vip_guided' ) : ?>

              <?php 
                if ($booking_options_count <= 2) {
                  $col_start_counter = $col_start_counter + 1;
                  $col_start_pos = ' lg:col-start-' . $col_start_counter;
                } 
              ?>

              <div class="col-span-1<?php echo $col_start_pos; ?> relative h-full flex flex-col justify-between">
                <div class="mb-2 xl:mb-4">         
                  <h3 class="uppercase mb-2 xl:mb-4 text-xl xl:text-3xl tracking-wide font-main font-bold antialiased">Host Guided:</h3>
                  <div class="wysiwyg xl:text-lg xl:leading-[1.80em]">
                    <?php echo get_sub_field( 'booking_info' ); ?>
                  </div>
                </div>
                <?php $vip_guided_url = get_sub_field( 'vip_guided_url' ); ?>
                <?php if ( $vip_guided_url != '' ) : ?>

                  <?php if ( get_sub_field( 'vip_guided_off_season' ) == 1 ) : ?>
                    <p class="font-main font-semibold text-white p-1 bg-caramel lg:text-center rounded-md">Currently unavailable during the offseason.</p>
                  <?php else : ?>
                    <div class="bg-clip-text w-full flex">
                      <a class="btn alt w-[200px] lg:w-full text-center flex items-center justify-center mt-4 xl:mt-8" href="<?php echo $vip_guided_url; ?>" target="_blank">
                        Host Guided
                      </a>
                    </div>
                  <?php endif; ?>

                <?php endif; ?>
              </div>
            <?php elseif ( get_row_layout() == 'e-bike_tour' ) : ?>

              <?php 
                if ($booking_options_count <= 2) {
                  $col_start_counter = $col_start_counter + 1;
                  $col_start_pos = ' lg:col-start-' . $col_start_counter;
                } 
              ?>

              <div class="col-span-1<?php echo $col_start_pos; ?> relative h-full flex flex-col justify-between">
                <div class="mb-2 xl:mb-4">
                  <h3 class="uppercase mb-2 xl:mb-4 text-xl xl:text-3xl tracking-wide font-main font-bold antialiased">E-Bike Tour:</h3>
                  <div class="wysiwyg xl:text-lg xl:leading-[1.80em]">
                    <?php echo get_sub_field( 'booking_info' ); ?>
                  </div>
                </div>
                <?php $ebike_guided_url = get_sub_field( 'ebike_guided_url' ); ?>
                <?php if ( $ebike_guided_url != '' ) : ?>

                  <?php if ( get_sub_field( 'ebike_guided_off_season' ) == 1 ) : ?>
                    <p class="font-main font-semibold text-white p-1 bg-caramel lg:text-center rounded-md">Currently unavailable during the offseason.</p>
                  <?php else : ?>
                    <div class="bg-clip-text w-full flex">
                      <a class="btn alt w-[200px] lg:w-full text-center flex items-center justify-center mt-4 xl:mt-8" href="<?php echo $ebike_guided_url; ?>" target="_blank">
                      E-Bike Tour
                      </a>
                    </div>
                  <?php endif; ?>

                <?php endif; ?>
              </div>
            <?php elseif ( get_row_layout() == 'chauffeur_guided' ) : ?>

              <?php 
                if ($booking_options_count <= 2) {
                  $col_start_counter = $col_start_counter + 1;
                  $col_start_pos = ' lg:col-start-' . $col_start_counter;
                } 
              ?>

              <div class="col-span-1<?php echo $col_start_pos; ?> relative h-full flex flex-col justify-between">
                <div class="mb-2 xl:mb-4">
                  <h3 class="uppercase mb-2 xl:mb-4 text-xl xl:text-3xl tracking-wide font-main font-bold antialiased">Chauffeur Guided:</h3>
                  <div class="wysiwyg xl:text-lg xl:leading-[1.80em]">
                    <?php echo get_sub_field( 'booking_info' ); ?>
                  </div>
                </div>
                <?php $chauffeur_guided_url = get_sub_field( 'chauffeur_guided_url' ); ?>
                <?php if ( $chauffeur_guided_url != '' ) : ?>

                  <?php if ( get_sub_field( 'chauffeur_guided_off_season' ) == 1 ) : ?>
                    <p class="font-main font-semibold text-white p-1 bg-caramel lg:text-center rounded-md">Currently unavailable during the offseason.</p>
                  <?php else : ?>
                    <div class="bg-clip-text w-full flex">
                      <a class="btn alt w-[200px] lg:w-full text-center flex items-center justify-center mt-4 xl:mt-8" href="<?php echo $chauffeur_guided_url; ?>" target="_blank">
                        Chauffeur Guided
                      </a>
                    </div>
                  <?php endif; ?>

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