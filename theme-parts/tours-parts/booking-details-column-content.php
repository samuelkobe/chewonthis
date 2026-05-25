<div class="[grid-area:tag/tag] w-full max-w-[480px] min-h-32 p-0 lg:p-12 lg:pb-0 mb-6 lg:mb-0">
        <?php if ( ! empty( $tour_details ) ) : // Loop over each tour detail and display the icon and name ?>
          <div class="flex flex-wrap items-center justify-center lg:flex-nowrap lg:grid lg:grid-cols-2 gap-4 xl:gap-8 py-4">
            <?php foreach ( $tour_details as $tour_detail ) : ?>

              <?php $tour_detail_icon = get_field( 'icon', $tour_detail ); // 'icon' is the ACF field name ?>

              <?php if ( $tour_detail_icon && is_string( $tour_detail_icon ) ) : ?>
                <div class="xl:col-span-1 fill-white text-white rounded-2xl flex flex-col justify-center items-center text-center w-32 xl:w-48 h-32 xl:h-48 aspect-square p-12 bg-<?php echo $tour_theme;?>">
                  <div class="flex items-center justify-center w-auto h-auto mb-2 xl:mb-3">
                    <?php echo $tour_detail_icon; ?>
                  </div>
                  <span class="font-main font-bold antialiased text-sm xl:text-xl xl:!leading-snug uppercase"><?php echo $tour_detail->name; ?></span>
                </div>
              <?php endif; ?>

            <?php endforeach; ?>
          </div>
        <?php  else : ?>
            <p>Tour/Experience detail icons coming soon!</p>
        <?php endif; ?>
      </div>

      <div class="[grid-area:button/button] w-full min-h-64 lg:p-12">

        <h2 class="uppercase mb-2 xl:mb-4 text-xl xl:text-3xl tracking-wide font-main font-bold antialiased text-<?php echo $tour_theme; ?>">Booking:</h2>

      <?php if ( get_field( 'booking_type_toggle' ) == 1 ) : ?>
              <?php $button_digitally_guided = get_field( 'digitally_guided_url' ); ?>
              <?php if ( $button_digitally_guided != '' ) : ?>
                <div class="bg-clip-text w-full flex justify-center">
                  <a class="btn wide hover:!bg-<?php echo $tour_theme; ?> mt-6 xl:mt-8" href="<?php echo $button_digitally_guided; ?>" target="_blank">
                    Chef Hosted
                  </a>
                </div>
              <?php endif; ?>
      <?php else : ?>
        <?php if ( have_rows( 'various_bookings_options' ) ): ?>
          <?php while ( have_rows( 'various_bookings_options' ) ) : the_row(); ?>
            <?php if ( get_row_layout() == 'private_guided' ) : ?>

              <?php $button_private_guided = get_sub_field( 'private_guided_url' ); ?>
              <?php if ( $button_private_guided != '' ) : ?>

                <?php if ( get_sub_field( 'private_guided_off_season' ) == 1 ) : ?>
                  <?php // in off season ?>
                <?php else : ?>
                  <div class="bg-clip-text w-full flex justify-center">
                    <a class="btn wide hover:!bg-<?php echo $tour_theme; ?> mt-6 xl:mt-8" href="<?php echo $button_private_guided; ?>" target="_blank">
                      View Private Dates
                    </a>
                  </div>
                <?php endif; ?>

              <?php endif; ?>

            <?php elseif ( get_row_layout() == 'digitally_guided' ) : ?>
              
              <?php $button_digitally_guided = get_sub_field( 'digitally_guided_url' ); ?>
              <?php if ( $button_digitally_guided != '' ) : ?>

                <?php if ( get_sub_field( 'digitally_guided_off_season' ) == 1 ) : ?>
                  <?php // in off season ?>
                <?php else : ?>
                  <div class="bg-clip-text w-full flex justify-center">
                    <a class="group btn wide hover:!bg-<?php echo $tour_theme; ?> mt-6 xl:mt-8 relative" href="<?php echo $button_digitally_guided; ?>" target="_blank">
                      View Signature Itinerary Dates
                      <!-- <span class="group-hover:opacity-100 transition-opacity duration-300 opacity-0 flex items-center justify-center absolute inset-0 hover:!bg-<?php echo $tour_theme; ?> text-xs xl:text-sm w-full text-center capitalize">Curated. Hosted. Experiential. Wanderings.</span> -->
                    </a>
                  </div>
                <?php endif; ?>

              <?php endif; ?>

            <?php elseif ( get_row_layout() == 'vip_guided' ) : ?>

              <?php $button_vip_guided = get_sub_field( 'vip_guided_url' ); ?>
              <?php if ( $button_vip_guided != '' ) : ?>

                <?php if ( get_sub_field( 'vip_guided_off_season' ) == 1 ) : ?>
                  <?php // in off season ?>
                <?php else : ?>
                  <div class="bg-clip-text w-full flex justify-center">
                    <a class="btn wide hover:!bg-<?php echo $tour_theme; ?> mt-6 xl:mt-8" href="<?php echo $button_vip_guided; ?>" target="_blank">
                      View Hosted Dates
                    </a>
                  </div>
                <?php endif; ?>

              <?php endif; ?>

            <?php elseif ( get_row_layout() == 'e-bike_tour' ) : ?>

              <?php $ebike_guided_url = get_sub_field( 'ebike_guided_url' ); ?>
              <?php if ( $ebike_guided_url != '' ) : ?>

                <?php if ( get_sub_field( 'ebike_guided_off_season' ) == 1 ) : ?>
                  <?php // in off season ?>
                <?php else : ?>
                  <div class="bg-clip-text w-full flex justify-center">
                    <a class="btn wide hover:!bg-<?php echo $tour_theme; ?> mt-6 xl:mt-8" href="<?php echo $ebike_guided_url; ?>" target="_blank">
                      View E-Bike Dates
                    </a>
                  </div>
                <?php endif; ?>

              <?php endif; ?>
              
            <?php elseif ( get_row_layout() == 'chauffeur_guided' ) : ?>

              <?php $chauffeur_guided_url = get_sub_field( 'chauffeur_guided_url' ); ?>
              <?php if ( $chauffeur_guided_url != '' ) : ?>
                
                <?php if ( get_sub_field( 'chauffeur_guided_off_season' ) == 1 ) : ?>
                  <?php // in off season ?>
                <?php else : ?>
                  <div class="bg-clip-text w-full flex justify-center">
                    <a class="btn wide hover:!bg-<?php echo $tour_theme; ?> mt-6 xl:mt-8" href="<?php echo $chauffeur_guided_url; ?>" target="_blank">
                      View Chauffeured Dates
                    </a>
                  </div>
                <?php endif; ?>

              <?php endif; ?>


                
            <?php elseif ( get_row_layout() == 'group_option' ) : ?>

              <?php $group_url = get_sub_field( 'group_url' ); ?>
              <?php if ( $group_url != '' ) : ?>
                
                <?php if ( get_sub_field( 'group_off_season' ) == 1 ) : ?>
                  <?php // in off season ?>
                <?php else : ?>
                  <div class="bg-clip-text w-full flex justify-center">
                    <a class="btn wide hover:!bg-<?php echo $tour_theme; ?> mt-6 xl:mt-8" href="<?php echo $group_url; ?>" target="_blank">
                      Join a Group
                    </a>
                  </div>
                <?php endif; ?>

              <?php endif; ?>

            <?php elseif ( get_row_layout() == 'by_request' ) : ?>

              <?php $request_url = get_sub_field( 'request_form' ); ?>
              <?php if ( $request_url != '' ) : ?>

                  <div class="bg-clip-text w-full flex justify-center">
                    <a class="anchor-link btn wide hover:!bg-<?php echo $tour_theme; ?> mt-6 xl:mt-8" href="#request_form">
                      <?php echo get_sub_field('request_button_text') ?: 'Request Experience'; ?>
                    </a>
                  </div>

              <?php endif; ?>


            <?php endif; ?>
          <?php endwhile; ?>
        <?php else: ?>
          <?php // No layouts found ?>
        <?php endif; ?>
      <?php endif; ?>


        <?php $email_inquiry = get_field( 'email_inquiry', 'option'  ); ?>
        <?php if ( $email_inquiry ) : ?>
          <div class="bg-clip-text w-full flex justify-center">
            <a class="btn wide tour-auxiliary hover:!bg-<?php echo $tour_theme; ?> mt-6 xl:mt-8" href="<?php echo esc_url( $email_inquiry['url'] ); ?>" target="<?php echo esc_attr( $email_inquiry['target'] ); ?>">
              <?php echo esc_html( $email_inquiry['title'] ); ?>
            </a>
          </div>
        <?php endif; ?>

        <?php $button_groups = get_field( 'button_groups' ); ?>
        <?php if ( $button_groups ) : ?>
          <div class="bg-clip-text w-full flex justify-center">
            <a class="btn wide tour-auxiliary hover:!bg-<?php echo $tour_theme; ?> my-6 xl:my-8" href="<?php echo esc_url( $button_groups['url'] ); ?>" target="<?php echo esc_attr( $button_groups['target'] ); ?>">
              <?php echo esc_html( $button_groups['title'] ); ?>
            </a>
          </div>
        <?php endif; ?>

      </div>