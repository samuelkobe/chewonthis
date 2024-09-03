<?php
// Get all tour details for the current tour
$tour_details = wp_get_object_terms( $tour_id, 'tour-detail' );

?>
<section id="details_<?php echo $tour_id; ?>" class="scroll-m-20 bg-white">
  <div class="container px-6 py-6 lg:py-20 mx-auto relative">
    <div class="grid lg:grid-cols-[2fr_1fr] [grid-template-areas:'tag''detail''button'] lg:[grid-template-areas:'detail_detail_tag''detail_detail_button'] w-full">
      <div class="[grid-area:detail/detail] w-full min-h-64 lg:p-12">

        <?php if ( have_rows( 'details' ) ) : ?>
          <?php while ( have_rows( 'details' ) ) : the_row(); ?>
            <div class="mb-6 xl:mb-8">
              <h2 class="uppercase mb-1 xl:mb-2 text-xl xl:text-3xl tracking-wide font-main font-bold antialiased text-<?php echo $tour_theme; ?>"><?php echo get_sub_field( 'heading' ); ?></h2>
              <div class="wysiwyg text-dark xl:text-xl">
                <?php echo get_sub_field( 'content' ); ?>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <?php // No rows found ?>
        <?php endif; ?>

      </div>
      <div class="[grid-area:tag/tag] w-full min-h-64 p-0 lg:p-12 lg:pb-0 mb-6 lg:mb-0">
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
            <p>No tour details found.</p>
        <?php endif; ?>
      </div>
      <div class="[grid-area:button/button] w-full min-h-64 lg:p-12">

        <h2 class="uppercase mb-2 xl:mb-4 text-xl xl:text-3xl tracking-wide font-main font-bold antialiased text-<?php echo $tour_theme; ?>">Booking:</h2>

      <?php if ( get_field( 'booking_type_toggle' ) == 1 ) : ?>
        <?php require get_template_directory() . "/theme-parts/icons/van-icon.php"; // Include van icon ?>
      <?php else : ?>
        <?php if ( have_rows( 'various_bookings_options' ) ): ?>
          <?php while ( have_rows( 'various_bookings_options' ) ) : the_row(); ?>
            <?php if ( get_row_layout() == 'digitally_guided' ) : ?>
              
              <?php $button_digitally_guided = get_sub_field( 'digitally_guided_url' ); ?>
              <?php if ( $button_digitally_guided != '' ) : ?>
                <div class="bg-clip-text w-full flex justify-center">
                  <a class="btn wide hover:!bg-<?php echo $tour_theme; ?> mt-6 xl:mt-8" href="<?php echo $button_digitally_guided; ?>" target="_blank">
                    Digitally Guided
                  </a>
                </div>
              <?php endif; ?>

            <?php elseif ( get_row_layout() == 'vip_guided' ) : ?>

              <?php $button_vip_guided = get_sub_field( 'vip_guided_url' ); ?>
              <?php if ( $button_vip_guided != '' ) : ?>
                <div class="bg-clip-text w-full flex justify-center">
                  <a class="btn wide hover:!bg-<?php echo $tour_theme; ?> mt-6 xl:mt-8" href="<?php echo $button_vip_guided; ?>" target="_blank">
                    VIP Guided
                  </a>
                </div>
              <?php endif; ?>

            <?php elseif ( get_row_layout() == 'e-bike_tour' ) : ?>

              <?php $ebike_guided_url = get_sub_field( 'ebike_guided_url' ); ?>
              <?php if ( $ebike_guided_url != '' ) : ?>
                <div class="bg-clip-text w-full flex justify-center">
                  <a class="btn wide hover:!bg-<?php echo $tour_theme; ?> mt-6 xl:mt-8" href="<?php echo $ebike_guided_url; ?>" target="_blank">
                    E-Bike Tour
                  </a>
                </div>
              <?php endif; ?>
              
            <?php elseif ( get_row_layout() == 'chauffer_guided' ) : ?>

              <?php $chauffer_guided_url = get_sub_field( 'chauffer_guided_url' ); ?>
              <?php if ( $chauffer_guided_url != '' ) : ?>
                <div class="bg-clip-text w-full flex justify-center">
                  <a class="btn wide hover:!bg-<?php echo $tour_theme; ?> mt-6 xl:mt-8" href="<?php echo $chauffer_guided_url; ?>" target="_blank">
                    Chauffer Guided
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
    </div>
    
  </div>
</section>