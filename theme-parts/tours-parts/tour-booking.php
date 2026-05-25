<section id="bookings_<?php echo $tour_id; ?>" class="scroll-m-20 lg:scroll-m-[156px] bg-<?php echo $tour_theme; ?>">
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
            <?php elseif ( get_row_layout() == 'group_option' ) : ?>
              <?php require get_template_directory() . "/theme-parts/icons/group-option-icon.php"; // Include group icon ?>
            <?php elseif ( get_row_layout() == 'by_request' ) : ?>
              <?php require get_template_directory() . "/theme-parts/icons/by-request-icon.php"; // Include group icon ?>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php else: ?>
          <?php // No layouts found ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>

	<?php if ( get_field( 'subheading_booking' ) != '' || null ) : ?>
		<h2 class="heading-one w-full mb-6 xl:mb-8 text-white lg:text-center"><?php the_field( 'heading_booking' ); ?></h2>
		<h3 class="text-xl lg:text-2xl font-main w-full mb-12 xl:mb-16 text-white lg:text-center"><?php the_field( 'subheading_booking' ); ?></h3>
	<?php else : ?>
    	<h2 class="heading-one w-full mb-12 xl:mb-16 text-white lg:text-center"><?php the_field( 'heading_booking' ); ?></h2>
	<?php endif; ?>
    
    <?php if ( get_field( 'booking_type_toggle' ) == 1 ) : ?>
      <div class="wysiwyg xl:text-lg xl:leading-[1.80em] text-white w-full text-center">
        <?php the_field( 'content_single_booking' ); ?>
      </div>
      <?php $button_digitally_guided = get_field( 'digitally_guided_url' ); ?>
      <?php if ( $button_digitally_guided != '' ) : ?>
        <div class="bg-clip-text w-full flex justify-center">
          <a class="btn btn-paprika mt-4 xl:mt-8" href="<?php echo $button_digitally_guided; ?>" target="_blank">
            Book Now
          </a>
        </div>
      <?php endif; ?>

    <?php else : ?>

      <?php if ( have_rows( 'various_bookings_options' ) ): ?>
        <?php
          $booking_options_count = count( get_field( 'various_bookings_options' ) );
          $button_alignment = $booking_options_count <= 2 ? 'mx-auto' : '';
        ?>

        <div class="grid grid-cols-1 gap-x-4 2xl:gap-x-8 gap-y-12 lg:grid-cols-12 text-white">
          <?php
          $card_index = 0;
          while ( have_rows( 'various_bookings_options' ) ) : the_row();
            $card_index++;
            $layout = get_row_layout();

            // Configuration map for each booking type
            $booking_config = array(
              'private_guided' => array(
                'title' => 'Private',
                'url_field' => 'private_guided_url',
                'off_season_field' => 'private_guided_off_season',
                'button_text' => 'View Private Dates',
                'button_class' => 'btn btn-paprika',
              ),
              'digitally_guided' => array(
                'title' => 'Signature Itinerary',
                'url_field' => 'digitally_guided_url',
                'off_season_field' => 'digitally_guided_off_season',
                'button_text' => 'View Signature Itinerary Dates',
                'button_class' => 'group btn btn-paprika',
                'button_attrs' => 'data-tooltip-target="tooltip-light" data-tooltip-style="light"',
              ),
              'vip_guided' => array(
                'title' => 'Hosted',
                'url_field' => 'vip_guided_url',
                'off_season_field' => 'vip_guided_off_season',
                'button_text' => 'View Hosted Dates',
                'button_class' => 'btn btn-paprika',
              ),
              'e-bike_tour' => array(
                'title' => 'E-Bike',
                'url_field' => 'ebike_guided_url',
                'off_season_field' => 'ebike_guided_off_season',
                'button_text' => 'View E-Bike Dates',
                'button_class' => 'btn btn-paprika',
              ),
              'chauffeur_guided' => array(
                'title' => 'Chauffeured',
                'url_field' => 'chauffeur_guided_url',
                'off_season_field' => 'chauffeur_guided_off_season',
                'button_text' => 'View Chauffeured Dates',
                'button_class' => 'btn btn-paprika',
              ),
              'group_option' => array(
                'title' => 'Group Option(s)',
                'url_field' => 'group_url',
                'off_season_field' => 'group_off_season',
                'button_text' => 'Join a Group',
                'button_class' => 'btn btn-paprika',
              ),
              'by_request' => array(
                'title' => 'By Request',
                'url_field' => 'request_form',
                'off_season_field' => null,
                'button_text' => 'Request Experience',
                'button_class' => 'anchor-link btn btn-paprika',
                'button_url' => '#request_form',
              ),
            );

            // Get configuration for current layout
            if ( ! isset( $booking_config[ $layout ] ) ) {
              continue;
            }

            $config = $booking_config[ $layout ];
            if ( $layout === 'by_request' ) {
              $config['button_text'] = get_sub_field('request_button_text') ?: 'Request Experience';
            }
            $booking_url = get_sub_field( $config['url_field'] );
            $is_off_season = $config['off_season_field'] ? get_sub_field( $config['off_season_field'] ) == 1 : false;

            // Calculate column span and positioning
            $col_classes = 'col-span-1'; // Mobile default

            // LG breakpoint: 3-column max (12-column grid, each card is 4 cols wide)
            // Determine row and position within row for lg:
            $lg_row = ceil( $card_index / 3 ); // Which row at lg: (1-indexed)
            $lg_position = ( ( $card_index - 1 ) % 3 ) + 1; // Position in row (1, 2, or 3)
            $lg_cards_in_row = min( 3, $booking_options_count - ( ( $lg_row - 1 ) * 3 ) );

            if ( $lg_cards_in_row == 1 ) {
              // Single card in row: center it (columns 4-9, 6 cols wide for perfect centering)
              $col_classes .= ' lg:col-start-4 lg:col-span-6';
            } elseif ( $lg_cards_in_row == 2 ) {
              // Two cards in row: columns 3-6 and 7-10
              if ( $lg_position == 1 ) {
                $col_classes .= ' lg:col-start-3 lg:col-span-4';
              } else {
                $col_classes .= ' lg:col-span-4';
              }
            } else {
              // Three cards in row: columns 1-4, 5-8, 9-12
              $col_classes .= ' lg:col-span-4';
            }

            // XL breakpoint: 3-column max (12-column grid, each card is 4 cols wide)
            // Determine row and position within row for xl:
            $xl_row = ceil( $card_index / 3 ); // Which row at xl: (1-indexed)
            $xl_position = ( ( $card_index - 1 ) % 3 ) + 1; // Position in row (1, 2, or 3)
            $xl_cards_in_row = min( 3, $booking_options_count - ( ( $xl_row - 1 ) * 3 ) );

            if ( $xl_cards_in_row == 1 ) {
              // Single card in row: center it (columns 5-8, 4 cols wide)
              $col_classes .= ' xl:col-start-5 xl:col-span-4';
            } elseif ( $xl_cards_in_row == 2 ) {
              // Two cards in row: columns 3-6 and 7-10
              if ( $xl_position == 1 ) {
                $col_classes .= ' xl:col-start-3 xl:col-span-4';
              } else {
                $col_classes .= ' xl:col-span-4';
              }
            } else {
              // Three cards in row: columns 1-4, 5-8, 9-12
              $col_classes .= ' xl:col-span-4';
            }

            // 2XL breakpoint: 4-column max (12-column grid, each card is 3 cols wide)
            // Determine row and position within row for 2xl:
            $xxl_row = ceil( $card_index / 4 ); // Which row at 2xl: (1-indexed)
            $xxl_position = ( ( $card_index - 1 ) % 4 ) + 1; // Position in row (1, 2, 3, or 4)
            $xxl_cards_in_row = min( 4, $booking_options_count - ( ( $xxl_row - 1 ) * 4 ) );

            if ( $xxl_cards_in_row == 1 ) {
              // Single card in row: center it (columns 5-8, 4 cols wide for perfect centering)
              $col_classes .= ' 2xl:col-start-5 2xl:col-span-4';
            } elseif ( $xxl_cards_in_row == 2 ) {
              // Two cards in row: columns 4-6 and 7-9
              if ( $xxl_position == 1 ) {
                $col_classes .= ' 2xl:col-start-4 2xl:col-span-3';
              } else {
                $col_classes .= ' 2xl:col-span-3';
              }
            } elseif ( $xxl_cards_in_row == 3 ) {
              // Three cards in row: columns 1-3, 5-7, 9-11 (with gaps at 4 and 8)
              if ( $xxl_position == 1 ) {
                $col_classes .= ' 2xl:col-start-1 2xl:col-span-3';
              } elseif ( $xxl_position == 2 ) {
                $col_classes .= ' 2xl:col-start-5 2xl:col-span-3';
              } else {
                $col_classes .= ' 2xl:col-start-9 2xl:col-span-3';
              }
            } else {
              // Four cards in row: columns 1-3, 4-6, 7-9, 10-12
              $col_classes .= ' 2xl:col-span-3';
            }
          ?>

            <div class="<?php echo esc_attr( $col_classes ); ?> relative h-full flex flex-col justify-between bg-bread rounded-lg shadow-md p-6 lg:p-8 hover:shadow-xl transition-shadow duration-300">
              <div class="mb-2 xl:mb-4 flex flex-col space-y-4">
                <h3 class="mb-2 xl:mb-4 text-2xl xl:text-4xl tracking-wide font-condensed font-bold antialiased text-paprika self-center"><?php echo esc_html( $config['title'] ); ?></h3>
                <div class="wysiwyg xl:text-base xl:leading-[1.60em] text-black text-center">
                  <?php echo get_sub_field( 'booking_info' ); ?>
                </div>

                <?php if ( have_rows( 'booking_card_options' ) ) : ?>
                  <?php while ( have_rows( 'booking_card_options' ) ) : the_row(); ?>
                    <?php if ( get_sub_field( 'details' ) == 1 ) : ?>

                      <div class="wysiwyg xl:text-base xl:leading-[1.60em] text-black text-center">
                        <h3 class="uppercase text-sm xl:text-base tracking-wide font-main font-bold antialiased text-black self-center">Start time</h3>
                        <?php the_field( 'start_time' ); ?>
                      </div>

                      <div class="wysiwyg xl:text-base xl:leading-[1.60em] text-black text-center">
                        <h3 class="uppercase text-sm xl:text-base tracking-wide font-main font-bold antialiased text-black self-center">Duration</h3>
                        <?php the_field( 'duration' ); ?>
                      </div>

                      <div class="wysiwyg xl:text-base xl:leading-[1.60em] text-black text-center">
                        <h3 class="uppercase text-sm xl:text-base tracking-wide font-main font-bold antialiased text-black self-center">Number of stops</h3>                  
                        <?php the_sub_field( 'number_of_stops' ); ?>
                      </div>
                      
                    <?php endif; ?>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>

              <?php if ( $booking_url != '' ) : ?>
                <?php if ( $is_off_season ) : ?>
                  <p class="font-main font-semibold text-white p-1 bg-caramel lg:text-center rounded-md">Currently unavailable during the offseason.</p>
                <?php else : ?>
                  <div class="bg-clip-text w-fit flex self-center max-lg:whitespace-nowrap lg:min-w-[60%] <?php echo $button_alignment; ?>">
                    <a class="<?php echo esc_attr( $config['button_class'] ); ?> w-[200px] lg:w-full text-center flex items-center justify-center relative mt-2 xl:mt-4"
                       href="<?php echo esc_url( isset( $config['button_url'] ) ? $config['button_url'] : $booking_url ); ?>"
                       target="_blank"
                       <?php echo isset( $config['button_attrs'] ) ? $config['button_attrs'] : ''; ?>>
                      <?php echo esc_html( $config['button_text'] ); ?>
                    </a>
                  </div>
                <?php endif; ?>
              <?php endif; ?>
            </div>

          <?php endwhile; ?>
        </div>
      <?php else: ?>
        <?php // No layouts found ?>
      <?php endif; ?>

    <?php endif; ?>

  </div>
</section>