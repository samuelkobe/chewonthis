<?php if ( get_field( 'booking_type_toggle' ) == 1 ) : ?>

  <?php $button_gallery = get_field( 'digitally_guided_url' ); ?>
  <?php if ( $button_gallery != '' ) : ?>
    <div class="bg-clip-text w-full flex justify-center items-center absolute left-0 right-0 bottom-32 z-10 pointer-events-none">
      <a class="btn alt-tour-<?php echo $tour_theme; ?> h-fit cursor-pointer pointer-events-auto" href="<?php echo $button_gallery; ?>" target="_blank">
        Book Now
      </a>
    </div>
  <?php endif; ?>

<?php else: ?>

  <?php if ( have_rows( 'various_bookings_options' ) ): ?>
    <div class="w-full flex flex-wrap justify-center items-center gap-4 absolute left-0 right-0 bottom-32 z-10 pointer-events-none">
      <?php while ( have_rows( 'various_bookings_options' ) ) : the_row(); ?>
        <?php
          $booking_buttons = [
            'digitally_guided_url' => 'Signature Itinerary',
            'vip_guided_url'       => 'Hosted',
            'ebike_guided_url'     => 'E-Bike',
            'chauffeur_guided_url' => 'Chauffeured',
            'private_guided_url'   => 'Private',
            'group_url'            => 'Group',
            'request_form'         => 'Request Experience'
          ];
          foreach ( $booking_buttons as $field => $label ) :
            $url = get_sub_field( $field );
            if ( $field === 'request_form' ) {
              $label = get_sub_field('request_button_text') ?: 'Request Experience';
            }
            if ( !empty( $url ) ) :
              if ( $field === 'request_form' ) :
        ?>
          <a class="anchor-link btn alt-tour-<?php echo $tour_theme; ?> h-fit cursor-pointer pointer-events-auto mb-2 sm:mb-0" href="#request_form">
            <?php echo esc_html( $label ); ?>
          </a>
        <?php
              else :
        ?>
          <a class="anchor-link btn alt-tour-<?php echo $tour_theme; ?> h-fit cursor-pointer pointer-events-auto mb-2 sm:mb-0" href="<?php echo esc_url( $url ); ?>" target="_blank">
            View <?php echo esc_html( $label ); ?> Dates
          </a>
        <?php
              endif;
            endif;
          endforeach;
        ?>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
  
<?php endif; ?>